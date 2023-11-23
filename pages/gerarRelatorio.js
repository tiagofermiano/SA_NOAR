
// Importar a biblioteca jsPDF
import jsPDF from 'jspdf';

// Função para gerar o PDF da página inteira
function gerarPDF() {
  // Criar uma nova instância do jsPDF
  const doc = new jsPDF();

  // Adicionar o conteúdo da página ao PDF
  doc.html(document.body, {
    callback: function (pdf) {
      // Salvar o PDF
      pdf.save('relatorio.pdf');
    }
  });
}

// Chamar a função para gerar o PDF
gerarPDF();
