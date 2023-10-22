document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll("input"); // Selecione os inputs que deseja salvar

    inputs.forEach(function (input) {
        input.addEventListener("input", function () {
            localStorage.setItem(input.id, input.value);
        });

        // Restaure o valor do armazenamento local, se existir
        const savedValue = localStorage.getItem(input.id);

        if (savedValue !== null) {
            if (savedValue === input.placeholder) {
                input.value = ""; // Deixe o campo vazio se o valor salvo for igual ao placeholder
            } else {
                input.value = savedValue;
            }
        }
    });
});