<?php
$host = 'localhost';
$dbname = 'immogestion';  // ⚠️ Mets ici le nom exact de ta base dans phpMyAdmin
$username = 'root';       // Nom d’utilisateur par défaut dans XAMPP
$password = '';           // Mot de passe vide dans XAMPP par défaut

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
