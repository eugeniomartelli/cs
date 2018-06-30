<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Corp Search - Cadastro Cliente</title>
        <link rel="icon" type="image/png" href="images/icons/corpsearch.png">

        <!-- Bootstrap core CSS -->
        <link href="vendorCadastroCl/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/cssCadastroCl.css" rel="stylesheet">

    </head>

    <body>

        <?php
        include './menu.php';
        include './Classes/Usuarios.php';
        include 'Classes/TipoUsuario.php';
        $usuarios = new Usuarios();
        $tipos = new TipoUsuario();
        $tabtipos = $tipos->getAll();

        if (isset($_POST['salvar'])) {
            unset($_POST['salvar']);

            //Transforma a senha em hash
            $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            // Insere os dados no banco
            $sql = $usuarios->insert($_POST);

            // Se os dados forem inseridos com sucesso
            if ($sql) {
                echo "<script>alert('Cadastrado com Sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao inserir!');</script>";
            }
        }
        ?>
        <br />

        <!-- Page Content -->
        <div class="col-lg-4" style="text-align: center">
            <h1>Cadastro</h1>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="container form-horizontal col-lg-9">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" value="<?= isset($_SESSION['nome']) ? $_SESSION['nome'] : "" ?>">
            </div>


            <div class="row">
                <div class="col">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" placeholder="" name="endereco" value="<?= isset($_SESSION['endereco']) ? $_SESSION['endereco'] : "" ?>">
                </div>
                <div class="col">
                    <label for="numero">Número:</label>
                    <input type="text" class="form-control" placeholder="" name="numero" value="<?= isset($_SESSION['numero']) ? $_SESSION['numero'] : "" ?>">
                </div>
                <div class="col">
                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control" placeholder="" name="bairro" value="<?= isset($_SESSION['bairro']) ? $_SESSION['bairro'] : "" ?>">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col">
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control" placeholder="xx.xxx-xxx" name="cep" value="<?= isset($_SESSION['cep']) ? $_SESSION['cep'] : "" ?>">
                </div>
                <div class="col">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" placeholder="" name="cidade" value="<?= isset($_SESSION['cidade']) ? $_SESSION['cidade'] : "" ?>">
                </div>
                <div class="col">
                    <label for="uf">UF:</label>
                    <input type="text" class="form-control" placeholder="" name="uf" value="<?= isset($_SESSION['uf']) ? $_SESSION['uf'] : "" ?>">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col">
                    <label for="cpf">CPF/CNPJ:</label>
                    <input type="text" class="form-control" placeholder="" name="pfpj" value="<?= isset($_SESSION['pfpj']) ? $_SESSION['pfpj'] : "" ?>">
                </div>
                <div class="col">
                    <label for="rg">RG/IE:</label>
                    <input type="text" class="form-control" placeholder="" name="rgie" value="<?= isset($_SESSION['rgie']) ? $_SESSION['rgie'] : "" ?>">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" placeholder="(xx) xxxxx-xxxx" name="telefone" value="<?= isset($_SESSION['telefone']) ? $_SESSION['telefone'] : "" ?>">
                </div>
                <div class="col">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="email@email.com" name="email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col">
                    <label for="login">Login:</label>
                    <input type="text" class="form-control" placeholder="" name="login" value="<?= isset($_SESSION['login']) ? $_SESSION['login'] : "" ?>">
                </div>
                <div class="col">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" placeholder="" name="senha" value="<?= isset($_SESSION['senha']) ? $_SESSION['senha'] : "" ?>">
                </div>
                <div class="col">
                    <label for="tipousuario">Tipo de Usuário:</label>
                    <select name="tipousuario" required="" class="form-control">
                        <option value="">Selecione a categoria</option>
                        <?php
                        foreach ($tabtipos as $tip) {
                            var_dump($tip['id']);
                            $opcao = isset($_SESSION['tipoUsuario']) && $tip['id'] == $_SESSION['tipoUsuario'] ? 'selected' : '';
                            ?>
                            <option value="<?= $tip['id'] ?>" <?= $opcao ?>>
                                <?= $tip['tipo'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br />
            <?php
            if (!isset($_SESSION['login'])) {
                ?>

                <div>
                    <button type="submit" class="btn btn-primary btn-lg" name="salvar" value="salvar"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
                </div>
                <?php
            } else {
                echo '<br/><h3>Para alterar seus dados, contate os administradores do sistema.</h3>';
            }
                ?>
            <br >
        </form>

        <!-- Footer -->
        <footer class=" py-4 bg-dark" style="left: 0; bottom: 0; width: 100%;">
            <div class="text-center container">
                <p class="text-white">Está com algum problema?<a class="nav-link" href="mailto:eugeniomartelli7@gmail.com">Contate o administrador do sistema</a></p>
                <br />
                <p class="m-0 text-center text-white" style="padding-top: 10px;">Copyright &copy; Corp Search 2018</p>
            </div>
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
