<?php 
session_start();
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
                <a class="navbar-brand" href="#!">Tênis de Mesa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Torneios</a></li>
                        <li class="nav-item"><a class="nav-link" href="./ranking.php">Ranking</a></li>
                        <li class="nav-item"><a class="nav-link" href="./ranking.php"></a></li>
                        <?php
                        if(isset($_SESSION['nomeUsuario'])){ ?>
                        <li class="nav-item">
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['nomeUsuario'] ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="./sair.php">Sair da conta</a></li>
                            </ul>
                            </div>
                        </li>

                        <?php }else { ?>
                        <li class="nav-item"><a class="nav-link" href="./cadastro.php">Usuário</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="./assets/Fan_Zhendong_ATTC2017_106.jpeg" alt="Fan Zhendong " /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Evolução</h1>
                    <p>Desde o aprimoramento das técnicas de jogo até a incorporação de tecnologias avançadas, este esporte tem testemunhado uma transformação notável. Explore conosco as nuances e desafios do Tênis de Mesa Contemporâneo enquanto mergulhamos na fascinante jornada deste esporte que continua a cativar atletas e entusiastas em todo o mundo.
                    </p>
                    <a class="btn btn-primary" href="#!">Leia agora!</a>
                </div>
            </div>
            <!-- Call to Action-->
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0">"我在乒乓球上取得成功的秘訣是堅持和對這項運動的熱愛"<br><b>Ma Long</b></p></div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Ícones do Esporte</h2>
                            <p class="card-text">Os ícones do tênis de mesa transcendem gerações com suas habilidades notáveis. Seu legado inspira e molda o esporte, demonstrando o que é possível com paletas e bolas.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">Saiba mais</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Regras</h2>
                            <p class="card-text">As regras do tênis de mesa definem o jogo, assegurando uma competição justa e emocionante. Elas são a estrutura que permite aos jogadores demonstrarem suas habilidades e estratégias.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">Saiba mais</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Equipamento</h2>
                            <p class="card-text">As raquetes, borrachas e mesas são selecionadas com precisão para se adequar ao estilo de jogo de cada jogador, influenciando diretamente os resultados.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">Saiba mais</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">IFSP &copy; Tênis de Mesa</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
