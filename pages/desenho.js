const img = new Image();
img.src = 'https://i.pinimg.com/originals/58/de/42/58de422ac1de8428c3c43a719dd96205.png';
img.style.width = '100%';
img.style.height = 'auto';
img.style.maxWidth = '100%'; // Alterado para 100%

const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');
const drawnPoints = [];

let painting = false;
let currentColor = 'purple';

img.onload = function () {
    setSize(img.width, img.height);
    ctx.drawImage(img, 0, 0, img.width, img.height);
};

function setSize(width, height) {
    // Obtenha a largura da div pai
    const parentWidth = canvas.parentElement.clientWidth;

    // Redimensione a largura do canvas e da imagem proporcionalmente
    canvas.width = parentWidth;
    canvas.height = (parentWidth / img.width) * img.height;
    img.width = canvas.width;
    img.height = canvas.height;
}

function drawPoint(e) {
    if (!painting) return;

    const rect = canvas.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    ctx.fillStyle = currentColor;
    ctx.beginPath();
    ctx.arc(x, y, 5, 0, Math.PI * 2);
    ctx.closePath();
    ctx.fill();

    // Adicione o objeto com coordenadas e cor à pilha
    drawnPoints.push({ x, y, color: currentColor });
}

function startDrawing(e) {
    painting = true;
    drawPoint(e);
}

function setColor(color) {
    currentColor = color;
}

function addColorOption(color) {
    const div = document.createElement('div');
    div.className = 'colorOption';
    div.style.backgroundColor = color;
    div.addEventListener('click', function () {
        setColor(color);
    });
    document.getElementById('colorSelector').appendChild(div);
}

const undoButton = document.getElementById('undoButton');
undoButton.addEventListener('click', undoLastPoint);

function undoLastPoint() {
    // Remova o último ponto da pilha
    const lastPoint = drawnPoints.pop();

    // Limpe o canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Redesenhe a imagem
    ctx.drawImage(img, 0, 0, img.width, img.height);

    // Redesenhe os pontos restantes
    for (const point of drawnPoints) {
        ctx.fillStyle = point.color; // Use a cor armazenada
        ctx.beginPath();
        ctx.arc(point.x, point.y, 5, 0, Math.PI * 2);
        ctx.closePath();
        ctx.fill();
    }
}

canvas.addEventListener('mousedown', startDrawing);

const colors = ['purple', 'red', 'blue', 'black', 'green', 'darkorange', 'rgb(243, 0, 138)', 'rgb(0, 168, 174)', 'rgb(233, 221, 0)'];

for (let i = 0; i < colors.length; i++) {
    addColorOption(colors[i]);
}
