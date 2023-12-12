<?php
session_start(); 
$mysqli = new mysqli("localhost", "root", "", "TenisDeMesa");
$query = "SELECT * FROM ranking_tenis_de_mesa ORDER BY pontuacao DESC";
$resultados = $mysqli->query($query);
$i = 1;
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>	
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Ranking</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="./index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Torneios</a></li>
                        <li class="nav-item"><a class="nav-link  active" href="#!">Ranking</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="./ranking.php"></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <hr class="invisible">
        <div class="container d-flex justify-content-center col-auto">
            <table class="table table-bordered table-hover table-responsive text-center">
                <thead class="table-dark"> 
                    <th>Posição</th>
                    <th>Nação</th>
                    <th>Nome</th>
                    <th>Pontuação</th>
                </thead>
                <tbody>
                    <?php foreach($resultados as $resultado){ ?>
                    <tr>
                    <td><?= $i;?></td>
                    <?php
                    $codigoPais = $resultado['nacao']
                    ?>
                    <td><img src="https://flagsapi.com/<?=$codigoPais?>/flat/32.png"></td>
                    <td><?= $resultado['nome'];?></td>
                    <td><?= $resultado['pontuacao'];?></td>
                    </tr>
                    <?php 
                $i++;} ?>
                </tbody>
            </table>
        </div>
        <?php
        if (isset($_SESSION['nomeUsuario'])) {
            if($_SESSION['nomeUsuario'] === 'Admin7382'){
        ?>
        <div class="container py-1 text-center"> 
                Para ver os códigos das bandeiras, acesse <a target="blank" href="https://flagsapi.com/#countries">aqui</a>.
        </div>
        </div>
        <div class="container py-5">
        <form action="incluirRanking.php" class="form" method="POST">
            <h2>Adicionar um novo item</h2>
            <div class="form-input"><label for="Nacao">Nação</label><input id="Nacao" class="form-control" type="text" name="nacao"></div>
            <div class="form-input"><label for="Nome">Nome</label><input id="Nome" class="form-control" type="text" name="nome"></div>
            <div class="form-input"><label for="Pontuacao">Pontuação</label><input id="Pontuacao" class="form-control" type="text" name="pontuacao"></div> <br>
            <button class="btn btn-danger" type="submit">Adicionar</button>
        </form>
        </div>
        <div class="container py-5">
            <form action="removerRanking.php" method="POST">
                <div class="form-group">
                    <h2>Remover um item</h2>
                    <label for="itemARemover">Selecione o item a ser removido:</label>
                    <select id="itemARemover" class="form-control" name="idItemARemover">
                    <option value="" disabled selected>Jogadores</option>
                        <?php foreach ($resultados as $resultado) { ?>
                            <option value="<?= $resultado['id']; ?>">
                                <?= $resultado['nome']; ?> (<?= $resultado['nacao']; ?>)
                            </option>
                        <?php } ?>
                    </select>
                </div> <br> 
                <button class="btn btn-danger" type="submit">Remover</button>
            </form>
        </div>
        <div class="container py-5">
        <form action="editarRanking.php" method="POST">
            <div class="form-group">
                <h2>Editar um item</h2>
                <label for="idItemAEditar">Selecione o item a ser editado:</label>
                <select id="idItemAEditar" class="form-control" name="idItemAEditar" onchange="atualizarPontuacao()">
                    <option value="" disabled selected>Jogadores</option>
                    <?php foreach ($resultados as $resultado) { ?>
                        <option value="<?= $resultado['id']; ?>" data-pontuacao="<?= $resultado['pontuacao']; ?>" data-nacao="<?= $resultado['nacao']; ?>" data-nome="<?= $resultado['nome']; ?>">
                            <?= $resultado['nome']; ?> (<?= $resultado['nacao']; ?>)
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-input">
                <label for="NovaPontuacao">Nova Pontuação</label>
                <input id="NovaPontuacao" class="form-control" type="value" name="novaPontuacao" value="0">
            </div>
            <div class="form-input">
            <label for="NovaNacao">Nação</label>
            <input id="NovaNacao" class="form-control" type="text" name="novaNacao">
            </div>
            <div class="form-input">
            <label for="NovoNome">Nome</label>
            <input id="NovoNome" class="form-control" type="text" name="novoNome">
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Editar</button>
        </form>
    </div>
        <?php
            }
        }
        ?>
    </body>

    <script>
        function atualizarPontuacao() {
        var select = document.getElementById("idItemAEditar");
        var novaPontuacaoInput = document.getElementById("NovaPontuacao");
        var novaNacaoInput = document.getElementById("NovaNacao");
        var novoNomeInput = document.getElementById("NovoNome");

        var pontuacaoAtual = select.options[select.selectedIndex].getAttribute("data-pontuacao");
        var nacaoAtual = select.options[select.selectedIndex].getAttribute("data-nacao");
        var nomeAtual = select.options[select.selectedIndex].getAttribute("data-nome");

        novaPontuacaoInput.value = pontuacaoAtual;
        novaNacaoInput.value = nacaoAtual;
        novoNomeInput.value = nomeAtual;
    }
    </script>