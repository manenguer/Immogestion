<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bien_id = $_POST["bien_id"] ?? '';
    $client_id = $_POST["client_id"] ?? '';
    $montant = $_POST["montant"] ?? '';
    $date = $_POST["date"] ?? '';

    if (empty($bien_id)  empty($client_id)  empty($montant) || empty($date)) {
        echo json_encode(["success" => false, "message" => "Tous les champs sont obligatoires."]);
        exit;
    }

    $sql = "INSERT INTO transactions (bien_id, client_id, montant, date) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$bien_id, $client_id, $montant, $date])) {
        echo json_encode(["success" => true, "message" => "Transaction enregistrée avec succès."]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur lors de l'enregistrement de la transaction."]);
    }
}
?>
