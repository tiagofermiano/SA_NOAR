function capitalizarPalavrasIniciais(input) {
    input.value = input.value.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
        return a.toUpperCase();
    });
}

function validarLetraNomePaciente(input) {
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

document.getElementById('idadePaciente').addEventListener('input', function () {
    var idade = parseInt(this.value, 10);
    console.log(idade)
    console.log("Teste");
    var containerMenorDe5Anos = document.querySelector('.container-Menor-de-5-anos');
    var containerMaioresDe5Anos = document.querySelector('.container-Maiores-de-5-anos');

    if (idade < 5) {
        containerMenorDe5Anos.classList.remove('hidden');
        containerMaioresDe5Anos.classList.add('hidden');
    } else {
        containerMenorDe5Anos.classList.add('hidden');
        containerMaioresDe5Anos.classList.remove('hidden');
    }
});

document.getElementById('sexoSelect').addEventListener('change', function () {
    var sexo = this.value;
    console.log(sexo);
    var containerSexo = document.querySelector('.gestacional');

    if (sexo === "Feminino") {
        containerSexo.classList.remove('hidden');
    } else {
        containerSexo.classList.add('hidden');
    }
});


document.getElementById('idadePaciente').addEventListener('input', function() {
    var idade = parseInt(this.value);

    if (idade < 12) {
        document.getElementById('imagem-corpo-adulto').classList.add('hidden');
        document.getElementById('imagem-corpo-crianca').classList.remove('hidden');
    } else {
        document.getElementById('imagem-corpo-adulto').classList.remove('hidden');
        document.getElementById('imagem-corpo-crianca').classList.add('hidden');
    }
});        function formatarDocumento(input) {
    // Remove caracteres não numéricos
    const apenasNumeros = input.value.replace(/\D/g, '');

    // Verifica se o valor restante é numérico
    if (!(/^\d+$/.test(apenasNumeros))) {
        // Mostra a mensagem de erro
        document.getElementById('mensagemErro-3').innerText = 'Digite apenas números';
        // Limpa o valor do input
        input.value = '';
    } else {
        // Limpa a mensagem de erro
        document.getElementById('mensagemErro-3').innerText = '';

        // Formatação para CPF (11 dígitos)
        if (apenasNumeros.length === 11) {
            const cpfFormatado = apenasNumeros.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            input.value = cpfFormatado;
        }
        // Formatação para RG (pode variar)
        else if (apenasNumeros.length <= 9) {
            const rgFormatado = apenasNumeros.replace(/(\d{1,2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4');
            input.value = rgFormatado;
        }
    }
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

function selectCheckVitimaEra(checkbox) {
    // Obter o nome do grupo da checkbox atual
    var groupName = checkbox.getAttribute('name');

    // Obter todas as checkboxes com o mesmo nome (pertencentes ao mesmo grupo)
    var checkboxes = document.querySelectorAll('input[name="' + groupName + '"]');

    // Desmarcar todas as checkboxes dentro do grupo
    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
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

var input = document.getElementById("autoCompleteKM");

function autoCompleteKM(input) {
    var valor = input.value;
    var mensagemErro = document.getElementById("mensagemErro-40");

    if (event.inputType === "deleteContentBackward") {
        input.value = valor.slice(0, -1);
    } else {
        var valorNumerico = valor.replace(/\D/g, '');

        if (valorNumerico.length === 0) {
            mensagemErro.textContent = "Digite apenas números.";
            input.value = valor.replace(/[^0-9, ]/g, ''); // Correção aqui
        } else {
            var parte1 = valorNumerico.slice(0, 5);
            input.value = parte1 + ' Km';
            mensagemErro.textContent = "";
        }
    }
}

//funcao para permitir apenas a escrita de numeros usb
function validarNumeroUSB(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-25");

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

//funcao para tipo de ocorrencia, selecionar somente uma opção
function selectCheckOcorrencia(checkbox) {
    // Obter o nome do grupo da checkbox atual
    var groupName = checkbox.getAttribute('name');

    // Obter todas as checkboxes com o mesmo nome (pertencentes ao mesmo grupo)
    var checkboxes = document.querySelectorAll('input[name="' + groupName + '"]');

    // Desmarcar todas as checkboxes dentro do grupo
    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}



var input = document.getElementById("medidaPressao1");

function formatarMedidaPressao(input) {
    var valor = input.value;
    var mensagemErro = document.getElementById("mensagemErro-26");

    if (event.inputType === "deleteContentBackward") {
        input.value = valor.slice(0, -1);
    }
    else {
        var valorNumerico = valor.replace(/\D/g, '');

        if (valorNumerico.length === 3) {
            input.value = valorNumerico + 'x';
            mensagemErro.textContent = "";
        } else if (valorNumerico.length >= 4) {
            var parte1 = valorNumerico.slice(0, 3);
            var parte2 = valorNumerico.slice(3, 6);
            input.value = parte1 + 'x' + parte2 + 'mmHg';
            mensagemErro.textContent = "";
        } else {
            input.value = valorNumerico;
            mensagemErro.textContent = "Digite apenas números.";
        }
    }
}
  
var input = document.getElementById("completePulso");

function completePulso(input) {
    var valor = input.value;
    var mensagemErro = document.getElementById("mensagemErro-23");

    if (event.inputType === "deleteContentBackward") {
        input.value = valor.slice(0, -1);
    }
    else {
        var valorNumerico = valor.replace(/\D/g, '');

        if (valorNumerico.length === 2) {
            mensagemErro.textContent = "";
        } else if (valorNumerico.length >= 3) {
            var parte1 = valorNumerico.slice(0, 3);
            input.value = parte1 + ' B.C.P.M.';
            mensagemErro.textContent = "";
        } else {
            input.value = valorNumerico;
            mensagemErro.textContent = "Digite apenas números.";
        }
    }
}

var input = document.getElementById("formatRespiration");

function formatRespiration(input) {
    var valor = input.value;
    var mensagemErro = document.getElementById("mensagemErro-12");

    if (event.inputType === "deleteContentBackward") {
        input.value = valor.slice(0, -1);
    }
    else {
        var valorNumerico = valor.replace(/\D/g, '');

        if (valorNumerico.length === 1) {
            mensagemErro.textContent = "";
        } else if (valorNumerico.length >= 2) {
            var parte1 = valorNumerico.slice(0, 2);
            input.value = parte1 + ' M.R.M.';
            mensagemErro.textContent = "";
        } else {
            input.value = valorNumerico;
            mensagemErro.textContent = "Digite apenas números.";
        }
    }
}

var input = document.getElementById("completeSaturacao");

function completeSaturacao(input) {
    var valor = input.value;
    var mensagemErro = document.getElementById("mensagemErro-22");

    if (event.inputType === "deleteContentBackward") {
        input.value = valor.slice(0, -1);
    }
    else {
        var valorNumerico = valor.replace(/\D/g, '');

        if (valorNumerico.length === 1) {
            mensagemErro.textContent = "";
        } else if (valorNumerico.length >= 2) {
            var parte1 = valorNumerico.slice(0, 2);
            input.value = parte1 + ' %';
            mensagemErro.textContent = "";
        } else {
            input.value = valorNumerico;
            mensagemErro.textContent = "Digite apenas números.";
        }
    }
}

var input = document.getElementById("completeWithHgt");

function completeWithHgt(input) {
    var valor = input.value;
    var mensagemErro = document.getElementById("mensagemErro-20");

    if (event.inputType === "deleteContentBackward") {
        input.value = valor.slice(0, -1);
    }
    else {
        var valorNumerico = valor.replace(/\D/g, '');

        if (valorNumerico.length === 2) {
            mensagemErro.textContent = "";
        } else if (valorNumerico.length >= 3) {
            var parte1 = valorNumerico.slice(0, 3);
            input.value = parte1 + ' mg/dL';
            mensagemErro.textContent = "";
        } else {
            input.value = valorNumerico;
            mensagemErro.textContent = "Digite apenas números.";
        }
    }
}

var input = document.getElementById("NumeroTemperatura");

function NumeroTemperatura(input) {
    var valor = input.value;
    var mensagemErro = document.getElementById("mensagemErro-21");

    if (event.inputType === "deleteContentBackward") {
        input.value = valor.slice(0, -1);
    }
    else {
        var valorNumerico = valor.replace(/[^0-9,]/g, '');

        if (valorNumerico.length === 1) {
            mensagemErro.textContent = "";
        } else if (valorNumerico.length >= 2) {
            var parte1 = valorNumerico.slice(0, 4);
            input.value = parte1 + ' °C';
            mensagemErro.textContent = "";
        } else {
            input.value = valorNumerico;
            mensagemErro.textContent = "Digite apenas números.";
        }
    }
}

// checkbox > 2 seg e 2 seg

document.addEventListener('DOMContentLoaded', function() {
    const scalesCheckbox = document.getElementById('scales');
    const hornsCheckbox = document.getElementById('horns');

    scalesCheckbox.addEventListener('change', function() {
        if (this.checked) {
            hornsCheckbox.disabled = true;
        } else {
            hornsCheckbox.disabled = false;
        }
    });

    hornsCheckbox.addEventListener('change', function() {
        if (this.checked) {
            scalesCheckbox.disabled = true;
        } else {
            scalesCheckbox.disabled = false;
        }
    });
});

// checkbox NORMAL e ANORMAL

const normalscalesCheckbox = document.getElementById('normal');
const anormalhornsCheckbox = document.getElementById('anormal');

normalscalesCheckbox.addEventListener('change', function() {
    if (this.checked) {
        anormalhornsCheckbox.disabled = true;
    } else {
        anormalhornsCheckbox.disabled = false;
    }
});

anormalhornsCheckbox.addEventListener('change', function() {
    if (this.checked) {
        normalscalesCheckbox.disabled = true;
    } else {
        normalscalesCheckbox.disabled = false;
    }
});

const inputElement = document.getElementById("username");

// Adiciona um ouvinte de evento de entrada para chamar a função
inputElement.addEventListener("input", function () {
    completeWithDegreeC(this);
});


//funcao para validar apenas letras no M de atendimento
function validarAtendimentoM(input) {
    var texto = input.value;
    var mensagemErro = document.getElementById("mensagemErro-14");

    if (/[^a-zA-Z\s]/.test(texto)) {
        mensagemErro.textContent = "Digite apenas letras.";
        input.value = texto.replace(/[^a-zA-Z\s]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}


//funcao para validar apenas letras no S1 de atendimento
function validarS1(input) {
    var texto = input.value;
    var mensagemErro = document.getElementById("mensagemErro-15");

    if (/[^a-zA-Z\s]/.test(texto)) {
        mensagemErro.textContent = "Digite apenas letras.";
        input.value = texto.replace(/[^a-zA-Z\s]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

//funcao para validar apenas letras no S2 de atendimento
function validarS2(input) {
    var texto = input.value;
    var mensagemErro = document.getElementById("mensagemErro-16");

    if (/[^a-zA-Z\s]/.test(texto)) {
        mensagemErro.textContent = "Digite apenas letras.";
        input.value = texto.replace(/[^a-zA-Z\s]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

//funcao para validar apenas letras no S3 de atendimento
function validarS3(input) {
    var texto = input.value;
    var mensagemErro = document.getElementById("mensagemErro-17");

    if (/[^a-zA-Z\s]/.test(texto)) {
        mensagemErro.textContent = "Digite apenas letras.";
        input.value = texto.replace(/[^a-zA-Z\s]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

//funcao para validar apenas letras no demandante de atendimento
function validarDemandante(input) {
    var texto = input.value;
    var mensagemErro = document.getElementById("mensagemErro-18");

    if (/[^a-zA-Z\s]/.test(texto)) {
        mensagemErro.textContent = "Digite apenas letras.";
        input.value = texto.replace(/[^a-zA-Z\s]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}




function toggleInputCit() {
    var checkbox = document.getElementById("myCheckbox");
    var input = document.getElementById("myInput");

    if (checkbox.checked) {
        input.disabled = false; // Habilita a caixa de texto
    } else {
        input.disabled = true; // Desabilita a caixa de texto
    }
}

//funcao para avaliação de cinametica, SIM E NAO
function selectCheckDistúrbio(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckDistúrbio');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

function selectCheckCapacete(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckCapacete');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

function selectCheckCinto(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckCinto');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

function selectCheckParabrisa(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckParabrisa');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

function selectCheckCaminhando(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckCaminhando');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

function selectCheckPainel(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckPainel');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

function selectCheckVolante(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckVolante');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}


//funcao para selecionar só uma checkbox perfusao
function selectCheckPerfusaoMaiorDois(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckPerfusaoMaiorDois');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }
  
//funcao para selecionar só uma checkbox normal/anormal  
  function selectCheckNormalAnormal(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckNormalAnormal');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }
  
    
    
//funcao para selecionar somente uma checkbox no nivel de consciencia maior de 5 anos    
    function selectAberturaOcularMaior5(checkbox) {
        var checkboxes = document.querySelectorAll('.checkAberturaOcularMaior5');

        checkboxes.forEach(function (cb) {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
    }

    function selectRespostaVerbalMaior5(checkbox) {
        var checkboxes = document.querySelectorAll('.checkRespostaVerbalMaior5');

        checkboxes.forEach(function (cb) {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
    }

    function selectRespostaMotoraMaior5(checkbox) {
        var checkboxes = document.querySelectorAll('.checkRespostaMotoraMaior5');

        checkboxes.forEach(function (cb) {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
    }

//funcao para selecionar somente uma checkbox no nivel de consciencia menor de 5 anos    
function selectAberturaOcularMenor5(checkbox) {
    var checkboxes = document.querySelectorAll('.checkAberturaOcularMenor5');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

function selectRespostaVerbalMenor5(checkbox) {
    var checkboxes = document.querySelectorAll('.checkRespostaVerbalMenor5');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

function selectRespostaMotoraMenor5(checkbox) {
    var checkboxes = document.querySelectorAll('.checkRespostaMotoraMenor5');

    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

//funcao para apenas numeros no total gcs
var gcs1Input = document.getElementById("gcs1");

gcs1Input.addEventListener("input", function () {
  gcs1Input.value = gcs1Input.value.replace(/[^0-9]/g, "");
});


var gcsInput = document.getElementById("gcs");

gcsInput.addEventListener("input", function () {
  gcsInput.value = gcsInput.value.replace(/[^0-9]/g, "");
});


////////////////////////////




//funcao para selecionar só uma checkbox decisão transporte  
function selectCheckTransporte(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckTransporte');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }

//funcao para selecionar só uma checkbox anamnese médica 
function selectCheckAcontOutrasVezes(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckAcontOutrasVezes');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }

  function selecionarCheckboxAconteceuOutrasVezes(checkbox) {
    var checkboxSim = document.getElementById("selectCheckAconteceuOutrasVezes1");
    var checkboxNao = document.getElementById("selectCheckAconteceuOutrasVezes2");

    if (checkbox === checkboxSim) {
        checkboxNao.checked = false;
    } else if (checkbox === checkboxNao) {
        checkboxSim.checked = false;
    }

    // Adicione uma verificação extra
    var checkboxes = document.querySelectorAll('.selectCheckAconteceuOutrasVezes');
    var checkboxSim = checkboxes[0];
    var checkboxNao = checkboxes[1];

    if (checkbox === checkboxNao && checkboxSim.checked) {
        habilitarContainerAconteceu(checkboxSim);
    }
}

function habilitarContainerAconteceu(checkbox) {
    var containerAconteceu = document.querySelector('.container-aconteceu');

    if (checkbox.id === "selectCheckAconteceuOutrasVezes1" && checkbox.checked) {
        containerAconteceu.classList.remove('hidden');
    } else {
        containerAconteceu.classList.add('hidden');
    }
}

///////////////////////////////////////////////////////////////////////

  function selectCheckProblemaSaude(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckProblemaSaude');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }  

  function selecionarCheckboxProblemaSaude(checkbox) {
    var checkboxSim = document.getElementById("selectCheckProblemaSaude1");
    var checkboxNao = document.getElementById("selectCheckProblemaSaude2");

    if (checkbox === checkboxSim) {
        checkboxNao.checked = false;
    } else if (checkbox === checkboxNao) {
        checkboxSim.checked = false;
    }

    // Adicione uma verificação extra
    var checkboxes = document.querySelectorAll('.selectCheckProblemaSaude');
    var checkboxSim = checkboxes[0];
    var checkboxNao = checkboxes[1];

    if (checkbox === checkboxNao && checkboxSim.checked) {
        habilitarContainerPrbSaude(checkboxSim);
    }
}

function habilitarContainerPrbSaude(checkbox) {
    var containerPrbSaude = document.querySelector('.container-PrbSaude');

    if (checkbox.id === "selectCheckProblemaSaude1" && checkbox.checked) {
        containerPrbSaude.classList.remove('hidden');
    } else {
        containerPrbSaude.classList.add('hidden');
    }
}

//////////////////////////////////////////////////////////////////////////

  function selectCheckMedicacao(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckMedicacao');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }  
  
  function selecionarCheckboxMedicacao(checkbox) {
    var checkboxSim = document.getElementById("selectCheckMedicacao1");
    var checkboxNao = document.getElementById("selectCheckMedicacao2");

    if (checkbox === checkboxSim) {
        checkboxNao.checked = false;
    } else if (checkbox === checkboxNao) {
        checkboxSim.checked = false;
    }

    // Adicione uma verificação extra
    var checkboxes = document.querySelectorAll('.selectCheckMedicacao');
    var checkboxSim = checkboxes[0];
    var checkboxNao = checkboxes[1];

    if (checkbox === checkboxNao && checkboxSim.checked) {
        habilitarContainerMedicacao(checkboxSim);
    }
}

function habilitarContainerMedicacao(checkbox) {
    var containerMedicacao = document.querySelector('.container-medicacao');

    if (checkbox.id === "selectCheckMedicacao1" && checkbox.checked) {
        containerMedicacao.classList.remove('hidden');
    } else {
        containerMedicacao.classList.add('hidden');
    }
}

function habilitarContainerMedicacaoQuais(checkbox) {
    var containerMedicacao = document.querySelector('.container-medicacao-quais');

    if (checkbox.id === "selectCheckMedicacao1" && checkbox.checked) {
        containerMedicacao.classList.remove('hidden');
    } else {
        containerMedicacao.classList.add('hidden');
    }
}


/////////////////////////////////////////////////////////////////////////
  function selectCheckAlergico(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckAlergico');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }   


  function selecionarCheckboxAlergico(checkbox) {
    var checkboxSim = document.getElementById("selectCheckAlergico1");
    var checkboxNao = document.getElementById("selectCheckAlergico2");

    if (checkbox === checkboxSim) {
        checkboxNao.checked = false;
    } else if (checkbox === checkboxNao) {
        checkboxSim.checked = false;
    }

    // Adicione uma verificação extra
    var checkboxes = document.querySelectorAll('.selectCheckAlergico');
    var checkboxSim = checkboxes[0];
    var checkboxNao = checkboxes[1];

    if (checkbox === checkboxNao && checkboxSim.checked) {
        habilitarContainerAlergico(checkboxSim);
    }
}

function habilitarContainerAlergico(checkbox) {
    var containerAlergico = document.querySelector('.container-Alergico');

    if (checkbox.id === "selectCheckAlergico1" && checkbox.checked) {
        containerAlergico.classList.remove('hidden');
    } else {
        containerAlergico.classList.add('hidden');
    }
}

///////////////////////////////////////////////////////////////////////////////    

  function selectCheckAlimento6horas(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckAlimento6horas');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }   

  function habilitarContainerAlimento_espec(checkbox) {
    var containerAlergico = document.querySelector('.container-alimento-espec');

    if (checkbox.id === "selectCheckAlimento6horas1" && checkbox.checked) {
        containerAlergico.classList.remove('hidden');
    } else {
        containerAlergico.classList.add('hidden');
    }
}

function habilitarContainerAlimento_horas(checkbox) {
    var containerAlergico = document.querySelector('.container-alimento-horas');

    if (checkbox.id === "selectCheckAlimento6horas1" && checkbox.checked) {
        containerAlergico.classList.remove('hidden');
    } else {
        containerAlergico.classList.add('hidden');
    }
}

  function selectCheckPreNatal_simnao(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckPreNatal_simnao');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  } 
  
  function selectCheckComplicacoes(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckComplicacoes');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }   
  
  function selectCheckPrimeiroFilho(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckPrimeiroFilho');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }  
  
  function selectCheckPressaoEvacuar(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckPressaoEvacuar');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }  
  
  function selectCheckRupturaBolsa(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckRupturaBolsa');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }  

  function selectCheckInspecaoVisual(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckInspecaoVisual');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }  

  function selectCheckPartoRealizado(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckPartoRealizado');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }   

  function selectCheckSexoBebe(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckSexoBebe');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  } 

  function selecionarCheckbox(checkbox) {
    var checkboxSim = document.getElementById("selectCheckPreNatal_simnao1");
    var checkboxNao = document.getElementById("selectCheckPreNatal_simnao2");
    
    if (checkbox === checkboxSim) {
        checkboxNao.checked = false;
    } else if (checkbox === checkboxNao) {
        checkboxSim.checked = false;
    }
}

function habilitarContainer(checkbox) {
    var containerNomeMedico = document.querySelector('.container-nome-medico');
    
    if (checkbox.id === "selectCheckPreNatal_simnao1" && checkbox.checked) {
        containerNomeMedico.classList.remove('hidden');
    } else {
        containerNomeMedico.classList.add('hidden');
    }
    
    // Adicione uma verificação extra
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var simCheckbox = checkboxes[0]; // Assumindo que "SIM" é o primeiro checkbox
    var naoCheckbox = checkboxes[1]; // Assumindo que "NÃO" é o segundo checkbox
    
    if (checkbox === naoCheckbox && simCheckbox.checked) {
        containerNomeMedico.classList.add('hidden');
    }
}


function selecionarCheckboxPrimeiroFilho(checkbox) {
    var checkboxSim = document.getElementById("selectCheckPrimeiroFilho1");
    var checkboxNao = document.getElementById("selectCheckPrimeiroFilho2");

    if (checkbox === checkboxSim) {
        checkboxNao.checked = false;
    } else if (checkbox === checkboxNao) {
        checkboxSim.checked = false;
    }

    // Verifique se a caixa "Não" está marcada e chame a função habilitarContainerQuantos
    if (checkbox === checkboxNao) {
        habilitarContainerQuantos(checkbox);
    }
}

function habilitarContainerQuantos(checkbox) {
    var containerQuantos = document.querySelector('.container-quantos');

    if (checkbox.id === "selectCheckPrimeiroFilho2" && checkbox.checked) {
        containerQuantos.classList.remove('hidden');
    } else {
        containerQuantos.classList.add('hidden');
    }
}


document.querySelector('#sexoSelect').addEventListener('change', function () {
    console.log("ok");
    var sexo = this.value;
    var container_gestacional = document.querySelector('.gestacional');
    
    if (sexo === 'Feminino') {
        container_gestacional.classList.remove('hidden');
    } else {
        container_gestacional.classList.add('hidden');
    }
});
document.getElementById('sexoSelect').addEventListener('change', function () {
    var sexo = this.value;
    var selectElement = this;
    console.log(sexo);

    if (sexo === 'Feminino') {
        selectElement.style.backgroundColor = 'pink';
    } else {
        selectElement.style.backgroundColor = '';
    }
});

//funcao para selecionar tamanho Materiais descartáveis utilizados:
function habilitarCheckboxesAtadura(inputQuantidade) {
    const checkboxes = document.querySelectorAll('.sub-checkbox-atadura');
  
    // Obtém o valor do input de quantidade
    const quantidadeString = inputQuantidade.value;
  
    // Verifica se a quantidade contém apenas números
    const quantidadeValida = /^[0-9]+$/.test(quantidadeString);
  
    // Habilita ou desabilita as checkboxes com base na validade da quantidade
    checkboxes.forEach(checkbox => {
      checkbox.disabled = !quantidadeValida || parseInt(quantidadeString, 10) <= 0;
    });
  
    // Exibe uma mensagem de erro se a quantidade for inválida
    const mensagemErro = document.getElementById('mensagemErro-27');
    mensagemErro.textContent = quantidadeValida && parseInt(quantidadeString, 10) > 0 ? '' : 'Apenas números.';
}

function habilitarCheckboxesKits(inputQuantidade) {
    const checkboxes = document.querySelectorAll('.sub-checkbox-kits');
  
    // Obtém o valor do input de quantidade
    const quantidadeString = inputQuantidade.value;
  
    // Verifica se a quantidade contém apenas números
    const quantidadeValida = /^[0-9]+$/.test(quantidadeString);
  
    // Habilita ou desabilita as checkboxes com base na validade da quantidade
    checkboxes.forEach(checkbox => {
      checkbox.disabled = !quantidadeValida || parseInt(quantidadeString, 10) <= 0;
    });
  
    // Exibe uma mensagem de erro se a quantidade for inválida
    const mensagemErro = document.getElementById('mensagemErro-30');
    mensagemErro.textContent = quantidadeValida && parseInt(quantidadeString, 10) > 0 ? '' : 'Apenas números.';
}

function habilitarCheckboxesTalas(inputQuantidade) {
    const checkboxes = document.querySelectorAll('.sub-checkbox-talas');
  
    // Obtém o valor do input de quantidade
    const quantidadeString = inputQuantidade.value;
  
    // Verifica se a quantidade contém apenas números
    const quantidadeValida = /^[0-9]+$/.test(quantidadeString);
  
    // Habilita ou desabilita as checkboxes com base na validade da quantidade
    checkboxes.forEach(checkbox => {
      checkbox.disabled = !quantidadeValida || parseInt(quantidadeString, 10) <= 0;
    });
  
    // Exibe uma mensagem de erro se a quantidade for inválida
    const mensagemErro = document.getElementById('mensagemErro-37');
    mensagemErro.textContent = quantidadeValida && parseInt(quantidadeString, 10) > 0 ? '' : 'Apenas números.';
}

function habilitarCheckboxesColar(inputQuantidade) {
    const checkboxes = document.querySelectorAll('.sub-checkbox-colar');
  
    // Obtém o valor do input de quantidade
    const quantidadeString = inputQuantidade.value;
  
    // Verifica se a quantidade contém apenas números
    const quantidadeValida = /^[0-9]+$/.test(quantidadeString);
  
    // Habilita ou desabilita as checkboxes com base na validade da quantidade
    checkboxes.forEach(checkbox => {
      checkbox.disabled = !quantidadeValida || parseInt(quantidadeString, 10) <= 0;
    });
  
    // Exibe uma mensagem de erro se a quantidade for inválida
    const mensagemErro = document.getElementById('mensagemErro-39');
    mensagemErro.textContent = quantidadeValida && parseInt(quantidadeString, 10) > 0 ? '' : 'Apenas números.';
}

function habilitarCheckboxesKed(inputQuantidade) {
    const checkboxes = document.querySelectorAll('.sub-checkbox-ked');
  
    // Obtém o valor do input de quantidade
    const quantidadeString = inputQuantidade.value;
  
    // Verifica se a quantidade contém apenas números
    const quantidadeValida = /^[0-9]+$/.test(quantidadeString);
  
    // Habilita ou desabilita as checkboxes com base na validade da quantidade
    checkboxes.forEach(checkbox => {
      checkbox.disabled = !quantidadeValida || parseInt(quantidadeString, 10) <= 0;
    });
  
    // Exibe uma mensagem de erro se a quantidade for inválida
    const mensagemErro = document.getElementById('mensagemErro-42');
    mensagemErro.textContent = quantidadeValida && parseInt(quantidadeString, 10) > 0 ? '' : 'Apenas números.';
}

function habilitarCheckboxesTTF(inputQuantidade) {
    const checkboxes = document.querySelectorAll('.sub-checkbox-ttf');
  
    // Obtém o valor do input de quantidade
    const quantidadeString = inputQuantidade.value;
  
    // Verifica se a quantidade contém apenas números
    const quantidadeValida = /^[0-9]+$/.test(quantidadeString);
  
    // Habilita ou desabilita as checkboxes com base na validade da quantidade
    checkboxes.forEach(checkbox => {
      checkbox.disabled = !quantidadeValida || parseInt(quantidadeString, 10) <= 0;
    });
  
    // Exibe uma mensagem de erro se a quantidade for inválida
    const mensagemErro = document.getElementById('mensagemErro-44');
    mensagemErro.textContent = quantidadeValida && parseInt(quantidadeString, 10) > 0 ? '' : 'Apenas números.';
}

//funcao para permitir que o usuario digite apenas numeros na quantidade
function validarNumeroQuantidadeAtadura(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-27");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeCateter(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-28");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeCompressa(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-29");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeKits(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-30");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeLuvas(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-31");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeMascara(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-32");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeManta(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-33");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadePas(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-34");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeSonda(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-35");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeSoro(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-36");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeTalas(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-37");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeBase(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-38");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeColar(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-39");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeSegundoColar(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-40");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeCoxins(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-41");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeKed(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-42");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeMaca(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-43");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeTtf(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-44");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeAranha(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-45");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeCabeca(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-46");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}

function validarNumeroQuantidadeCanula(input) {
    var numero = input.value;
    var mensagemErro = document.getElementById("mensagemErro-47");


    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Apenas números.";
        input.value = numero.replace(/[^0-9]/g, '');
    } else {
        mensagemErro.textContent = "";
    }
}



document.getElementById("gerarRelatorioButton").addEventListener("click", function() {
    // Captura o valor do campo de entrada
    var nomePaciente = document.getElementById("nomePaciente").value;
  
    // Crie um novo documento em uma janela separada
    var relatorioWindow = window.open();
    
    // Gere o relatório no novo documento
    relatorioWindow.document.write("<h1>Relatório</h1>");
    relatorioWindow.document.write("<p>Nome do paciente: " + nomePaciente + "</p>");
    
    // Feche o documento após a impressão
    relatorioWindow.print();
    relatorioWindow.close();
  });
  


  // Esconde a div gestacional no carregamento da página
  $(document).ready(function() {
    $(".gestacional").hide();
  });

  function mostrarOcultarDiv() {
    var selectedSexo = $("#sexoSelect").val();
    var gestacionalDiv = $(".gestacional");

    if (selectedSexo === "Feminino") {
      gestacionalDiv.show();
    } else {
      gestacionalDiv.hide();
    }
  }