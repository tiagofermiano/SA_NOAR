document.addEventListener('DOMContentLoaded', function () {
    let currentMarker = null;
    let currentColor = 'black';

    const canvas = document.getElementById('HumanBodyCanvas');
    const ctx = canvas.getContext('2d');
    const markerColors = ['purple', 'red', 'blue', 'black', 'green', 'darkorange', 'pink', 'water', 'yellow', 'rgb(243, 0, 138)', 'rgb(0, 168, 174)', 'rgb(233, 221, 0)'];
    const markers = markerColors.map((color, i) => ({ color, clicked: false }));

    const marcacoes = {
        markerPurple: [],
        markerRed: [],
        markerBlue: [],
        markerBlack: [],
        markerGreen: [],
        markerDarkOrange: [],
        markerPink: [],
        markerWater: [],
        markerYellow: []
    };

    // Função para carregar a imagem de fundo
    function loadImageWithBg(src, bgColor) {
        var img = new Image();
        img.src = src;
        img.onload = function () {
            var canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            var ctx = canvas.getContext('2d');
            ctx.fillStyle = bgColor;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(img, 0, 0);
            img.src = canvas.toDataURL();
        };
        return img;
    }

    // Função para desenhar os marcadores
    function drawMarkers() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        markers.forEach((marker, i) => {
            if (marker.clicked) {
                drawMarker(marker.x, marker.y, marker.color);
            }
        });
    }

    // Função para desenhar um marcador
    function drawMarker(x, y, color) {
        ctx.fillStyle = color;
        ctx.beginPath();
        ctx.arc(x, y, 5, 0, 2 * Math.PI);
        ctx.fill();
    }

    // Manipulador de evento para o clique no canvas
    canvas.addEventListener('click', (e) => {
        const rect = canvas.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const selectedTrauma = document.getElementById('traumaType').value;

        if (!marcacoes[selectedTrauma]) {
            marcacoes[selectedTrauma] = [];
        }

        const markerData = {
            left: x - 5 + 'px',
            top: y - 5 + 'px',
            display: 'block',
            color: currentColor
        };

        marcacoes[selectedTrauma].push(markerData);
        updateMarkerDisplay();
    });

    // Inicializa os marcadores
    drawMarkers();

    // Função para desenhar um ponto
    function drawDot(context, x, y, color) {
        context.fillStyle = color;
        context.beginPath();
        context.arc(x, y, 5, 0, 2 * Math.PI);
        context.fill();
    }

    // Função para definir a cor atual
    function setCurrentColor(color) {
        currentColor = color;
    }

    // Função para definir a cor pelo ID do marcador
    function setColorById(markerId) {
        const color = document.getElementById(markerId).style.backgroundColor;
        setCurrentColor(color);
    }

    // Adiciona manipuladores de eventos para seleção de cores por ID
    document.getElementById('markerPurple').addEventListener('click', function () {
        setColorById('markerPurple');
    });

    document.getElementById('markerRed').addEventListener('click', function () {
        setColorById('markerRed');
    });

    document.getElementById('markerBlue').addEventListener('click', function () {
        setColorById('markerBlue');
    });

    document.getElementById('markerBlack').addEventListener('click', function () {
        setColorById('markerBlack');
    });

    document.getElementById('markerGreen').addEventListener('click', function () {
        setColorById('markerGreen');
    });

    document.getElementById('markerDarkOrange').addEventListener('click', function () {
        setColorById('markerDarkOrange');
    });

    document.getElementById('markerPink').addEventListener('click', function () {
        setColorById('markerPink');
    });

    document.getElementById('markerWater').addEventListener('click', function () {
        setColorById('markerWater');
    });

    document.getElementById('markerYellow').addEventListener('click', function () {
        setColorById('markerYellow');
    });


    // Adicione manipuladores de eventos para outras cores conforme necessário...

    // Função para atualizar a exibição dos marcadores no canvas
    function updateMarkerDisplay() {
        const canvas = document.getElementById('HumanBodyCanvas');
        const context = canvas.getContext('2d');

        context.clearRect(0, 0, canvas.width, canvas.height);

        const img = new Image();
        img.onload = function () {
            context.drawImage(img, 0, 0, canvas.width, canvas.height);

            for (const [cor, dados] of Object.entries(marcacoes)) {
                for (const markerData of dados) {
                    const x = parseFloat(markerData.left) + 5;
                    const y = parseFloat(markerData.top) + 5;
                    drawDot(context, x, y, markerData.color);
                }
            }
        };

        img.src = 'https://i.pinimg.com/originals/58/de/42/58de422ac1de8428c3c43a719dd96205.png';
        img.style.width = '100%';
        img.style.height = 'auto';
        img.style.maxWidth = '564px';
    }

    // Inicializa a exibição dos marcadores
    updateMarkerDisplay();
});