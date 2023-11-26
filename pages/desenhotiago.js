const canvas = document.getElementById('HumanBodyCanvas');
const ctx = canvas.getContext('2d');

const img = new Image();
img.src = 'https://i.pinimg.com/originals/58/de/42/58de422ac1de8428c3c43a719dd96205.png';
img.style.width = '100%';
img.style.height = 'auto';
img.style.maxWidth = '564px';

function drawMarkers() {
    // Pontos coloridos na imagem
    const markerPositions = [
        {x: 50, y: 50, color: 'red'},
        {x: 100, y: 100, color: 'blue'},
        {x: 150, y: 150, color: 'green'},
        // Adicione mais pontos aqui
    ];

    // Desenhe os pontos coloridos na imagem
    markerPositions.forEach(marker => {
        ctx.fillStyle = marker.color;
        ctx.fillRect(marker.x, marker.y, 5, 5);
    });
}

// Adicione este código após a linha ctx.drawImage(img, 0, 0, img.width, img.height); no código original
img.onload = function() {
    canvas.width = img.width;
    canvas.height = img.height;
    ctx.drawImage(img, 0, 0, img.width, img.height);

    // Desenhe os marcadores na imagem
    drawMarkers();
};