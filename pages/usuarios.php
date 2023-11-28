<?php
include('protect.php');
include('connect_usuarios.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOAR</title>


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

  <a href="cadastro.php"><div class="novo_usuario">
        Cadastrar novo usuário
    </div></a>

    <a href="telahome_admin.php"><div class="inicio">
        Início
    </div></a>

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
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Senha</th>
                            <th></th>
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
                            echo '<td><a href="editorphp.php?edit=' . $row["id_atendente"] . '" class="editar">Editar</a></td>';
                            echo '<td><a href="#" class="editar" onclick="confirmarExclusao(' . $row["id_atendente"] . ')">Excluir</a></td>'; 
                            echo "</tr>";
                          }
                        } else {
                          echo "<tr><td colspan='7'>Nenhum usuário encontrado.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</div>

<script>
  function confirmarExclusao(idAtendente) {
    var confirmacao = confirm("Tem certeza que deseja excluir este usuário?");

    if (confirmacao) {
      // Se o usuário clicou em "OK" no popup, redirecione para a página de exclusão com o ID do usuário
      window.location.href = 'excluirUsuario.php?edit=' + idAtendente + '&action=excluir';
    } else {
      // Se o usuário clicou em "Cancelar", nada acontecerá
    }
  }
</script>

</body>
</html>   