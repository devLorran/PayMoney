<?php
    session_start();
    include_once "../database/database.php";
    //$excluir = filter_input(INPUT_POST, 'btnExcluir', FILTER_SANITIZE_STRING);
    $numeroConta = filter_input(INPUT_POST, 'numeroConta', FILTER_SANITIZE_STRING);
    if(isset($_POST['btnExcluir'])){
        try{
            $sql = "DELETE FROM contas WHERE numeroConta = '$numeroConta'";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":numeroConta", $numeroConta, PDO::PARAM_STR);
            $stmt->execute();
            if($conn->query($sql)){
                header("Location: ../index.php?status=true");
            }else{
                header("Location: ../index2.php?status=error");
                echo "Erro ao deletar conta";

            }
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }//Xdebug
echo $numeroConta;

    //Deletando com MYSQLI
    /*if($excluir){
        $sql = "delete from contas where id = ".$id;

        if(@mysqli_query($sql,$conn) && $saldo == 0){
            echo = "Deletado com sucesso!";
        }else{
            echo = "Você não pode deletar sua conta pois ela ainda tem saldo!";
        }
        mysql_close($conn);
    }*/
?>
