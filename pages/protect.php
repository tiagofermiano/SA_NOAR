<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id_atendente'])) {
    header("Location: telaprotect.php");
    exit;
}

?>