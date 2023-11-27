<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOAR</title>

  <script src="/scripts/login.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="login.css">

</head>

<body>

  <header>  
    <div class="historico">
        <a href="historico.html">Histórico</a>
    </div>
    <div class="inicio">
        <a href="telahome.php">Início</a>
    </div>
    <div class="perfil">
        <a href="telaperfil.php">Perfil</a>
    </div>
</div>   
</header>

<!-- div pra caixa de login, input de usuário e senha e pro titulo "Login" -->

    <p class="titulo">Login</p>
  <div class="form-caixa">
    
    
  
    <form class="form" method="post" action="connect_login.php">

      <div class="input-caixatexto">
        <label for="userCPF">CPF do atendente</label>
        <input type="text" name="userCPF" id="cpf" placeholder="Digite o CPF..." required>
      </div>
    
      <div class="input-caixatexto">
        <label for="passwords">Senha</label>
        <input type="password" name="passwords" id="senha" placeholder="Digite a senha..." required>
      </div>

        
      <!-- botão de entrar -->   
         
      <button type="submit" name="submit-button" class="entrar1">Entrar</button>
      <small id="form-text"></small>

      <!-- Mensagem de erro -->
      <p id="error-message" style="color: red; display: none; text-align: center; margin-top: 1rem; font-weight: bold">Por favor, preencha todos os campos.</p>
    </form>
    

  </div>
</body>
</html>