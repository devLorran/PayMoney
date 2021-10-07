<?php

include_once("./database/database.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <title>Página Principal</title>
</head>
<body>
    <div id="div-data">
        <div id="divData">
    <?php
    session_start();
        echo "<p id='UserName' class='text-left'><b>Bem-vindo:</b> ".$_SESSION['UsuarioNome']. "</p class='text'>";
        echo "<p id='UserCpf' class='text-left'><b>CPF: </b>". $_SESSION['usuarioCpf']. "</p class='text'>";
        echo "<p id='UserConta' class='text-left'><b>Numero da Conta: </b>". $_SESSION['numeroConta']. "</p class='text'>";
        echo "";
    ?>
        <p id='UserSaldo' class='text-left'><b>R$: </b><?php echo $_SESSION['usuarioSaldo']; ?></p class='text'>
    </div>

    </div>
    <?php
        include "./includes/menuPrincipal.php";
    ?>
    <!-- EXTRATO -->

</body>
</html>