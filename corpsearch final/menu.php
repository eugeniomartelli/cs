<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Corp Search</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php
                @session_start();
                if (!isset($_SESSION['login'])) {
                    ?>
                    <li class="nav-item active"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item active"><a class="nav-link" href="cadastro.php">Cadastro de Usuário</a></li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item active"><a class="nav-link">Bem-vindo(a), <?= $_SESSION['nome'] ?></a></li>
                    <li class="nav-item active"><a class="nav-link" href="cadastro.php">Meu Cadastro</a></li>
                    <li class="nav-item active"><a class="nav-link" href="novoproduto.php?op=new">Cadastrar Produto</a></li>
                    <li class="nav-item active"><a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</nav>