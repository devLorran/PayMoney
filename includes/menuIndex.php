    <link rel="stylesheet" href="./css/menuIndex.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <nav id="nav">
            <ul class="menuPrinc">
                    <div class="div-menu">
                        <div class="divMenu">
                        <li class="li-menu"><a id="btnCriaConta" class="btn btn-primary" href="CriaConta.php">Criar Conta</a></li>
                        <li class="li-menu"><a id="btnLogar" class="btn btn-primary" href="logar.php">Logar</a></li>
                    </div>
                </div>
            </ul>
        </nav>

    <script>
    $(function(){
        $(window).on("scroll", function(){
            if($(window).scrollTop() > 100){
                $(".menuPrinc").addClass("menuSecond");
                $("#btnCriaConta").css({padding: '10px 55px',
                                            position: 'relative',
                                            transition: 'top 13px all 0.5s ease-in-out',
                                            top: '13px'});
                $("#btnLogar").css({padding: '10px 55px',
                                            position: 'relative',
                                            transition: 'top 13px all 0.5s ease-in-out',
                                            top: '13px'});
            }else{
                $(".menuPrinc").removeClass("menuSecond");
                $("#btnCriaConta").css({padding: '10px 55px',
                                            position: 'relative',
                                            transition: 'top 28px all 0.5s ease-in-out',
                                            top: '28px'});
                $("#btnLogar").css({padding: '10px 55px',
                                            position: 'relative',
                                            transition: 'top 28px all 0.5s ease-in-out',
                                            top: '28px'});
            }
        })
    })
</script>