<?php
include_once 'Classes/Produtos.php';
include_once 'Classes/Categorias.php';
include_once 'funcoes.php';
$produtos = new Produtos();
$prod = $produtos->getById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Corp Search - Produto</title>
    <link rel="icon" type="image/png" href="images/icons/corpsearch.png"/>

    <!-- Bootstrap core CSS -->
    <link href="vendorItem/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cssItem.css" rel="stylesheet">

  </head>

  <body>

	<?php include 'menu.php'; ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-12">

          <div class="card mt-4">
			<div class="img-responsive col-md-12 text-center">
              <img class="card-img-top img-fluid" style="height: 350px; width: auto;" src="<?= $prod['img'] ?>" alt="Foto do produto">
			</div>
			<div class="card-body">
              <h3 class="card-title"><?= $prod['nome'] ?></h3>
              <h4><?= formata_reais($prod['preco']) ?></h4>
			  </br>
			  <h5>CARACTERÍSTICAS:</h5>
              <p class="card-text">
                  <?= $prod['obs'] ?>
              </p>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            </div>
          </div>

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Opiniões
            </div>
            <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Por Eduardo Boca Junior em 15/10/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Por Eugênio Boquinha em 20/11/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Por Vinicius Bocca da Silva em 03/01/18</small>
              <hr>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

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
    <script src="vendorItem/jquery/jquery.min.js"></script>
    <script src="vendorItem/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
