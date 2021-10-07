<?php
    $host = 'localhost';
    $user = 'root';
    $dbname = 'paymoney';
    $pass = '';
    $conn = @mysqli_connect($host, $user, $dbname, $pass);

    if (!$conn) {
        echo "Erro de conexão";
    } else {
        //echo "Conectado com sucesso";
    }
?>