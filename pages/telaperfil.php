<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOAR</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="perfil.css">
</head>

<body>

    <header>

        <div class="inicioPerfil">
            <a href="telahome.php">Início</a>
        </div>
        </div>
    </header>



    <p class="titulo">Meu perfil</p>
    <div class="form-caixa">
        <div class="perfil">
            <p>Bem-vindo ao seu perfil, <?php echo $_SESSION['nome']; ?>!</p>
        </div>

        <div class="id">
            Id: <?php echo $_SESSION['id_atendente']; ?>
        </div>

        <div class="email">
            Email: <?php echo $_SESSION['email']; ?>

        </div>

        <div class="cpf">
            CPF: <?php echo $_SESSION['cpf']; ?>

        </div>

        <div class="senha">
            Senha: <?php echo $_SESSION['senha']; ?>

        </div>
<div class="desconectar">
        <form action="logout.php" method="POST">
            <button id="sair" type="submit" name="logout" class="logout">Desconectar</button>
        </form>

</div>
    </div>

</body>

</html>