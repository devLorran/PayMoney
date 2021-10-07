<!DOCTYPE html>

<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="estilo/reset.css">
    <?php
        include("./includes/menuIndex.php");

    ?>
    <title>Money Pay</title>
    
</head>
<body>
    <section id="card-one">
    <div id="sobre">
        <div id="card-sobre">
            <div id="card-content-sobre">
                <h3>Transferir Dinheiro</h3>
                <span>Aplicativo seguro</span>
                <p>Você poderá transferir dinheiro de maneira fácil e rápido</p>
                <a type="button" id="btn-localidades" class="btn btn-success" href="sobre.php">Sobre o aplicativo</a> 
            </div>
        </div>
    </div>
    </section>
    <section id="card-two">
    <div id="localidades">
        <div id="card-localidades">
            <div id="card-content-localidades">
                <h3>Localidades</h3>
                <span>Nossas localidades</span>
                <p>Estamos localizados em diversas regiões do <b>Rio de Janeiro</b> clique em <span>Ver localidades</span>, para conferir as localidades</p>
                <a type="button" id="btn-localidades" class="btn btn-success" href="localidades.php">Ver localidades</a>
            </div>
        </div>
    </section>
    <section id="card-three">
    <div id="categoria">
        <div id="card-categoria">
            <div id="card-content-categoria">
                <h3>Selecione uma categoria</h3>
                <p>Para garantir sua segurança e a regularidade das transferências, é preciso selecionar uma categoria</p>
                <a type="button" id="btn-categoria" class="btn btn-success" href="categorias.php">Selecionar uma Categoria</a>
            </div>
        </div>
    </section>
    <section id="card-four">
    <div id="confirma">
        <div id="card-confirma">
            <div id="card-content-confirma">
                <h3>Confirme sua transferência</h3>
                <p>Você pode fazer isso quando quiser, de acordo com a taxa de câmbio do momento.</p>
            </div>
        </div>
    </div>
    </section>
</body>
    <?php
        include("./includes/footer.php");

    ?>
</html>