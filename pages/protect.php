<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protec</title>
    <link rel="stylesheet" type="text/css" href="perfil.css">
</head>

<body>

    <?php

    if (!isset($_SESSION)) {
        session_start();
    }
    ?>

    <div class="container-login">
        <div class="form-caixa-login">
            <p class="titulo-login">Faça login!</p>

            <div class="perfil-login">
                <?php if (!isset($_SESSION['id_atendente'])) {
                    die("Você não pode acessar esta página, pois não está logado.");
                } ?>
                <!-- <a href="telalogin.php">Faça login</a> -->
            </div>
            
        </div>
    </div>

</body>

</html>