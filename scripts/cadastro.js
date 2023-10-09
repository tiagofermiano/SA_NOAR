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
}

function mostrarOcultarSenha() {
    var senhaInput = document.getElementById("password");
    var confirmarSenhaInput = document.getElementById("confirmpassword");
    var botaoMostrar = document.getElementById("mostrarSenha");
  
    if (senhaInput.type === "password") {
      senhaInput.type = "text";
      confirmarSenhaInput.type = "text";
      botaoMostrar.textContent = "Ocultar Senha";
      botaoMostrar.classList.add("clicked"); // Adicione a classe "clicked"
    } else {
      senhaInput.type = "password";
      confirmarSenhaInput.type = "password";
      botaoMostrar.textContent = "Mostrar Senha";
      botaoMostrar.classList.remove("clicked"); // Remova a classe "clicked"
    }
  }