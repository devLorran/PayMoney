<?php
session_start();
    include_once "../database/database.php";
    #$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    #$transfere = $_POST['transfere'];
    if(isset($_POST['transfere'])){
        $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
        $numeroContaIni = filter_input(INPUT_POST, 'numContaini', FILTER_SANITIZE_STRING);
        $numeroContaDest = filter_input(INPUT_POST, 'numContadest', FILTER_SANITIZE_STRING);
        //$valor = 0;
        try{
            if($valor <= 0){
                header("Location: ../index2.php?status=error");
            }else{
                $sql = "CALL transferencia('$numeroContaIni', '$numeroContaDest', '$valor');";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":numContaini", $numeroContaIni, PDO::PARAM_STR);
                $stmt->bindValue(":numContadest", $numeroContaDest, PDO::PARAM_STR);
                $stmt->bindValue(":valor", $valor, PDO::PARAM_STR);
                #$stmt->bindValue(":senha", $senha, PDO::PARAM_STR);
                
                $stmt->execute();
                $count = $stmt->rowCount();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt){
                    header("Location: ../index2.php?status=true");
                }
            }
        }catch(PDOException $e){
            echo "Falha na conexão " . $e;
        }
    }
?>