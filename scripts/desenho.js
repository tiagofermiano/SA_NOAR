        // Obtenha o elemento canvas e seu contexto 2D
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');

        // Obtenha o elemento da imagem de fundo
        const backgroundImage = document.getElementById('imagem-corpo');

        // Configure as dimensões do canvas para corresponder à imagem de fundo
        canvas.width = backgroundImage.width;
        canvas.height = backgroundImage.height;

        // Configure o estilo de desenho
        ctx.strokeStyle = 'red';
        ctx.lineWidth = 5;

        // Adicione um ouvinte de evento de clique no canvas
        canvas.addEventListener('click', function(e) {
            const rect = canvas.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            // Desenhe um círculo no local clicado
            ctx.beginPath();
            ctx.arc(x, y, 20, 0, 2 * Math.PI);
            ctx.stroke();
        });




