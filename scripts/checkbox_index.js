function toggleRespiratorio() {
    var respiratorioCheckbox = document.querySelector('.main-checkbox-resp');
    var checkboxesRespiratorio = document.querySelectorAll('.sub-checkbox-resp');

    checkboxesRespiratorio.forEach(function (checkbox) {
        if (respiratorioCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function toggleDiabetes() {
    var diabetesCheckbox = document.querySelector('.main-checkbox-diab');
    var checkboxesDiabetes = document.querySelectorAll('.sub-checkbox-diab');

    checkboxesDiabetes.forEach(function (checkbox) {
        if (diabetesCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function toggleTransporte() {
    var transporteCheckbox = document.querySelector('.main-checkbox-transp');
    var checkboxesTransporte = document.querySelectorAll('.sub-checkbox-transp');

    checkboxesTransporte.forEach(function (checkbox) {
        if (transporteCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function validarLetra(input) {
    var texto = input.value;
    var mensagemErro = document.getElementById("mensagemErro-1");


    if (/[^a-zA-Z\s]/.test(texto)) {
        mensagemErro.textContent = "Digite apenas letras.";
        input.value = texto.replace(/[^a-zA-Z\s]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

// função para permitir que o usuário escreva apenas numeros na idade
function validarNumeroIdadePac(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-2");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Digite apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroRGCPFPaciente(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-3");
  
    // Remove caracteres não numéricos, exceto letras, espaços, pontos e traços
    numero = numero.replace(/[^0-9a-zA-Z\s\.\-]/g, '');
  
    // Formatar CPF e RG conforme necessário
    if (/[^0-9]/.test(numero)) {
      mensagemErro.textContent = "Digite apenas números.";
      input.value = numero.replace(/[^0-9]/g, '');
    } else {
      mensagemErro.textContent = "";
  
      // Formate o CPF e o RG em variáveis intermediárias
      var cpfFormatado = formatarCPF(numero);
      var rgFormatado = formatarRG(numero);
  
      // Defina o valor do campo de entrada com as versões formatadas
      if (cpfFormatado !== null) {
        input.value = cpfFormatado;
      } else if (rgFormatado !== null) {
        input.value = rgFormatado;
      }
    }
  }
  
  // Função para formatar CPF
  function formatarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos
    if (cpf.length === 11) {
      cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4'); // Formatação
      return cpf;
    }
    return null; // Retorna null se o CPF não tiver 11 dígitos
  }
  
  // Função para formatar RG
  function formatarRG(rg) {
    // Remove todos os caracteres não numéricos
    rg = rg.replace(/\D/g, '');
  
    // Verifica o comprimento do RG e formata conforme necessário
    if (rg.length <= 2) {
      return rg;
    } else if (rg.length <= 9) {
      return rg.replace(/(\d{1})(\d{3})(\d{3})/, '$1.$2.$3');
    }
    return null; // Retorna null se o RG não estiver em um formato válido
  }
  
  

//função para permitir apenas a escrita de letras no nome do acompanhante
function validarNomeAcomp(input) {
    var texto = input.value;
    var mensagemErro = document.getElementById("mensagemErro-4");

    if (/[^a-zA-Z\s]/.test(texto)) {
        mensagemErro.textContent = "Digite apenas letras.";
        input.value = texto.replace(/[^a-zA-Z\s]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

//funcao para permitr apenas a escrita de numeros na idade do acompanhante
function validarNumeroIdadeAcomp(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-5");

    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Digite apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

//funcao para permitir apenas a escrita de numeros na ocorrencia
function validarNumeroOcorr(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-6");

    if (/[^0-9, ]/.test(numero)) {
        mensagemErro.textContent = "Digite apenas números.";
        input.value = numero.replace(/[^0-9, ]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

//funcao para permitir apenas a escrita de numeros no codigo IR
function validarCodIR(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-7");

    if (/[^0-9, ]/.test(numero)) {
        mensagemErro.textContent = "Digite apenas números.";
        input.value = numero.replace(/[^0-9, ]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

//funcao para permitir apenas a escrita de numeros no codigo PS
function validarCodPS(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-8");

    if (/[^0-9, ]/.test(numero)) {
        mensagemErro.textContent = "Digite apenas números.";
        input.value = numero.replace(/[^0-9, ]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

//funcao para permitir apenas a escrita de numeros no codigo SIA/SUS
function validarCodSIASUS(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-9");

    if (/[^0-9, ]/.test(numero)) {
        mensagemErro.textContent = "Digite apenas números.";
        input.value = numero.replace(/[^0-9, ]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

//funcao para o usuario digitar os numeros da pressao arterial
function formatarMedidaPressao(input) {
    // Remove todos os caracteres não numéricos
    var valor = input.value.replace(/\D/g, '');
  
    // Formata o valor inserido
    if (valor.length === 2) {
      input.value = valor + 'x';
    } else if (valor.length >= 4) {
      var parte1 = valor.slice(0, 2);
      var parte2 = valor.slice(2, 4);
      input.value = parte1 + 'x' + parte2 + 'mmHg';
    } else {
      input.value = valor;
    }
  }
  
  
  
  
  
  

  const inputElement = document.getElementById("username");

  inputElement.addEventListener("input", function() {
      const inputValue = inputElement.value;
      const numbers = inputValue.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
      if (numbers.length === 3) {
          inputElement.value = numbers + " B.C.P.M.";
      } else {
          inputElement.value = numbers; // Caso contrário, apenas mostra os números digitados
      }
  });

  
  
  
  
  