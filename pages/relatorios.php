<?php
include('protect.php');
include('conexao.php');
include('connect_relatorios.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOAR</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="historico.css">
</head>

<body>



  <header>
    <div class="grid_header">

      <div class="conectado">
        Conectado: <?php echo $_SESSION['nome']; ?>
      </div>

      <form method="post" action="connect_perfil.php" id="perfil_form">
        <button type="button" class="perfil" name="perfil_button" onclick="redirecionar('connect_perfil.php')">
          Perfil
        </button>

        <button type="button" class="inicio" name="inicio_button" onclick="redirecionar('connect_inicio.php')">
          Início
        </button>
      </form>

    </div>
  </header>

  <p class="titulo">Histórico de relatórios</p>


  <form method="post" action="connect_historico.php">
  <div class="form-caixa">
            <div class="card-body">
                <h5 class="texto" id="card-title">Lista de relatórios</h5>
                <table class="table table-striped">
                    <thead>
                        <div class="text-table-style">
                        <tr>
                            <th>Nome do atendente</th>
                            <th>Data da ocorrência</th>
                            <th>Hora de chegada</th>
                            <th>Nome do paciente</th>
                            <th>CPF do paciente</th>
                            <th></th>
                        </tr>
                        </div>
                    </thead>
                    <tbody>

                        <?php

                        if ($relatorioResult->num_rows > 0) {
                          while ($row = $relatorioResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nome_atendente"] . "</td>";
                            echo "<td>" . $row["data_ocorrencia"] . "</td>";
                            echo "<td>" . $row["hora_chegada"] . "</td>";
                            echo "<td>" . $row["nome_paciente"] . "</td>";
                            echo "<td>" . $row["rg_cpf_paciente"] . "</td>";
                            // Adicione um botão para edição (redireciona para a página editorphp.php com um parâmetro de ID)
                            echo '<td><a href="connect_historico.php?edit=' . '" class="editar">Visualizar</a></td>';
                            echo "</tr>";
                          }
                        } else {
                          echo "<tr><td colspan='7'>Nenhum relatório encontrado.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

  </form>

  <script>
    function redirecionar(action) {
      var formId = event.target.parentNode.id;
      var form = document.getElementById(formId);
      form.action = action;
      form.submit();
    }
  </script>



</body>

</html>