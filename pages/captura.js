function captureAndSend() {
    html2canvas(document.getElementById("captura")).then(function(canvas) {
        var base64Data = canvas.toDataURL("localizacao-trauma/png");
        sendDataToServer(base64Data);
    });
}

function sendDataToServer(data) {
    // Enviar data para o servidor (usando uma solicitação HTTP, como Ajax).
}