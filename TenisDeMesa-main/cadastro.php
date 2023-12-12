<?php
session_start(); 
if (isset($_GET['erro'])) {
    $mensagemErro = urldecode($_GET['erro']);
    echo "<script>alert('$mensagemErro');</script>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tênis de Mesa - IFSP</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/778957.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">Portal do Usuário</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="./index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Torneios</a></li>
                    <li class="nav-item"><a class="nav-link" href="./ranking.php">Ranking</a></li>
                    <li class="nav-item"><a class="nav-link" href="./ranking.php"></a></li>
                    <?php
                        if(isset($_SESSION['nomeUsuario'])){ ?>
                        <li class="nav-item"><a class="nav-link" href="./cadastro.php"><?= $_SESSION['nomeUsuario'] ?></a></li>

                        <?php }else { ?>
                        <li class="nav-item"><a class="nav-link active" href="./cadastro.php">Usuário</a></li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid align-items-center justify-content-center">
    <div class="container py-5">
        <form id="cadastroForm" action="incluiUsuario.php" class="form" method="post">
            <div class="form-group">
                <div class="form-input" ><label for="Nome">Nome</label><input id="nome" name="nome" class="form-control w-50" type="text"></div>
                <div class="form-input"><label for="Email">E-mail</label><input id="email" name="email" class="form-control w-50 " type="email"></div>
                <div class="form-input"><label for="Senha">Senha</label><input id="senha" name="senha" class="form-control w-50" type="password"></div> <br>
                <button class="btn btn-sm btn-danger" type="submit">Cadastrar</button>
                <button class="btn btn-sm btn-primary" id="loginBtn" type="button">Login</button>
            </div>
        </form>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">IFSP &copy; Tênis de Mesa</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->



<script>
function validarCadastro() {
            var nome = document.getElementById("nome").value;
            var email = document.getElementById("email").value;
            var senha = document.getElementById("senha").value;

            // Verifica se os campos obrigatórios estão preenchidos
            if (nome.trim() === '' || email.trim() === '' || senha.trim() === '') {
                alert('Todos os campos obrigatórios devem ser preenchidos.');
                return false; // Impede o envio do formulário
            }

            return true; // Permite o envio do formulário
        }

        document.getElementById('loginBtn').addEventListener('click', function () {
            document.getElementById('cadastroForm').action = 'processaLogin.php';
            document.getElementById('cadastroForm').submit();
        });

        // Adiciona a função de validação ao evento onsubmit do formulário
        document.getElementById('cadastroForm').onsubmit = validarCadastro;
</script>

<script src="js/scripts.js"></script>
    
</body>