<?php
    include_once "../database/database.php";

    //$SubmitEditaConta = $_POST['editarConta'];
    @$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    @$nome = $_POST['nome'];
    @$sobrenome = $_POST['sobrenome'];
    @$celular = $_POST['celular'];
    @$localidade = $_POST['localidade'];

    if(isset($_POST['editarConta'])){
        //$sql = "update produtos set nome = ?, marca = ?, modelo = ?, quantidade = ?, estado = ? where id = ?";
        try {
            $sql = "update contas SET nome = '$nome', sobrenome = '$sobrenome', celular = '$celular', localidade = '$localidade' WHERE id = '$id'";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindValue(':sobrenome', $sobrenome, PDO::PARAM_STR);
            $stmt->bindValue(':celular', $celular, PDO::PARAM_STR);
            $stmt->bindValue(':localidade', $localidade, PDO::PARAM_STR);
            $stmt->execute();
            //print_r($nome, $sobrenome, $celular, $localidade);
            if ($conn->query($sql)) {
                echo "<script>alert('Dados atualizados com sucesso!')</script>";
                header("Location: ../index2.php?status=true");
                exit;
            }else {
                header("Location: ../index2.php?status=false");
            }
        } catch (PDOException $e) {
           echo $e;
        }
    }

?>