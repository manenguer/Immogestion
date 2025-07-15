<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"] ?? '';
    $telephone = $_POST["telephone"] ?? '';
    $email = $_POST["email"] ?? '';

    if (empty($nom)  empty($telephone)  empty($email)) {
        echo json_encode(["success" => false, "message" => "Tous les champs sont obligatoires."]);
        exit;
    }

    $sql = "INSERT INTO clients (nom, telephone, email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nom, $telephone, $email])) {
        echo json_encode(["success" => true, "message" => "Client ajouté avec succès."]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout du client."]);
    }
}
?>
