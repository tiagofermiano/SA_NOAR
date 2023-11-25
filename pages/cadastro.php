<?php
include('protect.php');
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOAR</title>

  <script src="/scripts/cadastro.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="cadastro.css">

  <script>
    function mostrarOcultarSenha(inputId, olhoId) {
      var input = document.getElementById(inputId);
      var olho = document.getElementById(olhoId);

      if (input.type === "password") {
        input.type = "text";
        olho.className = "fa fa-eye";
      } else {
        input.type = "password";
        olho.className = "fa fa-eye-slash";
      }
    }

    function mostrarConfirmarOcultarSenha(inputId, olhoId) {
      var input = document.getElementById(inputId);
      var olho = document.getElementById(olhoId);

      if (input.type === "password") {
        input.type = "text";
        olho.className = "fa fa-eye";
      } else {
        input.type = "password";
        olho.className = "fa fa-eye-slash";
      }
    }

    function validarCPF(cpf) {
      cpf = cpf.replace(/[^\d]+/g, '');
      if (cpf == '') return false;
      // Elimina CPFs invalidos conhecidos    
      if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false;
      // Valida 1o digito 
      add = 0;
      for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
      rev = 11 - (add % 11);
      if (rev == 10 || rev == 11)
        rev = 0;
      if (rev != parseInt(cpf.charAt(9)))
        return false;
      // Valida 2o digito 
      add = 0;
      for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
      rev = 11 - (add % 11);
      if (rev == 10 || rev == 11)
        rev = 0;
      if (rev != parseInt(cpf.charAt(10)))
        return false;
      return true;
    }
  </script>

</head>

<body>
  <div class="voltar">
            <a href="usuarios.php">Voltar</a>
    </div>

  <p class="titulo">Cadastro</p>
  <div class="form-caixa">

    <form class="form" method="post" action="connect_cadastro.php">
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

          <div class="input-caixatexto">
            <label for="tipo">Escolha seu cargo</label>
            <select id="tipo" name="tipo" required>
            <option value="administrador">Administrador </option>
              <option value="atendente">Atendente </option>
              <option value="bombeiro">Bombeiro</option>
              <option value="outro">Outro</option>
            </select>
          </div>

          <div class="input-caixasenha">
            <label for="passwords">Digite sua senha</label>
            <div class="botaomostrar">
              <input type="password" name="passwords" id="senha" placeholder="Digite sua senha...">

              <button type="button" id="mostrarSenha" onclick="mostrarOcultarSenha('senha', 'olhoSenha')" style="outline: none; border: none;">
                <span id="olhoSenha" class="fa fa-eye-slash"></span>
              </button>
            </div>
          </div>

          <div id="mensagemErro-1" style="color: red;"></div>


          <!-- botão de entrar -->
          <button type="submit" class="entrar1" name="Entrar" style="background-color: #030060; color: white;" onclick="verificarSenhas()">Enviar</button>

    </form>
  </div>
</body>

</html>