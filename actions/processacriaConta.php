<?php
    session_start();
    include "../database/database.php";
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $localidade = filter_input(INPUT_POST, 'localidade', FILTER_SANITIZE_STRING);
    $numeroConta = filter_input(INPUT_POST, 'numeroConta', FILTER_SANITIZE_STRING);
    $btnsubmit = filter_input(INPUT_POST, 'btnSubmit', FILTER_SANITIZE_STRING);
    /*$pais = $_POST['pais'];
    $localidade = $_POST['localidade'];
    $subLocalidade = $_POST['subLocalidade'];*/
        
    //Gerando um numero aleatório e salvando no banco de dados
    $numConta = "1234567890";
    $max = strlen($numConta) - 1;
    $code = "";
    while($code == false){
        for($i = 0; $i < 8; $i++){
            $code .= $numConta[mt_rand(0, $max)];
        }
    }
    $numeroConta = $code;
    if($btnsubmit){
        $verificaSeoCpfJaExisteNoBanco = "SELECT * FROM contas WHERE cpf = '$cpf'";
        $stmt = $conn->prepare($verificaSeoCpfJaExisteNoBanco);
        $stmt->bindParam('cpf', $cpf, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count == 1){
            header('Location: ../criaConta.php');
            $_SESSION['loginErro'] = 'O CPF: <b>'. $cpf .'</b> já tem cadastro no banco';
        }else{
            try{
                $salvar = "INSERT INTO contas(nome,sobrenome,cpf,celular,senha,localidade,numeroConta) VALUES ('$nome','$sobrenome','$cpf','$celular','$senha','$localidade','$numeroConta')";
                $insert_data = $conn->prepare($salvar);
                $insert_data->bindParam(':nome',$nome);
                $insert_data->bindParam(':sobrenome',$sobrenome);
                $insert_data->bindParam(':cpf',$cpf);
                $insert_data->bindParam(':celular',$celular);
                $insert_data->bindParam(':senha',$senha);
                $insert_data->bindParam(':localidade',$localidade);
                $insert_data->bindParam(':numeroConta',$numeroConta);
        
                if ($insert_data->execute()){
                    header("Location:../index.php");
                    echo "<script> alert('Sua conta foi criada com sucesso o número dela é -> $numeroConta') </script>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                    <div class='container'>
                    <p> Numero da conta </p>
                        Nome:<input type='text' name='nome' disabled class='form-control' value='<?php echo '$nome'?>'>
                        Sobrenome:<input type='text' name='sobrenome' disabled class='form-control' value='<?php echo '$sobrenome'?>'>
                        CPF:<input type='text' name='cpf' disabled class='form-control' value='<?php echo '$cpf'?>'>
                        Celular:<input type='text' name='celular' disabled class='form-control' value='<?php echo '$celular'?>'>
                        Senha:<input type='text' name='senha' disabled class='form-control' value='<?php echo '$senha'?>'>
                        Localidade:<input type='text' name='localidade' disabled class='form-control' value='<?php echo '$localidade'?>'>
                        Numero da Conta<input type='text' name='numeroConta' disabled class='form-control' value='<?php echo '$numeroConta'?>'>
                    </div>";
                }else {
                    echo "<p class='container'>Erro ao salvar no banco</p>";
                    header("Location:../CriaConta.php");
                }
            }catch(PDOException $e){
                echo $e;
            } 
        }
    }
?>
