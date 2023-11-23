document.getElementById('gerarRelatorioButton').addEventListener('click', function() {
  var pdf = new jsPDF();
  pdf.text(20, 20, 'Título do Relatório');

  var data = [];
  var rows = document.querySelectorAll('table tr');
  
  for (var i = 0; i < rows.length; i++) {
      var row = rows[i];
      var cells = row.querySelectorAll('td, th');
      
      var dataRow = [];
      for (var j = 0; j < cells.length; j++) {
          dataRow.push(cells[j].innerText);
      }
      
      data.push(dataRow);
  }

  pdf.autoTable({
      head: data.shift(),
      body: data,
      startY: 30
  });

  pdf.save('relatorio.pdf');
});