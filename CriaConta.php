<?php
    session_start();
    include_once("database/database.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/CriaConta.css">
    <title>PayMoney - Criar Conta</title>
</head>
<body>
    <form action="./actions/processacriaConta.php" method="post" id="formCriaConta" class="form-group container">
    <div class="div-form">
            <h2>Criar Conta</h2>
            <label>Nome: <input type="text" name="nome" id="nome" class="form-control container"></label>
            <label>Sobrenome: <input type="text" name="sobrenome" id="sobrenome"class="form-control container"></label>
            <label>CPF: <input type="text" name="cpf" id="cpf" class="form-control container"></label>
            <label>Celular: <input type="text" name="celular" id="celular" class="form-control container"></label>
            <label>Senha:<input type="password" name="senha" id="senha" class="form-control container"></label>
            <label>País:</label>
            <select name="pais" id="pais" class="form-control container">
            <option value="">Selecione um país</option>
            <?php
                $result_cat = "SELECT nome_pais FROM pais";
                $resultado_cat = $conn->prepare($result_cat);
                
                $resultado_cat->execute();
                while($row_cat = $resultado_cat->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'.$row_cat['nome_pais'].'">'.$row_cat['nome_pais'].'</option>';
                }
                ?>
            </select>
            <label>Estado:</label>
            <select name="localidade" id="pais" class="form-control container">
            <option value="">Selecione um estado</option>
            <?php
                $result_cat = "SELECT nome FROM localidades";
                $resultado_cat = $conn->prepare($result_cat);
                
                $resultado_cat->execute();
                while($row_cat = $resultado_cat->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'.$row_cat['nome'].'">'.$row_cat['nome'].'</option>';
                }
                ?>
            </select>
            <!-- <label>Localidade:</label>
            <select name="localidade" id="localidades" class="form-control container">
                <option>Selecione uma Localidade</option>
            </select>
            <label>Sub-localidade:</label>
            <select name="subLocalidade" id="Sub-localidade" class="form-control container">
                <option>Selecione uma Sub-localidade</option>
            </select>-->

            <div class="buttons">
                <input type="submit" name="btnSubmit" value="Cria Conta" class="container btn btn-success" id="criaConta">
                <a type="button" value="Voltar" class="container btn btn-primary" id="voltar" href="index.php">Voltar</a>
                <span class="loginMsg"><?php echo @$msg;?></span>
            </div>
            <p class="text-center text-danger">
            <?php
                if(isset($_SESSION['loginErro'])){
                    echo $_SESSION['loginErro'];
                    unset($_SESSION['loginErro']);
                }
            ?>
            </p>
        </div>
    </form>
</body>
</html>