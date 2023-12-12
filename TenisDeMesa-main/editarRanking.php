<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idItemAEditar = $_POST["idItemAEditar"];
    $novaPontuacao = $_POST["novaPontuacao"];
    $novaNacao = $_POST["novaNacao"];
    $novoNome = $_POST["novoNome"];

    $mysqli = new mysqli("localhost", "root", "", "TenisDeMesa");

    if ($mysqli->connect_error) {
        die("Falha na conexão ao banco de dados: " . $mysqli->connect_error);
    }

    $query = "UPDATE ranking_tenis_de_mesa SET pontuacao = ?, nacao = ?, nome = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sssi", $novaPontuacao, $novaNacao, $novoNome, $idItemAEditar);

        if ($stmt->execute()) {
            header('Location: ranking.php');
        } else {
            echo "Erro ao atualizar os dados: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da declaração: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo "Acesso indevido ao script de edição.";
}
?>
