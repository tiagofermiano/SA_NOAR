document.getElementById('gerar-pdf').addEventListener('click', function () {
    // Coleta os dados da página HTML
    const tipoDado = document.getElementById('dado2').textContent;
    const infoValor = document.getElementById('info').textContent;
    // Outros dados podem ser coletados da mesma maneira

    // Crie o documento PDF
    const docDefinition = {
        content: [
            { text: 'Relatório', style: 'titulo' },
            // nao sei oq la
            { text: 'Informações do paciente:', style: 'classe' },
            // nao sei oq nao sei oq la
        ],
        styles: {
            titulo: { fontSize: 16, bold: true, margin: [0, 0, 0, 10] },
            classe: { fontSize: 14, bold: true, margin: [0, 10, 0, 5] },
        },
    };

    // Gere o PDF e faça o download automaticamente
    pdfmake.createPdf(docDefinition).download('relatorio.pdf');
});