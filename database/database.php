<?php
/*define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DBNAME','transfermoney');*/
$username = 'root';
$password = '';
    //Criando conexão
    try {
        $conn = new PDO('mysql:host=localhost;dbname=paymoney', $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      }
    /**/
    