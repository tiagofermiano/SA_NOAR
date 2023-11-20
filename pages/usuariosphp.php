<?php
include('protect.php');
include('conexao.php');
include('banco_usuarios.php');
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

  <link rel="stylesheet" type="text/css" href="usuarios.css">
</head>

<body>
    


  <header>

  <div class="grid_header">

    <div class="conectado">
      Conectado: <?php echo $_SESSION['nome'];?>
  </div>

  <div class="novo_usuario">
        <a href="cadastro.php">Cadastrar novo usuário</a>
    </div>

    <div class="inicio">
        <a href="telahome.php">Início</a>
    </div>

</div>

</header>

<div id="container-relatorios">

<div class="atend">

<h5 class="titulo">Visualizar e Editar Usuários</h5>

<div class="form-caixa">
            <div class="card-body">
                <h5 class="texto" id="card-title">Lista de Usuários</h5>
                <table class="table table-striped">
                    <thead>
                        <div class="text-table-style">
                        <tr>
                            <th>ID do Bombeiro</th>
                            <th>Nome Completo</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Tipo</th>
                            <th>Senha</th>
                            <th>Ação</th>
                        </tr>
                        </div>
                    </thead>
                    <tbody>

                        <?php

                        if ($usuariosResult->num_rows > 0) {
                          while ($row = $usuariosResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_atendente"] . "</td>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["cpf"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["tipo"] . "</td>";
                            echo "<td>" . $row["senha"] . "</td>";
                            // Adicione um botão para edição (redireciona para a página editorphp.php com um parâmetro de ID)
                            echo '<td><a href="editorphp.php?edit=' . $row["id_atendente"] . '" class="btn btn-primary">Editar</a></td>';
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
</div>
</div>

</body>
</html>   