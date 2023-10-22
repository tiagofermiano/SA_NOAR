document.getElementById('gerar-pdf').addEventListener('click', function () {
    const pdf = new jsPDF();
    const relatorio = document.getElementById('relatorio'); // Substitua 'relatorio' pelo ID ou classe do elemento que contém suas informações de relatório

    pdf.text(10, 10, 'Relatório'); // Título do relatório

    // Adicione o conteúdo do relatório como texto ou HTML
    pdf.fromHTML(relatorio, 10, 20);

    // Salve ou exiba o PDF
    pdf.save('relatorio_ocorrencia.pdf');
});