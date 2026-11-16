<?php
session_start();
if (!isset($_SESSION['userid']) || $_SESSION['userid'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = getenv('DB_HOST') ?: '127.0.0.1';
    $username = getenv('DB_USER') ?: 'acesso_demo';
    $password = getenv('DB_PASSWORD') ?: '';
    $dbname = getenv('DB_NAME') ?: 'acesso_demo';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Usuário removido com sucesso";
    } else {
        echo "Erro ao remover o usuário: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
