<?php
include('protect.php');
include('conexao.php');
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
      </form>

      <form method="post" action="connect_inicio.php">
        <button type="button" class="inicio" name="inicio_button" onclick="redirecionar('connect_perfil.php')">
          Início
        </button>
      </form>

    </div>
  </header>

  <p class="titulo">Histórico</p>


  <form method="post" action="connect_historico.php">
  <div class="form-caixa">

    <div class="buscar_data">
      <label for="username">Data:</label>
      <input class="textbox-n" placeholder="XX/XX/20XX" name="data_ocorrencia" type="text" onfocus="(this.type='date')" onblur="(this.type='date')" />
    </div>

    <button type="submit" class="pesquisar_button" name="pesquisar_button">
          Pesquisar relatório
        </button>

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