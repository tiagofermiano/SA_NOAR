function drawMarkers(context, x, y, color) {
    context.beginPath();
    context.arc(x, y, 5, 0, 2 * Math.PI);
    context.fillStyle = color;
    context.fill();
}

function drawHemorragia(context, x, y, color) {
    context.fillStyle = color;
    context.fillRect(x - 5, y - 5, 10, 10);
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
    const markerBlue = document.getElementById('markerBlue');
    const markerBlack = document.getElementById('markerBlack');
    const markerGreen = document.getElementById('markerGreen');
    const markerDarkOrange = document.getElementById('markerDarkOrange');
    const markerPink = document.getElementById('markerPink');
    const markerWater = document.getElementById('markerWater');
    const markerYellow = document.getElementById('markerYellow');


    if (markerPurple.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerPurple.style.left) + 5, parseFloat(markerPurple.style.top) + 5, 'purple');
    }
    if (markerRed.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerRed.style.left) + 5, parseFloat(markerRed.style.top) + 5, 'red');
    }
    if (markerBlue.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerBlue.style.left) + 5, parseFloat(markerBlue.style.top) + 1, 'orange');
    }
    if (markerBlack.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerBlack.style.left) + 5, parseFloat(markerBlack.style.top) + 5, 'yellow');
    }
    if (markerGreen.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerGreen.style.left) + 5, parseFloat(markerGreen.style.top) + 5, 'yellow');
    }
    if (markerDarkOrange.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerDarkOrange.style.left) + 5, parseFloat(markerDarkOrange.style.top) + 5, 'red');
    }
    if (markerPink.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerPink.style.left) + 5, parseFloat(markerPink.style.top) + 1, 'orange');
    }
    if (markerWater.style.display !== 'none') {
        drawMarkers(context, parseFloat(markerWater.style.left) + 5, parseFloat(markerWater.style.top) + 5, 'yellow');
    }
    if (markerYellow.style.display !== 'none') {
        drawHemorragia(context, parseFloat(markerYellow.style.left) + 5, parseFloat(markerYellow.style.top) + 5, 'yellow');
    }

    const newWindow = window.open();
    newWindow.document.write('<img src="' + canvas.toDataURL() + '" alt="Imagem com Marcações">');
}

document.getElementById('HumanBody').addEventListener('click', function(event) {
    const x = event.offsetX;
    const y = event.offsetY;

    const markerPurple = document.getElementById('markerPurple');
    const markerRed = document.getElementById('markerRed');
    const markerBlue = document.getElementById('markerBlue');
    const markerBlack = document.getElementById('markerBlack');
    const markerGreen = document.getElementById('markerGreen');
    const markerDarkOrange = document.getElementById('markerDarkOrange');
    const markerPink = document.getElementById('markerPink');
    const markerWater = document.getElementById('markerWater');
    const markerYellow = document.getElementById('markerYellow');


    const selectedTrauma = document.getElementById('traumaType').value;

    markerPurple.style.display = 'none';
    markerRed.style.display = 'none';
    markerBlue.style.display = 'none';
    markerBlack.style.display = 'none';
    markerGreen.style.display = 'none';
    markerDarkOrange.style.display = 'none';
    markerPink.style.display = 'none';
    markerWater.style.display = 'none';
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
        markerBlue.style.left = x - 5 + 'px';
        markerBlue.style.top = y - 1 + 'px';
        markerBlue.style.display = 'block';

    } else if (selectedTrauma === 'Trauma 4') {
        markerBlack.style.left = x - 5 + 'px';
        markerBlack.style.top = y - 5 + 'px';
        markerBlack.style.display = 'block';
    
    } else if (selectedTrauma === 'Trauma 5') {
        markerGreen.style.left = x - 5 + 'px';
        markerGreen.style.top = y - 1 + 'px';
        markerGreen.style.display = 'block';

    } else if (selectedTrauma === 'Trauma 6') {
        markerDarkOrange.style.left = x - 5 + 'px';
        markerDarkOrange.style.top = y - 5 + 'px';
        markerDarkOrange.style.display = 'block';

    } else if (selectedTrauma === 'Trauma 7') {
        markerPink.style.left = x - 5 + 'px';
        markerPink.style.top = y - 1 + 'px';
        markerPink.style.display = 'block';

    } else if (selectedTrauma === 'Trauma 8') {
        markerWater.style.left = x - 5 + 'px';
        markerWater.style.top = y - 5 + 'px';
        markerWater.style.display = 'block';

    } else if (selectedTrauma === 'Trauma 9') {
        markerYellow.style.left = x - 5 + 'px';
        markerYellow.style.top = y - 1 + 'px';
        markerYellow.style.display = 'block';

    }
    
});