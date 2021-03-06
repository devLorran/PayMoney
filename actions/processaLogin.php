<?php
    session_start();
    include "../database/database.php"; 
    if(isset($_POST['logar'])) {
      $cpf = trim($_POST['cpf']);
      $senha = trim($_POST['senha']);
      if($cpf != "" && $senha != "") {
        try {
          $query = "SELECT * FROM contas WHERE cpf = '{$cpf}' AND senha = '{$senha}'";
          $stmt = $conn->prepare($query);
          $stmt->bindParam('cpf', $cpf, PDO::PARAM_STR);
          $stmt->bindValue('senha', $senha, PDO::PARAM_STR);
          $stmt->execute();
          $count = $stmt->rowCount();
          $row   = $stmt->fetch(PDO::FETCH_ASSOC);
          if($count == 1 && !empty($row)) {
            $_SESSION['UsuarioId'] = $row['id'];
            $_SESSION['UsuarioNome'] = $row['nome'];
            $_SESSION['UsuarioSobrenome'] = $row['sobrenome'];
            $_SESSION['usuarioCpf'] = $row['cpf'];
            $_SESSION['numeroConta'] = $row['numeroConta'];
            $_SESSION['usuarioSaldo'] =  $row['saldo'];
            $_SESSION['usuarioCelular'] =  $row['celular'];
            $_SESSION['UsuarioSobrenome'] = $row['sobrenome'];
            //number_format((float)$_SESSION['usuarioSaldo'], 2, '.', '');
            header("Location: ../index2.php?");
            header("Cache-Control: no-cache");
            header("Expires: -1");
          } else {
            header("Location: ../logar.php");
            $_SESSION['loginErro'] = 'Insira um cpf de usuário válido';
          }
        } catch (PDOException $e) {
          echo "Error : ".$e->getMessage();
        }
      } else {
        $_SESSION['loginErro'] = 'Preencha todos os campos!';
        header("Location: ../logar.php");
      }
    }
?>
    
    
