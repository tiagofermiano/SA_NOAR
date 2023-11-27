<?php
include('conexao.php');
include('protect.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT arquivo_pdf FROM relatorios WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="relatorio_' . $id . '.pdf"');
        echo $row['arquivo_pdf'];
    } else {
        echo "Relatório não encontrado.";
    }
}
?>