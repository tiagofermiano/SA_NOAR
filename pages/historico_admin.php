<?php
include('protect.php');
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
      Conectado: <?php echo $_SESSION['nome'];?>
  </div>

  <a href="telaperfil_admin.php"><div class="perfil">
        Perfil
    </div></a>

    <a href="telahome_admin.php"><div class="inicio">
        Início
    </div></a>

</div>
  </header>

  <p class="titulo">Histórico</p>

  <p id="sem-relatorio">Ainda não há relatório registrado.</p>

  <div id="container-relatorios">
    <div id="relatorio">
      <p id="numero-ocorrencia">000</p>
      <div id="info-ocorrencia">
        <p id="nome-paciente">Paciente: Fernando Bagos Filho</p>
        <p id="idade-paciente">Idade: 247</p>
        <p id="local-ocorrencia">Local: Rua Fernadinho bagosinho, 777</p>
      </div>
      <div id="botao-ver">
        <a class="botao">
          Acessar
        </a>
      </div>

    </div>
  </div>


</body>

</html>