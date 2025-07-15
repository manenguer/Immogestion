<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if (empty($username) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Nom d'utilisateur et mot de passe requis."]);
        exit;
    }

    $sql = "SELECT * FROM utilisateurs WHERE username = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);

    $user = $stmt->fetch();
    if ($user) {
        echo json_encode(["success" => true, "message" => "Connexion réussie", "username" => $user["username"]]);
    } else {
        echo json_encode(["success" => false, "message" => "Identifiants incorrects"]);
    }
}
?>
