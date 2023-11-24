document.addEventListener('DOMContentLoaded', function() {
  let currentMarker = null;
  let currentColor = 'black'; // Adicione essa variável

  // Get the canvas and its context
  const canvas = document.getElementById('HumanBodyCanvas');
  const ctx = canvas.getContext('2d');
  const markerColors = ['purple', 'red', 'blue', 'black', 'green', 'darkorange', 'rgb(243, 0, 138)', 'rgb(0, 168, 174)', 'rgb(233, 221, 0)'];
  const markers = markerColors.map((color, i) => ({ color, clicked: false }));

  // Declare uma estrutura de dados para armazenar as posições e cores das marcações
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

  function drawMarkers() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      markers.forEach((marker, i) => {
         if (marker.clicked) {
           drawMarker(marker.x, marker.y, marker.color);
         }
      });
  }

  function drawMarker(x, y, color) {
      ctx.fillStyle = color;
      ctx.beginPath();
      ctx.arc(x, y, 5, 0, 2 * Math.PI);
      ctx.fill();
  }

  canvas.addEventListener('click', (e) => {
      const rect = canvas.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const selectedTrauma = document.getElementById('traumaType').value;

      // Verifique se a propriedade existe, se não, inicialize-a como um array vazio
      if (!marcacoes[selectedTrauma]) {
          marcacoes[selectedTrauma] = [];
      }

      const markerData = {
          left: x - 5 + 'px',
          top: y - 5 + 'px',
          display: 'block',
          color: currentColor // Adicione a cor selecionada
      };

      // Adicione a posição e a cor à estrutura de dados
      marcacoes[selectedTrauma].push(markerData);

      // Atualize o código para exibir todas as marcações
      updateMarkerDisplay();
  });

  drawMarkers();

  function drawDot(context, x, y, color) {
      context.fillStyle = color;
      context.beginPath();
      context.arc(x, y, 5, 0, 2 * Math.PI);
      context.fill();
  }

  // Adicione essa função para atualizar a cor atual
  function setCurrentColor(color) {
      currentColor = color;
  }

  function salvarAlteracoes() {
      // Capturar o tipo de trauma selecionado
      var tipoTrauma = document.getElementById("traumaType").value;

      // Capturar a posição dos marcadores
      var markerPurple = obterPosicaoMarcador("markerPurple");
      var markerRed = obterPosicaoMarcador("markerRed");
      var markerBlue = obterPosicaoMarcador("markerBlue");
      var markerBlack = obterPosicaoMarcador("markerBlack");
      var markerGreen = obterPosicaoMarcador("markerGreen");
      var markerDarkOrange = obterPosicaoMarcador("markerDarkOrange");
      var markerPink = obterPosicaoMarcador("markerPink");
      var markerWater = obterPosicaoMarcador("markerWater");
      var markerYellow = obterPosicaoMarcador("markerYellow");
      // Adicione os outros marcadores conforme necessário

      // Aqui, você pode enviar os dados para o servidor ou salvá-los localmente
      console.log("Tipo de Trauma:", tipoTrauma);
      console.log("Posição do Marcador Roxo:", markerPurple);
      console.log("Posição do Marcador Vermelho:", markerRed);
      console.log("Posição do Marcador Azul:", markerBlue);
      console.log("Posição do Marcador Preto:", markerBlack);
      console.log("Posição do Marcador Verde:", markerGreen);
      console.log("Posição do Marcador Laranja escuro:", markerDarkOrange);
      console.log("Posição do Marcador Rosa:", markerPink);
      console.log("Posição do Marcador Agua:", markerWater);
      console.log("Posição do Marcador Amarelo:", markerYellow);
      // Adicione os outros marcadores conforme necessário
  }

  function obterPosicaoMarcador(marcadorId) {
      var marcador = document.getElementById(marcadorId);
      return {
          left: marcador.style.left,
          top: marcador.style.top
      };
  }

  function updateMarkerDisplay() {
      const canvas = document.getElementById('HumanBodyCanvas');
      const context = canvas.getContext('2d');
  
      // Limpe o canvas antes de redesenhar as marcações
      context.clearRect(0, 0, canvas.width, canvas.height);
  
      // Carregue a imagem
      const img = new Image();
      img.onload = function () {
          context.drawImage(img, 0, 0, canvas.width, canvas.height);
  
          // Desenhe todos os marcadores para todas as cores
          for (const [cor, dados] of Object.entries(marcacoes)) {
              for (const markerData of dados) {
                  const x = parseFloat(markerData.left) + 5;
                  const y = parseFloat(markerData.top) + 5;
                  drawDot(context, x, y, cor);
              }
          }
      };
  
      // Defina a origem da imagem
      img.src = 'https://i.pinimg.com/originals/58/de/42/58de422ac1de8428c3c43a719dd96205.png';
  }
  

  function printImage() {
      // Abra uma nova janela com a imagem
      const newWindow = window.open();
      newWindow.document.write('<img src="' + document.getElementById('HumanBodyCanvas').toDataURL() + '" alt="Imagem com Marcações">');
  }

  document.getElementById('HumanBodyCanvas').addEventListener('click', function(event) {
      const x = event.offsetX;
      const y = event.offsetY;

      const selectedTrauma = document.getElementById('traumaType').value;

      // Verifique se a propriedade existe, se não, inicialize-a como um array vazio
      if (!marcacoes[selectedTrauma]) {
          marcacoes[selectedTrauma] = [];
      }

      const markerData = {
          left: x - 5 + 'px',
          top: y - 5 + 'px',
          display: 'block'
      };

      // Adicione a posição e a cor à estrutura de dados
      marcacoes[selectedTrauma].push(markerData);

      // Atualize o código para exibir todas as marcações
      updateMarkerDisplay();
  });

  // Carregue a imagem no início
  updateMarkerDisplay();
});

// Adicione manipuladores de eventos para os botões de seleção de cor, por exemplo:
document.getElementById('selectPurple').addEventListener('click', function() {
  setCurrentColor('purple');
});

document.getElementById('selectRed').addEventListener('click', function() {
  setCurrentColor('red');
});

// Faça isso para todas as cores...

function updateMarkerDisplay() {
  const canvas = document.getElementById('HumanBodyCanvas');
  const context = canvas.getContext('2d');

  // Limpe o canvas antes de redesenhar as marcações
  context.clearRect(0, 0, canvas.width, canvas.height);

  // Carregue a imagem
  const img = new Image();
  img.onload = function () {
      context.drawImage(img, 0, 0, canvas.width, canvas.height);

      // Desenhe todos os marcadores para todas as cores
      for (const [cor, dados] of Object.entries(marcacoes)) {
          for (const markerData of dados) {
              const x = parseFloat(markerData.left) + 5;
              const y = parseFloat(markerData.top) + 5;
              drawDot(context, x, y, markerData.color);
          }
      }
  };

  // Defina a origem da imagem
  img.src = 'https://i.pinimg.com/originals/58/de/42/58de422ac1de8428c3c43a719dd96205.png';
}

function printImage() {
  // Abra uma nova janela com a imagem
  const newWindow = window.open();
  newWindow.document.write('<img src="' + document.getElementById('HumanBodyCanvas').toDataURL() + '" alt="Imagem com Marcações">');
}

document.getElementById('HumanBodyCanvas').addEventListener('click', function(event) {
  const x = event.offsetX;
  const y = event.offsetY;
  const selectedTrauma = document.getElementById('traumaType').value;

  // Verifique se a propriedade existe, se não, inicialize-a como um array vazio
  if (!marcacoes[selectedTrauma]) {
      marcacoes[selectedTrauma] = [];
  }

  const markerData = {
      left: x - 5 + 'px',
      top: y - 5 + 'px',
      display: 'block',
      color: currentColor // Adicione a cor selecionada
  };

  // Adicione a posição e a cor à estrutura de dados
  marcacoes[selectedTrauma].push(markerData);

  // Atualize o código para exibir todas as marcações
  updateMarkerDisplay();
});

// Carregue a imagem no início
updateMarkerDisplay();