const imageContainer = document.getElementById('image-container');
        const desfazerButton = document.getElementById('desfazer');
        const circles = [];

imageContainer.addEventListener('click', function(e) {
    const clickCircle = document.createElement('div');
    clickCircle.className = 'click-circle';
    const size = 10; // Tamanho do círculo
    const x = e.offsetX - size / 0.5    ;
    const y = e.offsetY - size / 1;
    clickCircle.style.width = size + 'px';
    clickCircle.style.height = size + 'px';
    clickCircle.style.left = x + 'px';
    clickCircle.style.top = y + 'px';
    imageContainer.appendChild(clickCircle);

    circles.push({ element: clickCircle, x, y });
});

desfazerButton.addEventListener('click', function() {
    if (circles.length > 0) {
        const lastCircle = circles.pop();
        imageContainer.removeChild(lastCircle.element);
    }
});
