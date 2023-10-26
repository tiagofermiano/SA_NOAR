<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOAR</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="editor.css">
</head>

<body>
    
  <header>
    <div class="voltar">
        <a href="usuariosphp.php">Voltar</a>
    </div>
</header>

<?php

include('conexao.php');

// Verifica se um ID de usuário foi fornecido na URL
$editUsuarioId = null;
if (isset($_GET['edit'])) {
    $editUsuarioId = $_GET['edit'];
}

// Processo de atualização dos dados do usuário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoNomeCompleto = $_POST["novo_nome_completo"];
    $novoEmail = $_POST["novo_email"];
    $novoCpf = $_POST["novo_cpf"];
    $novaSenha = $_POST["nova_senha"];
    $novoTipo = $_POST["novo_tipo"];

    // Atualize os dados do usuário no banco de dados se o ID for fornecido
    if ($editUsuarioId !== null) {
        $atualizarQuery = "UPDATE atendente SET nome = '$novoNomeCompleto', email = '$novoEmail', cpf = '$novoCpf', senha = '$novaSenha', tipo = '$novoTipo' WHERE id_atendente = $editUsuarioId";

        if ($conn->query($atualizarQuery) === TRUE) {
            // Redirecione para a mesma página após a atualização
            header("Location: {$_SERVER['PHP_SELF']}");
            exit;
        } else {
            echo "Erro ao atualizar o usuário: " . $conn->error;
        }
    }
}

// Consulta para buscar todos os usuários
$usuariosQuery = "SELECT id_atendente, nome, email, cpf, senha, tipo FROM atendente";
$usuariosResult = $conn->query($usuariosQuery);
?>

<div class="atend">
        <div class="card">
            <h5 class="card-header">Visualizar e Editar Usuários</h5>
            <div class="card-body">
                <h5 class="card-title" id="card-title">Lista de Usuários</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID do Bombeiro</th>
                            <th>Nome Completo</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Senha</th>
                            <th>Tipo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        if ($usuariosResult->num_rows > 0) {
                            while ($row = $usuariosResult->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id_atendente"] . "</td>";
                                echo "<td>" . $row["nome"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["cpf"] . "</td>";
                                echo "<td>" . $row["senha"] . "</td>";
                                echo "<td>" . $row["tipo"] . "</td>";
                                // Adicione um botão para edição (vai para a mesma página com um parâmetro de ID)
                                echo '<td><a href="?edit=' . $row["id_atendente"] . '" class="btn btn-primary">Editar</a></td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Nenhum usuário encontrado.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <a href="cadastro.php"><button class="btn btn-primary">Cadastrar um novo Bombeiro</button></a>

            </div>
        </div>
        <?php
        if ($editUsuarioId !== null) {
            // Recupera os dados do usuário com base no ID fornecido para edição
            $query = "SELECT id_atendente, nome, email, cpf, senha, tipo FROM atendente WHERE id_atendente = $editUsuarioId";
            $result = $conn->query($query);
            $usuario = $result->fetch_assoc();
        ?>
            <div class="card">
                <h5 class="card-header">Editar Usuário</h5>
                <div class="card-body">
                    <h5 class="card-title" id="card-title">Editar Usuário</h5>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="novo_nome_completo" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="novo_nome_completo" name="novo_nome_completo" value="<?php echo $usuario['nome']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="novo_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="novo_email" name="novo_email" value="<?php echo $usuario['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="novo_cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="novo_cpf" name="novo_cpf" value="<?php echo $usuario['cpf']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nova_senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="nova_senha" name="nova_senha" value="<?php echo $usuario['senha']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="novo_tipo">Tipo</label>
                            <select class="form-control" name="novo_tipo">
                                <option value="atendente" <?php echo ($usuario["tipo"] === "atendente") ? "selected" : ""; ?>>Atendente</option>
                                <option value="outro_tipo" <?php echo ($usuario["tipo"] !== "atendente") ? "selected" : ""; ?>>Outro Tipo</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>




<p class="titulo"><?php echo $_SESSION['nome']; ?></p>
    <div class="form-caixa">
        <div class="id">
            Id:
            <?php echo $_SESSION['id_atendente']; ?>
        </div>

        <div class="email">
            Email:
            <?php echo $_SESSION['email']; ?>
        </div>

        <div class="cpf">
            CPF:
            <?php echo $_SESSION['cpf']; ?>
        </div>

        <div class="senha">
            Senha:
            <?php echo $_SESSION['senha']; ?>
        </div>
    </div>

    <div id="botao-editar">
        <a href="editorphp.php" class="botao">
          Salvar
        </a>
      </div>


</body>
</html>    
