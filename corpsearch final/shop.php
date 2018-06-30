<?php
//$_GET['redirect'] = 'shop.php';
//include_once 'autentica.php';
include_once 'Classes/Produtos.php';
include_once 'Classes/Categorias.php';
include_once 'funcoes.php';

@session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php?redirect=shop.php');
}

$produtos = new Produtos();
if (isset($_GET['q'])) {
    $tabprodutos = $produtos->getByNome($_GET['q']);
} else if (isset($_GET['categoria'])) {
    $tabprodutos = $produtos->getByCategoria($_GET['categoria']);
} else {
    $tabprodutos = $produtos->getAll();
}

$categorias = new Categorias();
$tabcategorias = $categorias->getAll();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Corp Search - Área do Cliente</title>
        <link rel="icon" type="image/png" href="images/icons/corpsearch.png"/>

        <!-- Bootstrap core CSS -->
        <link href="vendorShop/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/cssShop.css" rel="stylesheet">

    </head>

    <style>
        .card-img-top{
            width: available;
            height: 150px;
        }
    </style>

    <body>

        <?php include 'menu.php'; ?>

        <!-- Page Content -->
        <div class="container">

            <div class="my-4"></div>
            <form method="get" class="form-" style="margin-bottom: 20px;">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Pesquisar" name="q" value="">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <span class="glyphicon glyphicon-search"></span>Pesquisar
                        </button>
                    </span>
                </div>
            </form>

            <div class="row">

                <div class="col-lg-3">

                    <div class="list-group">
                        <?php
                        foreach ($tabcategorias as $cat) {
                            ?>
                            <a href="shop.php?categoria=<?= $cat['id'] ?>" class="list-group-item"><?= $cat['nome'] ?></a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="list-group" style="padding-top: 5px; text-align: center">
                        <a href="shop.php" class="list-group-item" style="background-color: #ced4da">LIMPAR FILTROS</a>
                    </div>

                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">
                    <div class="row">

                        <?php
                        foreach ($tabprodutos as $linha) {
                            ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="text-center">
                                        <a href="item.php?id=<?= $linha['id'] ?>"><img class="card-img-top" style="width: auto;" src="<?= $linha['img'] ?>" alt="Foto do produto"></a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="item.php?id=<?= $linha['id'] ?>"><?= $linha['nome'] ?></a>
                                        </h5>
                                        <h5><?= formata_reais($linha['preco']) ?></h5>
                                        <p><?= $linha['obs'] ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer class=" py-4 bg-dark" style="left: 0; bottom: 0; width: 100%;">
            <div class="text-center container">
                <p class="text-white">Está com algum problema?<a class="nav-link" href="mailto:eugeniomartelli7@gmail.com">Contate o administrador do sistema</a></p>
                </br>
                <p class="m-0 text-center text-white" style="padding-top: 10px;">Copyright &copy; Corp Search 2018</p>
            </div>
        </footer>


        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
