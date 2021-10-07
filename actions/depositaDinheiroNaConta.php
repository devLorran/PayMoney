<?php
session_start();
include_once("../database/database.php");
$numeroConta = @$_POST['numeroConta'];
$quantia = @$_POST['depositaQuantia'];
if($quantia <= 0){
    $_SESSION['loginErro'] = 'Preencha todos os campos!';
    echo "<script>alert('O valor não pode ser igual ou menor do que 0')</script>";
    header("Location: ../index2.php?status=error");
}else{
    try{
    $sql = "UPDATE contas SET saldo = concat(saldo + $quantia) WHERE numeroConta = '$numeroConta'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1,$quantia);
    $stmt->execute();
    if($stmt){
        echo "<script>alert('Dinheiro depositado com sucesso na conta!')</script>";
    }
    $count = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count == 1 && !empty($row)) {
        $_SESSION['numeroConta'] = $row['numeroConta'];
    }
    header("Location: ../index2.php?numeroConta={$numeroConta}");
    }
    catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }
}
