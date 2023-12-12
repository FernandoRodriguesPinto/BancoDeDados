<?php
$mysqli = new mysqli("localhost", "root", "", "TenisDeMesa");

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o ID do item a ser removido
    $idItemARemover = $_POST["idItemARemover"];

    // Execute a consulta SQL para remover o item da tabela
    $query = "DELETE FROM ranking_tenis_de_mesa WHERE id = $idItemARemover";
    $resultado = $mysqli->query($query);

    // Verifique se a remoção foi bem-sucedida
    if ($resultado) {
        header("Location: ranking.php"); exit;  
    } else {
        echo "Erro ao remover item: " . $mysqli->error;
    }
}
