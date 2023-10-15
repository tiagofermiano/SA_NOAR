
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

function toggleObstetrico() {
    var obstetricoCheckbox = document.querySelector('.main-checkbox-obst');
    var checkboxesObstetrico = document.querySelectorAll('.sub-checkbox-obst');

    checkboxesObstetrico.forEach(function (checkbox) {
        if (obstetricoCheckbox.checked) {
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

function toggleMeiosAuxiliares() {
    var MeiosAuxiliaresCheckbox = document.querySelector('.main-checkbox-aux');
    var checkboxesMeiosAuxiliares = document.querySelectorAll('.sub-checkbox-aux');

    checkboxesMeiosAuxiliares.forEach(function (checkbox) {
        if (MeiosAuxiliaresCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function togglePolicia() {
    var PoliciaCheckbox = document.querySelector('.main-checkbox-policia');
    var checkboxesPolicia = document.querySelectorAll('.sub-checkbox-policia');

    checkboxesPolicia.forEach(function (checkbox) {
        if (PoliciaCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function toggleSamu() {
    var SamuCheckbox = document.querySelector('.main-checkbox-Samu');
    var checkboxesSamu = document.querySelectorAll('.sub-checkbox-Samu');

    checkboxesSamu.forEach(function (checkbox) {
        if (SamuCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

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

function validarNumeroRGCPFPaciente(input) {
    var numero = input.value.replace(/[^0-9a-zA-Z\s\.\-]/g, ''); // Remove caracteres não numéricos, exceto letras, espaços, pontos e traços

    // Limite o número de caracteres a 14
    if (numero.length > 14) {
        numero = numero.slice(0, 14); // Limita o valor a 14 caracteres
    }

    var mensagemErro = document.getElementById("mensagemErro-3");

    // Verifique se a entrada contém caracteres não numéricos
    if (/[^0-9]/.test(numero)) {
        mensagemErro.textContent = "Digite apenas números.";
    } else {
        mensagemErro.textContent = "";
    }

    // Formate o CPF e o RG em variáveis intermediárias
    var cpfFormatado = formatarCPF(numero);
    var rgFormatado = formatarRG(numero);

    // Defina o valor do campo de entrada com as versões formatadas
    if (cpfFormatado !== null) {
        input.value = cpfFormatado;
    } else if (rgFormatado !== null) {
        input.value = rgFormatado;
    } else {
        input.value = numero; // Se não for CPF nem RG formatável, mantenha o valor original
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

var input = document.getElementById("medidaPressao");

function formatarMedidaPressao(input) {
    var valor = input.value;
    var mensagemErro = document.getElementById("mensagemErro-26");

    if (event.inputType === "deleteContentBackward") {
        input.value = valor.slice(0, -1);
    }
    else {
        var valorNumerico = valor.replace(/\D/g, '');

        if (valorNumerico.length === 2) {
            input.value = valorNumerico + 'x';
            mensagemErro.textContent = "";
        } else if (valorNumerico.length >= 4) {
            var parte1 = valorNumerico.slice(0, 2);
            var parte2 = valorNumerico.slice(2, 4);
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

var input = document.getElementById("completeWithDegreeC");

function completeWithDegreeC(input) {
    var valor = input.value;
    var mensagemErro = document.getElementById("mensagemErro-21");

    if (event.inputType === "deleteContentBackward") {
        input.value = valor.slice(0, -1);
    }
    else {
        var valorNumerico = valor.replace(/\D/g, '');

        if (valorNumerico.length === 1) {
            mensagemErro.textContent = "";
        } else if (valorNumerico.length >= 2) {
            var parte1 = valorNumerico.slice(0, 2);
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


function toggleMeiosAuxiliares() {
    var meiosCheckbox = document.querySelector('.main-checkbox-meios');
    var checkboxesMeios = document.querySelectorAll('.sub-checkbox-meios');

    checkboxesMeios.forEach(function (checkbox) {
        if (meiosCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function togglePolicia() {
    var policiaCheckbox = document.querySelector('.main-checkbox-policia');
    var checkboxesPolicia = document.querySelectorAll('.sub-checkbox-policia');

    checkboxesPolicia.forEach(function (checkbox) {
        if (policiaCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function toggleSamu() {
    var samuCheckbox = document.querySelector('.main-checkbox-samu');
    var checkboxesSamu = document.querySelectorAll('.sub-checkbox-samu');

    checkboxesSamu.forEach(function (checkbox) {
        if (samuCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
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

function toggleHemorragia(checkbox) {
    var checkboxesInternas = document.querySelectorAll('.sub-checkbox-resp.interna');
    var checkboxesExternas = document.querySelectorAll('.sub-checkbox-resp.externa');

    if (checkbox.checked) {
        checkboxesInternas.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
        checkboxesExternas.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
    } else {
        checkboxesInternas.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox interna
        });
        checkboxesExternas.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox externa
        });
    }
}

function toggleEdema(checkbox) {
    var checkboxesGeneralizado = document.querySelectorAll('.sub-checkbox-resp.generalizado');
    var checkboxesLocalizado = document.querySelectorAll('.sub-checkbox-resp.localizado');

    if (checkbox.checked) {
        checkboxesGeneralizado.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
        checkboxesLocalizado.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
    } else {
        checkboxesGeneralizado.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox interna
        });
        checkboxesLocalizado.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox externa
        });
    }
}

function toggleParada(checkbox) {
    var checkboxesCardiaca = document.querySelectorAll('.sub-checkbox-resp.cardiaca');
    var checkboxesRespiratoria = document.querySelectorAll('.sub-checkbox-resp.respiratoria');

    if (checkbox.checked) {
        checkboxesCardiaca.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
        checkboxesRespiratoria.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
    } else {
        checkboxesCardiaca.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox interna
        });
        checkboxesRespiratoria.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox externa
        });
    }
}

function toggleCianose(checkbox) {
    var checkboxesLabios = document.querySelectorAll('.sub-checkbox-resp.labios');
    var checkboxesExtremidade = document.querySelectorAll('.sub-checkbox-resp.extremidade');

    if (checkbox.checked) {
        checkboxesLabios.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
        checkboxesExtremidade.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
    } else {
        checkboxesLabios.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox interna
        });
        checkboxesExtremidade.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox externa
        });
    }
}

function togglePupilas(checkbox) {
    var checkboxesAnisocoria = document.querySelectorAll('.sub-checkbox-resp.anisocoria');
    var checkboxesIsocoria = document.querySelectorAll('.sub-checkbox-resp.isocoria');
    var checkboxesMidriase = document.querySelectorAll('.sub-checkbox-resp.midriase');
    var checkboxesMiose = document.querySelectorAll('.sub-checkbox-resp.miose');
    var checkboxesReagente = document.querySelectorAll('.sub-checkbox-resp.reagente');
    var checkboxesNaoReagente = document.querySelectorAll('.sub-checkbox-resp.naoreagente');

    if (checkbox.checked) {
        checkboxesAnisocoria.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
        checkboxesIsocoria.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
        checkboxesMidriase.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
        checkboxesMiose.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
        checkboxesReagente.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
        checkboxesNaoReagente.forEach(function (cb) {
            cb.removeAttribute('disabled');
        });
    } else {
        checkboxesAnisocoria.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox interna
        });
        checkboxesIsocoria.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox externa
        });
        checkboxesMidriase.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox interna
        });
        checkboxesMiose.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox externa
        });
        checkboxesReagente.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox interna
        });
        checkboxesNaoReagente.forEach(function (cb) {
            cb.setAttribute('disabled', 'disabled');
            cb.checked = false; // Desmarca a checkbox externa
        });
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

  function selectCheckProblemaSaude(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckProblemaSaude');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }  

  function selectCheckMedicacao(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckMedicacao');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }  
  
  function selectCheckAlergico(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckAlergico');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }   

  function selectCheckAlimento6horas(checkbox) {
    var checkboxes = document.querySelectorAll('.selectCheckAlimento6horas');
  
    checkboxes.forEach(function (cb) {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
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

  function selectCheckPreNatal(checkbox) {
    var inputAnmeSnNomeMedico = document.querySelector(".input-anme_sn_nomemedico");
  
    if (checkbox.id === "selectCheckPreNatal1") {
        inputAnmeSnNomeMedico.style.display = "block";
    } else if (checkbox.id === "selectCheckPreNatal2") {
        inputAnmeSnNomeMedico.style.display = "none";
    }
  }

  function mostrarOcultarContainer(checkbox) {
    var containerNomeMedico = document.querySelector('.container-nome-medico');
    
    if (checkbox.checked) {
        containerNomeMedico.classList.remove('hidden');
    } else {
        containerNomeMedico.classList.add('hidden');
    }
}

document.getElementById('sexoSelect').addEventListener('change', function () {
    var sexo = this.value;
    var container_gestacional = document.querySelector('.container_gestacional');

    if (sexo === 'Feminino') {
        container_gestacional.classList.remove('hidden');
    } else {
        container_gestacional.classList.add('hidden');
    }
});

//funcao para selecionar tamanho Materiais descartáveis utilizados:
function toggleAtadura() {
    var AtaduraCheckbox = document.querySelector('.main-checkbox-atadura');
    var checkboxesAtadura = document.querySelectorAll('.sub-checkbox-atadura');

    checkboxesAtadura.forEach(function (checkbox) {
        if (AtaduraCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function toggleKits() {
    var KitsCheckbox = document.querySelector('.main-checkbox-kits');
    var checkboxesKits = document.querySelectorAll('.sub-checkbox-kits');

    checkboxesKits.forEach(function (checkbox) {
        if (KitsCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function toggleTalas() {
    var talasCheckbox = document.querySelector('.main-checkbox-talas');
    var checkboxestalas = document.querySelectorAll('.sub-checkbox-talas');

    checkboxestalas.forEach(function (checkbox) {
        if (talasCheckbox.checked) {
            checkbox.removeAttribute('disabled');
        } else {
            checkbox.setAttribute('disabled', 'disabled');
        }
    });
}

function toggleMateriais_descartaveis_outros() {
    var checkbox = document.getElementById("materiaisOutrosCheckbox");
    var input = document.getElementById("materiaisOutrosInput");

    if (checkbox.checked) {
        input.disabled = false; // Habilita a caixa de texto
    } else {
        input.disabled = true; // Desabilita a caixa de texto
    }
}

