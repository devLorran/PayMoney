    /*$cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
if($senha != null || $cpf != null){
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);//faz com que a variavel escape de caracteres especiais
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    //criptografando senha
    //$senha = md5($senha);
    
    $sql = "SELECT * FROM contas WHERE cpf = '{$cpf}' AND senha = '{$senha}'";
    $result = @mysqli_query($conn, $sql);
    $resultado = @mysqli_num_rows($result);

    if(empty($resultado)){
        $_SESSION['loginErro'] = 'Insira um cpf de usuário válido';
        echo "Erro ";
        var_dump($cpf, $senha);
        header('Location: ../logar.php');
    }elseif(isset($resultado)){
        $_SESSION['usuarioCpf'] = $resultado['cpf'];
        $_SESSION['usuarioNumeroConta'] = $resultado['numeroConta'];
        echo "logado com sucesso";
        header('Location: ../index2.php');
    }else{
        header('Location: Cadastrar.php');
    }
}else{
    $_SESSION['loginErro'] = 'Usuário ou senha inválidos';
    //header('Location: index.php');
}
    //var_dump($nome, $senha);*/
    //$msg = "";



    //Sair

    <?php
    session_start();
    session_destroy(); //Destruindo todas as variáveis globais desse site

    unset(
        $_SESSION['usuarioId'],
        $_SESSION['usuario'],
        $_SESSION['senha']

    );
    $_SESSION['logindeslogado'] = "Deslogado com sucesso";
    header("Location: index.php");


    #UserName{
    font-size: 4vh;
}
#UserCpf{
    font-size: 3vh;
}
#UserConta{
    font-size: 2vh;
}
#UserSaldo{
    font-size: 2vh;
}



<section id="sections-cards">
    



    </section>