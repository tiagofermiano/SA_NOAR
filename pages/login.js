
function validateForm() {
    // Obtenha os valores dos campos de entradaa
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Obtém a referência ao elemento da mensagem de erro
    var errorMessage = document.getElementById("error-message");

    // Verifique se os campos estão vazios
    if (username === "" || password === "") {
        errorMessage.style.display = "block"; // Exibe a mensagem de erro
        return false; // Impede o envio do formulário
    }

    // Se os campos não estiverem vazios, oculta a mensagem de erro
    errorMessage.style.display = "none";

    // Se ambos os campos estiverem preenchidos, o formulário será enviado
    return true;
}