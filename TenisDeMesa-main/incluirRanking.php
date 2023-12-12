<?php
$mysqli = new mysqli("localhost", "root", "", "TenisDeMesa");

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nacao = $_POST["nacao"];
    $nome = $_POST["nome"];
    $pontuacao = $_POST["pontuacao"];

    // Execute a consulta SQL para inserir os dados na tabela
    $query = "INSERT INTO ranking_tenis_de_mesa (nacao, nome, pontuacao) VALUES ('$nacao', '$nome', '$pontuacao')";
    $resultado = $mysqli->query($query);

    // Verifique se a inserção foi bem-sucedida
    if ($resultado) {
        header("Location: ranking.php"); exit;
    } else {
        echo "Erro ao inserir dados: " . $mysqli->error;
    }
}
