<?php
//include_once 'autentica.php';
require_once 'Classes/Categorias.php';
include_once './funcoes.php';
require_once 'Classes/Produtos.php';
$produtos = new Produtos();
$categorias = new Categorias();
$tabcategorias = $categorias->getAll();

$op = isset($_GET['op']) ? $_GET['op'] : '';
if (isset($_POST['salvar'])) {
    // Validações server side
}
if ($op == 'new' && isset($_POST['salvar'])) {
    unset($_POST['id'], $_POST['salvar']);
    
    $foto = $_FILES['img'];
    // Se a foto estiver sido selecionada
    if (!empty($foto["name"])) {

        // Largura máxima em pixels
        $largura = 1000;
        // Altura máxima em pixels
        $altura = 1000;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 30000;

        $error = array();

        // Verifica se o arquivo é uma imagem
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
            $error[1] = "Isso não é uma imagem.";
        }

        // Pega as dimensões da imagem
        $dimensoes = getimagesize($foto["tmp_name"]);

        // Verifica se a largura da imagem é maior que a largura permitida
        if ($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
        }

        // Verifica se a altura da imagem é maior que a altura permitida
        if ($dimensoes[1] > $altura) {
            $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
        }

        // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if ($foto["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
        }

        // Se não houver nenhum erro
        if (count($error) == 0) {

            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

            // Caminho de onde ficará a imagem
            $caminho_imagem = "images/produtos/" . $nome_imagem;

            // Faz o upload da imagem para seu respectivo caminho e define seu endereço no POST
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
            $_POST['img'] = $caminho_imagem;

            // Insere os dados no banco
            $sql = $produtos->insert($_POST);

            // Se os dados forem inseridos com sucesso
            if ($sql) {
                echo "<script>alert('Cadastrado com Sucesso!');</script>";
                header("Location: shop.php");
                exit();
            }
        }

        // Se houver mensagens de erro, exibe-as
        if (count($error) != 0) {
            foreach ($error as $erro) {
                echo $erro . "<br />";
            }
        }
    }

    //inserir no banco
//    if ($produtos->insert($_POST)) {
//        header("Location: shop.php");
//        exit();
//    }
} elseif ($op == "edit" && isset($_GET['id'])) {
    if (isset($_POST['salvar'])) {
        unset($_POST['salvar']);
        if ($produtos->update($_POST)) {
            header("Location: shop.php");
            exit();
        } else {
            // mostra mensagem
            $prod = $_POST;
        }
    } else {
        $prod = $produtos->getById($_GET['id']);
    }
} elseif ($op == "delete" && isset($_GET['id'])) {
    $produtos->delete($_GET['id']);
    header("Location: shop.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Corp Search - Área do Fornecedor</title>
        <link rel="icon" type="image/png" href="images/icons/corpsearch.png"/>

        <!-- Bootstrap core CSS -->
        <link href="vendorCadastroCl/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/cssCadastroCl.css" rel="stylesheet">

    </head>

    <body>

        <?php include 'menu.php'; ?>
        </br>

        <!-- Page Content -->
        <div class="col-lg-5" style="text-align: center">
            <h1>Novo Produto</h1>
        </div>

        <form method="post" class="container form-horizontal col-lg-9" enctype="multipart/form-data">

            <div class="form-group">
                <label>Código:</label>
                <input class="form-control" type="text" name="id" readonly="" value="<?= isset($prod) ? $prod['id'] : '' ?>">
            </div>

            <div class="form-group">
                <label>Nome:</label>
                <input class="form-control" type="text" name="nome" required="" autofocus="" value="<?= isset($prod) ? $prod['nome'] : '' ?>">
            </div>

            <div class="row">
                <div class="col">
                    <label for="preco">Preço:</label>
                    <input class="form-control" type="number" onkeypress="valor()" name="preco" required="" step="0.01" min="0" 
                           value="<?= isset($prod) ? $prod['preco'] : '' ?>">
                </div>
                <div class="col">
                    <label for="categoria">Categoria:</label>
                    <select name="categoria" required="" class="form-control">
                        <option value="">Selecione a categoria</option>
                        <?php
                        foreach ($tabcategorias as $cat) {
                            $opcao = isset($prod) &&
                                    $cat['id'] == $prod['categoria'] ? 'selected' : '';
                            ?>
                            <option value="<?= $cat['id'] ?>" <?= $opcao ?>>
                                <?= $cat['nome'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            </br>

            <div class="form-group">
                <label for="obs">Descrição:</label>
                <input class="form-control" type="text" name="obs" value="<?= isset($prod) ? $prod['obs'] : '' ?>">
            </div>

            </br>
            <div class="form-group">
                <label for="img">Selecione uma imagem do produto:</label>
                <input type="file" name="img" id="img" class="form-control">
                <!--<input type="submit" value="Fazer upload da imagem selecionada" name="submit">-->

            </div>

            <div>
                <button type="submit" class="btn btn-primary btn-lg" name="salvar">Salvar</button> 
            </div>
            </br>
        </form>

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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <script>
                        function valor() {
                            cifra = "R$ ";
                            if (document.getElementById('preco').value.length === "0") {
                                document.getElementById('preco').value = cifra;
                            }
                            if (document.getElementById('preco').value.length === "4") {
                                document.getElementById('preco').value += ".";
                            }
                            if (document.getElementById('preco').value.length === "8") {
                                document.getElementById('preco').value += ",";
                            }
                            if (document.getElementById('preco').value.length === "12") {
                                document.getElementById('preco').value += ",";
                            }
                        }
        </script>

    </body>

</html>
