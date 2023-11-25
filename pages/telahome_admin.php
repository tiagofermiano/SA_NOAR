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
            <a href="historico.php">
                <div class="grid-button">
                    <img src="https://i.pinimg.com/originals/4e/05/c0/4e05c0480bfb15b19bed458be9b7e45d.jpg">
                    <p>Histórico</p>
                </div>
            </a>
            <a href="<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'telalogin.php' : 'telaperfil_admin.php'; ?>">
                <div class="grid-button">
                    <img src="https://i.pinimg.com/originals/f2/a6/3b/f2a63bb71f3b572d23fc9351ebb8198a.jpg">
                    <p>Perfil</p>
                </div>
            </a>
            <a href="<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'telalogin.php' : 'index_admin.php'; ?>">
                <div class="grid-button">
                    <img src="https://i.pinimg.com/originals/de/0c/e3/de0ce31be5bdb9cdfd808215b9dfa8dd.jpg">
                    <p>Novo</p>
                </div>
            </a>
        </div>
    </div>

    <div class="container-usuario">
        <div class="button-group-usuario">
            <div class="grid-button-usuario">
                <a id="botaoEditar" href="usuarios.php" <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'telalogin.php' : 'usuariosphp.php'; ?>">
                    Editar usuarios
            </div>
            </a>
        </div>
    </div>

    <footer>
        <p class="copyright">Todos os direitos Reservados - NOAR - 2023 &copy;</p>
        <p class="copyright">Todos os direitos Reservados - AHBSAR - 2023 &copy;</p>
    </footer>

</html>
</body>