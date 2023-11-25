<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOAR</title>

    <link href="home.css" rel="stylesheet">

<body>

    <div class="cabecalho">
        <div class="txt_conectado" id="conectado">
            Conectado como: <?php echo $_SESSION['nome']; ?>
        </div>
    </div>

    <img src="https://i.pinimg.com/originals/63/1b/2a/631b2a6d8b0480b22c425f8efc67bf81.png" alt="Logo do Sistema" class="logo">

    <div class="container">
        <div class="button-group">
            <a id="botaoEditar"href="historico.php">
                    <p>Ver Histórico</p>
            </a>
            <a id="botaoEditar" href="<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'index.php' : 'telaperfil.php'; ?>">
                    <p>Ver Perfil</p>
            </a>
            <a id="botaoEditar" href="<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'index.php' : 'ficha.php'; ?>">
                    <p>Nova ocorrência
                    </p>
            </a>

        </div>
    </div>

    <footer>
        <p class="copyright">Todos os direitos Reservados - NOAR / AHBSAR - 2023 &copy;</p>
    </footer>
</html>
</body>