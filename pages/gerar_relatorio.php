<?php
// TENTEI
// if (!function_exists('gerarEInserirPDF')) {
//     function gerarEInserirPDF($idRelatorio) {
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         // Se o formulário foi enviado
//         require('fpdf.php');
    
//         // Criar uma instância do FPDF
//         $pdf = new FPDF();
//         $pdf->AddPage();
//         $pdf->SetFont('Arial', 'B', 16);
//         $pdf->Cell(40, 10, 'Conteúdo do relatório');
    
//         // Adicionar mais conteúdo ao PDF conforme necessário
//         // Exemplo: $pdf->Cell(40, 10, 'Outro conteúdo do relatório');
    
//         // Salvar o PDF como um blob
//         ob_start();
//         $pdf->Output('F');
//         $pdfData = ob_get_clean();
    
//         // Inserir o PDF no banco de dados
//         include('conexao.php'); // Certifique-se de incluir o arquivo que contém a conexão com o banco de dados
    
//         $stmt = $conn->prepare("UPDATE relatorios SET arquivo_pdf = ? WHERE id = ?");
//         $stmt->bind_param("bi", $pdfData, $idRelatorio);
//         $stmt->execute();
    
//         $stmt->close();
//         $conn->close();
//     }
// }}

?>
