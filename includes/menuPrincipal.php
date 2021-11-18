<?php
  include_once("./database/database.php");
  //session_start();
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $result_usuario = "SELECT id FROM contas";
  $row_usuario = @mysqli_fetch_assoc($resultado_usuario);
?>
<link rel="stylesheet" href="./css/menuPrincipal.css">

<!-- Modal Transfere dinheiro-->
<div class="modal fade" id="ModalTransfereDinheiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div id="modal" class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Transferir Dinheiro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formTransfereDinheiro" action="./actions/processaTransfereDinheiro.php" method="post" class="container">
      <div class="modal-body">
          <label id="numConta">Numero da Conta:<input type="text" name="numContaini" class="container form-control" value="<?php echo $_SESSION['numeroConta']; ?>" readonly></label>
          <label id="numConta">Numero da Conta Destino:<input type="text" name="numContadest" class="container form-control"></label>
          <label id="valor">Valor: <input type="number" name="valor" id="valor" class="container form-control"></label>
          <!--<label id="senha">Senha: <input type="password" name="senha" class="container form-control"></label>-->
          <button type="button" id="btn-fechar" class="container form-control btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" name="transfere" class="container form-control btn btn-success" onclick="transfereDinheiro()">Transferir</button>
        </div>
        </form>
        <div id="footer-modal" class="modal-footer bg-primary">
          Pay Money feito por Lorran <span aria-hidden="true">&reg;</span>
        </div>
    </div>
  </div>
</div>


<!-- Modal Tirar Extrato-->
<div class="modal fade" id="ModalExibeExtrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Extrato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./actions/extrato.php" method="post">
          <?php
            
          ?>
        </form>
      </div>
      <div class="modal-footer bg-primary">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edita conta-->
<div class="modal fade" id="ModalEditaConta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div id="modal" class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-edita" class="form-group container" action="./actions/processaEditaConta.php" method="post">
        <label id="nome">ID:<input readonly class="container form-control" value="<?php echo $_SESSION['UsuarioId']; ?>" id="nome" type="text" name="id"></label>
        <label id="nome">Nome:<input class="container form-control" value="<?php echo $_SESSION['UsuarioNome']; ?>" id="nome" type="text" name="nome"></label>
        <label id="sobrenome">Sobrenome:<input class="container form-control" value="<?php echo $_SESSION['UsuarioSobrenome']; ?>" id="nome" type="text" name="sobrenome"></label>
        <label id="celular">Celular:<input class="container form-control" value="<?php echo $_SESSION['usuarioCelular']; ?>" id="nome" type="text" name="celular"></label>
        <label id="estado">Estado:</label>
        <select name="localidade" id="pais" class="form-control container">
            <?php
                $result_cat = "SELECT nome FROM localidades";
                $resultado_cat = $conn->prepare($result_cat);
                
                $resultado_cat->execute();
                while($row_cat = $resultado_cat->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'.$row_cat['nome'].'">'.$row_cat['nome'].'</option>';
                }
                ?>
            </select>
            <div id="buttons" class="container">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" id="editaConta" name="editarConta" class="btn btn-success">Editar</button>
            </div>
        </form>
      </div>
      <div class="modal-footer bg-primary">
        Pay Money feito por Lorran <span aria-hidden="true">&reg;</span>
      </div>
    </div>
  </div>
</div>

<!-- Modal Deposita dinheiro-->
<div class="modal fade" id="ModalDepositaDinheiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div id="modal" class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Depositar dinheiro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./actions/depositaDinheiroNaConta.php" method="post">
      <div class="modal-body form-group">
        <h6>Informe o valor</h6>
          <label id="valor">Numero da conta:<input class="container form-control" value="<?php echo $_SESSION['numeroConta']; ?>" id="numeroConta" type="text" name="numeroConta" readonly></label>
          <label id="valor">Valor:<input class="container form-control" id="quantia" type="number" name="depositaQuantia"></label>
          <button type="button" id="btn-fechar" class="btn btn-secondary container" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success container" onClick="verificaSeoValorEmenorOuIgualaZero()">Depositar</button>
      </div>
      </form>
        <div class="modal-footer bg-primary">
          Pay Money feito por Lorran <span aria-hidden="true">&reg;</span>
        </div>
    </div>
  </div>
</div>

<!-- Modal exclui Conta-->
<div class="modal fade" id="ModalExcluiConta" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Excluir Conta?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./actions/processarExcluirConta.php" method="post">
      <div class="modal-body">
        <h5>Excluir a Conta</h5>
        <label id="valor">Numero da conta:<input class="container form-control" value="<?php echo $_SESSION['numeroConta']; ?>" id="numeroConta" type="text" name="numeroConta" readonly></label>
        <label id="valor">Saldo:<input class="container form-control" value="<?php echo $_SESSION['usuarioSaldo']; ?>" id="saldo" type="text" name="saldo" readonly></label>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" name="btnExcluir" class="btn btn-danger" onclick="ExcluindoConta()">Excluir minha conta</button>
      </div>
      </form>
        <div class="modal-footer bg-primary">
          <p>Feito por Lorran &reg;</p>
        </div>
    </div>
  </div>
</div>
<div id="lateral">
  <div id="menu">              
  <h3 class="link-titulo">Pay Money</h3>
    <ul class="box">					
      <li><a href="#" data-toggle="modal" data-target="#ModalExibeExtrato">Extrato</a></li>
      <li><a href="#" data-toggle="modal" data-target="#ModalTransfereDinheiro">Transferir Dinheiro</a></li>
      <li><a href="#" data-toggle="modal" data-target="#ModalEditaConta">Editar Conta</a></li>
      <li><a href="#" data-toggle="modal" data-target="#ModalDepositaDinheiro">Depositar dinheiro</a></li>
      <li><a href="#" data-toggle="modal" data-target="#ModalExcluiConta">Excluir Conta</a></li>
    </ul>
    <div id="btn-sair">
      <ul>
      <li class="li-menu"><a id="btnSair" class="btn btn-danger" href="./index.php">Sair</a></li>
      </ul>
    </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
      var saldo = <?php echo $_SESSION['usuarioSaldo']; ?>;
      function ExcluindoConta(){
          //alert(saldo)
          const resposta = confirm("Deseja mesmo excluir sua conta?");
          if (resposta) {
              if(saldo > 0){
                  alert('Você não pode excluir sua conta pois você possui saldo de ' + saldo + ' nela!')
                  window.location.href = "index2.php";
              }else{
                  window.location.href = "./actions/processarExcluirConta.php";
              }
          }
      }
      //var conta = <?php //echo $_SESSION['usuarioConta']; ?>;
      
      var valor = document.geElementById("valor");
      function transfereDinheiro(){
        const resposta = confirm("Transferir o valor para " + conta + " ?");
        if (resposta) {
          if (valor <= 0) {
            window.location.href = "index2.php";
          } else {
            alert("Dinheiro transferido com sucesso!");
            window.location.href = "./actions/processarTransfereDinheiro.php";
          }
        }
      }
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
    setTimeout(function() {
      $("#myModal").modal('show');

      setTimeout(function() {
        $("#myModal").modal('hide');
      }, 3000);
    }, 2000);
  });
</script>