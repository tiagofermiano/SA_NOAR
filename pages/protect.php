<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id_atendente'])) {
    die("Você não pode acessar esta página, pois não está logado.");
}
