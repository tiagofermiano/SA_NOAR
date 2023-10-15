function validarNumero(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro");

    // Verifica se o valor inserido contém caracteres que não são números
    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Digite apenas números.";
        input.value = numero.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos
    } else {
        mensagemErro.textContent = "";
    }
};

function mostrarOcultarSenha(inputId, olhoId) {
  var senhaInput = document.getElementById(inputId);
  var olhoIcon = document.getElementById(olhoId);

  if (senhaInput.type === "password") {
    senhaInput.type = "text";
    olhoIcon.classList.remove("fa-eye-slash");
    olhoIcon.classList.add("fa-eye");
  } else {
    senhaInput.type = "password";
    olhoIcon.classList.remove("fa-eye");
    olhoIcon.classList.add("fa-eye-slash");
  }
}

function verificarSenhas() {
  var senha = document.getElementById('senha').value;
  var confirmarSenha = document.getElementById('confirmarsenha').value;
  var mensagemErro = document.getElementById('mensagemErro-1');

  if (senha === confirmarSenha) {
    // Senhas são iguais, limpe a mensagem de erro
    mensagemErro.textContent = '';
  } else {
    // Senhas são diferentes, exiba a mensagem de erro
    mensagemErro.textContent = 'As senhas não são iguais. Por favor, tente novamente.';
  }
}