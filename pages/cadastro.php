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

  <script src="cadastro.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



  <link rel="stylesheet" type="text/css" href="cadastro.css">

</head>

<body>

  <header>
    <div class="container">
      <img class="logo" alt="LOGO NOAR" src="SA_NOAR/images/logo_socorro_top.png">
    </div>
  </header>

<!-- div pra caixa de login, input de usuário e senha e pro titulo "Login" -->
<body>
    <p class="titulo">Cadastro</p>
  <div class="form-caixa">

  <?php
  if($_SESSION['status_cadastro']):
    ?>

  <div class="notification is-success">
                      <p>Cadastro efetuado!</p>
                      <p>Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p>
                    </div>
    
    <?php
    endif;
    unset($_SESSION['status_cadastro']);
?>

<?php
  if($_SESSION['usuario_existe']):
    ?>

                    <div class="notification is-info">
                        <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
                    </div>

                    <?php
    endif;
    unset($_SESSION['usuario_existe']);
?>
    
    <form class="form" action="telahome.php" method="post">
      <div class="input-caixatexto">
        <label for="nome">Nome do atendente</label>
        <input type="text" name="nome" id="nome" placeholder="Digite o nome..." required>
      </div>

      <div class="input-caixatexto">
       <label for="userCPF">Digite seu CPF</label>
    <input type="text" id="cpf" name="userCPF" maxlength="11" oninput="validarNumero(this)" placeholder="Digite o CPF..." required>
    <p id="mensagemErro" style="color: red;"></p>

    <div class="input-caixatexto">
      <label for="email">Digite seu email</label>
   <input type="text" id="email" name="email" placeholder="Digite seu email..." required>


   <div class="input-caixasenha">
    <label for="passwords">Digite sua senha</label>
    <div class="botaomostrar">
      <input type="password" name="passwords" id="senha" placeholder="Digite sua senha...">


      <button type="button" id="mostrarSenha" onclick="mostrarOcultarSenha('senha', 'olhoSenha')" style="outline: none; border: none;">
        <span id="olhoSenha" class="fa fa-eye-slash"></span>
      </button>
    </div>
  </div>
  
  <div class="input-caixasenha">
    <label for="passwords">Confirmar senha</label>
    <div class="botaomostrarsenha">
      <input type="password" name="passwords" id="senha" placeholder="Confirme sua senha...">


      <button type="button" id="mostrarConfirmarSenha" onclick="mostrarOcultarSenha('confirmarsenha', 'olhoConfirmarSenha')" style="outline: none; border: none;">
        <span id="olhoConfirmarSenha" class="fa fa-eye-slash"></span>
      </button>
    </div>
  </div>

  <div id="mensagemErro-1" style="color: red;"></div>

      
<!-- botão de entrar -->      
      <input type="submit" class="entrar1" name="Entrar" style="background-color: #030060; color: white;" onclick="verificarSenhas()">

    </form>

  </div>
</body>
</html>