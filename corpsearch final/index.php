<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Corp Search</title>
        <link rel="icon" type="image/png" href="images/icons/corpsearch.png"/>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <!-- jQuery-->
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <!--JavaScript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/cssIndex2.css" type="text/css">
    </head>


    <body class="row" style="background-image: url('images/wallpaper.jpg'); padding-top: 0px;">

        <div class="navbar">
            <div class="container">
                <div class="" style="margin-top: 10px; text-align: right">
                    <!--<div class="col-md-4">-->
                        <form method="post" class="form-group">
                            <?php
                            @session_start();
                            if (isset($_SESSION['nome'])) {
                                ?>
                                <a href="shop.php" class="btn btn-info"><i class="glyphicon glyphicon-chevron-left"></i> IR À LOJA</a>
                                <?php
                            } else {
                                ?>
                                <a href="login.php" class="btn btn-warning"><i class="glyphicon glyphicon-user"></i> FAÇA SEU LOGIN</a>
                                <?php } ?>
                        </form>
                    <!--</div>-->
                </div>
            </div>
        </div>


        <div class="col-sm-12 container-login100">
            <div class="col-sm-12 text-center">
                <img src="images/corpsearch.png" alt="corpsearch"></a>
            </div>
            <div class="col-sm-12 texto text-center">
                <h2 style="text-shadow: 2px 2px 6px silver;">O Corp Search tem por objetivo proporcionar agilidade no processo de obtenção de orçamentos por parte de compradores corporativos,
                    bem como também maior alcance de clientes por parte de fornecedores.</h2>
            </div>
        </div>
    </body>
</html>
