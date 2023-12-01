<?php
include ('conexao.php');

$relatorioQuery = "SELECT info_paciente.data_ocorrencia, info_paciente.hora_chegada, info_paciente.nome_paciente, info_paciente.rg_cpf_paciente, atendente.nome as nome_atendente ";
$relatorioQuery .= "FROM info_paciente ";
$relatorioQuery .= "JOIN atendente ON info_paciente.id_atendente = atendente.id_atendente";
$relatorioResult = $conn->query($relatorioQuery);

?>