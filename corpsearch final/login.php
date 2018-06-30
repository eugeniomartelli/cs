<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login - Corp Search</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/corpsearch.png"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendorLogin/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fontsLogin/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fontsLogin/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendorLogin/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendorLogin/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendorLogin/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/cssLogin.css">
        <link rel="stylesheet" type="text/css" href="css/cssLogin2.css">
        <!--===============================================================================================-->
    </head>
    <body>
        <?php
        include 'Classes/Usuarios.php';
        if (isset($_POST['entrar'])) {
            $usuarios = new Usuarios();
            $u = $usuarios->getByUser($_POST['usuario']);
            if ($u && password_verify($_POST['senha'], $u['senha'])) {
                @session_start();
                $_SESSION['login'] = $_POST['usuario'];
                $_SESSION['senha'] = $u['senha'];
                $_SESSION['nome'] = $u['nome'];
                $_SESSION['pfpj'] = $u['pfpj'];
                $_SESSION['rgie'] = $u['rgie'];
                $_SESSION['endereco'] = $u['endereco'];
                $_SESSION['numero'] = $u['numero'];
                $_SESSION['bairro'] = $u['bairro'];
                $_SESSION['cidade'] = $u['cidade'];
                $_SESSION['uf'] = $u['uf'];
                $_SESSION['cep'] = $u['cep'];
                $_SESSION['email'] = $u['email'];
                $_SESSION['telefone'] = $u['telefone'];
                $_SESSION['tipoUsuario'] = $u['tipoUsuario'];
                if (isset($_GET['redirect'])) {
                    header('Location: ' . $_GET['redirect']);
                } else {
                    header('Location: shop.php');
                }
                exit();
            } else {
                echo("<script>alert('Login ou senha inválido!');</script>");
            }
        }
        ?>

        <div class="limiter">
            <div class="container-login100" style="background-image: url('images/background.png');">
                <div class="wrap-login100 p-t-30 p-b-30">
                    <form method="post" class="login100-form validate-form">
                        <div class="login100-form-avatar">
                            <img src="images/corpsearch.png" alt="logo">
                        </div>

                        <span class="login100-form-title p-t-20 p-b-45">
                            SEJA BEM-VINDO(A)!
                        </span>

                        <?php
                        @session_start();
                        if (isset($_SESSION['nome'])) {
                            ?>
                            <div class="container-login100-form-btn p-t-10">
                                <a class="login100-form-btn" href="shop.php">Vá para a Loja!</a>
                            </div>

                            <?php
                        } else {
                            ?>

                            <div class="wrap-input100 validate-input m-b-10" data-validate = "Usuário é necessário">
                                <input class="input100" type="text" name="usuario" placeholder="Usuário">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-10" data-validate = "Senha é necessária">
                                <input class="input100" type="password" name="senha" placeholder="Senha">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>

                            <div class="container-login100-form-btn p-t-10">
                                <button class="login100-form-btn" name="entrar">
                                    Entrar
                                </button>
                            </div>

                            <div class="text-center w-full p-t-25 p-b-30">
                                <a href="mailto:eugeniomartelli7@gmail.com" class="txt1">
                                    Esqueceu seus dados? Contate o administrador do sistema!
                                </a>
                            </div>

                            <div class="text-center w-full">
                                <a class="txt1" href="cadastro.php">
                                    Cadastre-se
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>




        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>
</html>
