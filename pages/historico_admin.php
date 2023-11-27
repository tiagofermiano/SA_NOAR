<?php
include('protect.php');
include('conexao.php');
include('downloadPDF.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOAR</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="historico.css">
</head>

<body>
    


<header>
  <div class="grid_header">

    <div class="conectado">
      Conectado: <?php echo $_SESSION['nome'];?>
  </div>

  <a href="telaperfil_admin.php"><div class="perfil">
        Perfil
    </div></a>

    <a href="telahome_admin.php"><div class="inicio">
        Início
    </div></a>

</div>
  </header>

<p class="titulo">Histórico</p>
    
<?php
// Verificar se o ID do atendente está definido (você precisa obter isso de alguma forma, por exemplo, através de uma sessão)
if (isset($_SESSION['id_atendente'])) {
    $atendente_id = $_SESSION['id_atendente'];

    // Sua consulta SQL com a condição WHERE para o atendente
    $sql = "SELECT id, atendente, arquivo_pdf, data_upload FROM relatorios WHERE atendente = $atendente_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir os dados apenas se houver relatórios associados ao atendente
        while($row = $result->fetch_assoc()) {
            echo '<div id="container-relatorios">';
            echo '<div id="relatorio">';
            echo '<p id="numero-ocorrencia">Relatório ' . $row["id"] . '</p>';
            echo '<div id="info-ocorrencia">';
            echo '<p id="nome-paciente">Data: ' . $row["data_upload"] . '</p>';
            echo '</div>';
            echo '<div id="botao-ver">';
            echo '<a class="botao" href="downloadPDF.php?id=' . $row["id"] . '">Baixar Arquivo</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
      echo '<p id="sem-relatorio">' . 'Nenhum relatório associado ao atendente.' . '</p>';    }
} 


// Fechar conexão
$conn->close();
?>


</body>
</html>    

