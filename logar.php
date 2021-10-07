<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="./css/logarCss.css">
    <title>Logar</title>
</head>
<body>
    
    <form action="./actions/processaLogin.php" method="post" class="form-group">
        <div class="form-content">
            <h1>Logar</h1>
            <label>Nome: <input type="text" name="cpf" id="cpf" class="form-control container"></label>
            <label>Senha: <input type="password" name="senha" id="senha" class="form-control container"></label>
            <input type="submit" value="Entrar" name="logar" id="btnLogar" class="btn btn-success container">
            <a type="button" href="index.php" id="btnLogar" class="btn btn-success container">Voltar</a>
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