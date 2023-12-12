<?php



$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$mysqli = new mysqli("localhost", "root", "", "TenisDeMesa");
$stmt = $mysqli->prepare("INSERT into usuario (nome, email, senha) values(?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $senha);

if($stmt->execute()){
    session_start();

    $mysqli = new mysqli("localhost", "root", "", "TenisDeMesa");

    if ($mysqli->connect_error) {
        die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
    }

    $query = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $mysqli->error);
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt->bind_param("ss", $email, $senhaHash);
    $stmt->execute();
    $result = $stmt->get_result();

        $_SESSION["nomeUsuario"] = $nome; 

        header("Location: index.php");
        exit;


    $stmt->close();
    $mysqli->close();

    header("Location: index.php"); exit;
} else {
    echo "Erro no cadastro";
}

