<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Corp Search - Cadastro Cliente</title>
		<link rel="icon" type="image/png" href="images/icons/corpsearch.png"/>

        <!-- Bootstrap core CSS -->
        <link href="vendorCadastroCl/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/cssCadastroCl.css" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Corp Search</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="mailto:eugeniomartelli7@gmail.com">Contate o administrador do sistema</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
		</br>

        <!-- Page Content -->
        <div class="col-lg-4" style="text-align: center">
            <h1>Cadastro</h1>
        </div>

        <form action="" method="get" class="container form-horizontal col-lg-9">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" value="">
            </div>

            <form>
              <div class="row">
                <div class="col">
                  <label for="endereco">Endereço:</label>
                  <input type="text" class="form-control" placeholder="" name="endereco" value="">
                </div>
                <div class="col">
                  <label for="numero">Número:</label>
                  <input type="text" class="form-control" placeholder="" name="numero" value="">
                </div>
                <div class="col">
                  <label for="complemento">Complemento:</label>
                  <input type="text" class="form-control" placeholder="" name="complemento" value="">
                </div>
              </div>
              </br>
              <div class="row">
                <div class="col">
                  <label for="cpf">CPF:</label>
                  <input type="text" class="form-control" placeholder="xxx.xxx.xxx-xx" name="cpf" value="">
                </div>
                <div class="col">
                  <label for="rg">RG:</label>
                  <input type="text" class="form-control" placeholder="" name="rg" value="">
                </div>
                <div class="col">
                  <label for="nascimento">Data de Nascimento:</label>
                  <input type="date" class="form-control" placeholder="" name="nascimento" value="">
                </div>
              </div>
            </br>
              <div class="row">
                <div class="col">
                  <label for="telefone">Telefone:</label>
                  <input type="text" class="form-control" placeholder="(xx) xxxxx-xxxx" name="telefone" value="">
                </div>
                <div class="col">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" placeholder="email@email.com" name="email" value="">
                </div>
              </div>
              </br>


            <form action="" method="get" class="container form-horizontal col-lg-9">

              <div>
                <button type="submit" class="btn btn-primary btn-lg" name="salvar" value="salvar"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
              </div>
			        </br>
            </form>

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Corp Search 2018</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <!--        <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
