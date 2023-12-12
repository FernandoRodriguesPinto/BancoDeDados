<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $mysqli = new mysqli("localhost", "root", "", "TenisDeMesa");

    if ($mysqli->connect_error) {
        die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
    }

    $query = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $mysqli->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($senha == $row['senha']) {
            $_SESSION["nomeUsuario"] = $row["nome"]; 

            header("Location: index.php");
            exit;
        } else {
            header("Location: cadastro.php?erro=" . urlencode("Senha incorreta."));
        }
    } else {
        header("Location: cadastro.php?erro=" . urlencode("Email não encontrado."));
    }

    $stmt->close();
    $mysqli->close();
}
?>
