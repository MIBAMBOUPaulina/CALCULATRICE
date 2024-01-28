<?php
$servername = "localhost";  // Remplacez par le nom de votre serveur MySQL
$username = "root";  // Remplacez par votre nom d'utilisateur MySQL
$password = "";  // Remplacez par votre mot de passe MySQL
$dbname = "db_stock";  // Remplacez par le nom de votre base de données

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";
} catch (PDOException $e) {
    echo "La connexion à la base de données a échoué : " . $e->getMessage();
}
?>
