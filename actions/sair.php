<?php
    session_start();
    session_destroy(); //Destruindo todas as variáveis globais desse site

    unset(
        $_SESSION['UsuarioNome'],
        $_SESSION['usuarioCpf'],
        $_SESSION['numeroConta'],
        $_SESSION['usuarioSaldo']

    );
    $_SESSION['logindeslogado'] = "Deslogado com sucesso";
    header("Location: ./index.php");