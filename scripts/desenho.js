function drawMarkers(context, x, y, color) {
    context.beginPath();
    context.arc(x, y, 5, 0, 2 * Math.PI);
    context.fillStyle = color;
    context.fill();
}

function printImage() {
    const img = document.getElementById('HumanBody');
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');

    canvas.width = img.width;
    canvas.height = img.height;

    context.drawImage(img, 0, 0, img.width, img.height);

    const markerPurple = document.getElementById('markerPurple');
    const markerRed = document.getElementById('markerRed');
    const markerOrange = document.getElementById('markerOrange');
    const markerYellow = document.getElementById('markerYellow');

    if (markerPurple.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerPurple.style.left) + 5, parseFloat(markerPurple.style.top) + 5, 'purple');
    }
    if (markerRed.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerRed.style.left) + 5, parseFloat(markerRed.style.top) + 5, 'red');
    }
    if (markerOrange.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerOrange.style.left) + 5, parseFloat(markerOrange.style.top) + 1, 'orange');
    }
    if (markerYellow.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerYellow.style.left) + 5, parseFloat(markerYellow.style.top) + 5, 'yellow');
    }

    const newWindow = window.open();
    newWindow.document.write('<img src="' + canvas.toDataURL() + '" alt="Imagem com Marcações">');
}

document.getElementById('HumanBody').addEventListener('click', function(event) {
    const x = event.offsetX;
    const y = event.offsetY;

    const markerPurple = document.getElementById('markerPurple');
    const markerRed = document.getElementById('markerRed');
    const markerOrange = document.getElementById('markerOrange');
    const markerYellow = document.getElementById('markerYellow');

    const selectedTrauma = document.getElementById('traumaType').value;

    markerPurple.style.display = 'none';
    markerRed.style.display = 'none';
    markerOrange.style.display = 'none';
    markerYellow.style.display = 'none';

    if (selectedTrauma === 'Trauma 1') {
        markerPurple.style.left = x - 5 + 'px';
        markerPurple.style.top = y - 5 + 'px';
        markerPurple.style.display = 'block';
    } else if (selectedTrauma === 'Trauma 2') {
        markerRed.style.left = x - 5 + 'px';
        markerRed.style.top = y - 5 + 'px';
        markerRed.style.display = 'block';
    } else if (selectedTrauma === 'Trauma 3') {
        markerOrange.style.left = x - 5 + 'px';
        markerOrange.style.top = y - 1 + 'px';
        markerOrange.style.display = 'block';
    } else if (selectedTrauma === 'Trauma 4') {
        markerYellow.style.left = x - 5 + 'px';
        markerYellow.style.top = y - 5 + 'px';
        markerYellow.style.display = 'block';
    }
});