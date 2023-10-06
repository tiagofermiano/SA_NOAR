// Obtenha o elemento canvas e seu contexto 2D
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

// Defina as dimensões do canvas para corresponder à imagem de fundo
const corpoImage = document.getElementById('imagem-corpo');
canvas.width = corpoImage.width;
canvas.height = corpoImage.height;

// Configure o estilo de desenho
ctx.strokeStyle = 'red';
ctx.lineWidth = 5;

let drawing = false;
let lastX = 0;
let lastY = 0;

// Função para começar a desenhar
function startDrawing(e) {
    drawing = true;
    [lastX, lastY] = [e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top];
}

// Função para parar de desenhar
function stopDrawing() {
    drawing = false;
}

// Função para desenhar enquanto o mouse se move
function draw(e) {
    if (!drawing) return;

    const x = e.clientX - canvas.getBoundingClientRect().left;
    const y = e.clientY - canvas.getBoundingClientRect().top;

    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(x, y);
    ctx.stroke();

    [lastX, lastY] = [x, y];
}

// Adicione os ouvintes de eventos do mouse
canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mouseup', stopDrawing);
canvas.addEventListener('mousemove', draw);

// Obtém o botão "Desfazer Última Alteração" e adiciona um ouvinte de evento de clique
const undoButton = document.getElementById('undo-button');
undoButton.addEventListener('click', undoLastDrawing);

// Variável para armazenar o histórico das ações de desenho
const drawingHistory = [];

// Função para desenhar enquanto o mouse se move
function draw(e) {
    if (!drawing) return;

    const x = e.clientX - canvas.getBoundingClientRect().left;
    const y = e.clientY - canvas.getBoundingClientRect().top;

    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(x, y);
    ctx.stroke();

    [lastX, lastY] = [x, y];

    // Adiciona as coordenadas ao histórico
    drawingHistory.push({ x, y });
}

// Função para desfazer a última alteração
function undoLastDrawing() {
    if (drawingHistory.length > 0) {
        drawingHistory.pop(); // Remove a última coordenada do histórico
        clearCanvas(); // Limpa o canvas
        redrawDrawingHistory(); // Redesenha o histórico atual
    }
}

// Função para limpar o canvas
function clearCanvas() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

// Função para redesenhar o histórico atual
function redrawDrawingHistory() {
    clearCanvas();
    ctx.strokeStyle = 'red';
    ctx.lineWidth = 5;

    for (let i = 0; i < drawingHistory.length - 1; i++) {
        const { x: startX, y: startY } = drawingHistory[i];
        const { x: endX, y: endY } = drawingHistory[i + 1];

        ctx.beginPath();
        ctx.moveTo(startX, startY);
        ctx.lineTo(endX, endY);
        ctx.stroke();
    }
}