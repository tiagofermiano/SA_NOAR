function toggleRespiratorio() {
    var respiratorioCheckbox = document.querySelector('.main-checkbox-resp');
    var inalacaoCheckbox = document.querySelector('.sub-checkbox-resp:nth-of-type(1)');
    var dpocCheckbox = document.querySelector('.sub-checkbox-resp:nth-of-type(2)');

    if (respiratorioCheckbox.checked) {
        inalacaoCheckbox.removeAttribute('disabled');
        dpocCheckbox.removeAttribute('disabled');
    } else {
        inalacaoCheckbox.setAttribute('disabled', 'disabled');
        dpocCheckbox.setAttribute('disabled', 'disabled');
        inalacaoCheckbox.checked = false;
        dpocCheckbox.checked = false;
    }
}

function toggleDiabetes() {
    var diabetesCheckbox = document.querySelector('.main-checkbox-diab');
    var hiperglicemiaCheckbox = document.querySelector('.sub-checkbox-diab:nth-of-type(1)');
    var hipoglicemiaCheckbox = document.querySelector('.sub-checkbox-diab:nth-of-type(2)');

    if (diabetesCheckbox.checked) {
        hiperglicemiaCheckbox.removeAttribute('disabled');
        hipoglicemiaCheckbox.removeAttribute('disabled');
    } else {
        hiperglicemiaCheckbox.setAttribute('disabled', 'disabled');
        hipoglicemiaCheckbox.setAttribute('disabled', 'disabled');
        hiperglicemiaCheckbox.checked = false;
        hipoglicemiaCheckbox.checked = false;
    }
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