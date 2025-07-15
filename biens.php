<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"] ?? '';
    $adresse = $_POST["adresse"] ?? '';
    $prix = $_POST["prix"] ?? '';

    if (empty($titre)  empty($adresse)  empty($prix)) {
        echo json_encode(["success" => false, "message" => "Tous les champs sont obligatoires."]);
        exit;
    }

    $sql = "INSERT INTO biens (titre, adresse, prix) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$titre, $adresse, $prix])) {
        echo json_encode(["success" => true, "message" => "Bien ajouté avec succès."]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout du bien."]);
    }
}
?>
