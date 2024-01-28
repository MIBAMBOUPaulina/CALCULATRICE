<?php
include("connexion.php");

// Initialiser le tableau des catégories s'il n'est pas encore défini
session_start();
if (!isset($_SESSION['categories'])) {
    $_SESSION['categories'] = [];
}

// Traitement de l'ajout d'une nouvelle catégorie
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nom"]) && isset($_POST["description"])) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];

    // Vérifier si le nom contient uniquement des lettres alphabétiques
    if (!ctype_alpha($nom)) {
        echo "Le champ 'Nom' doit contenir uniquement des lettres alphabétiques.";
    } else {
        // Enregistrement dans le tableau de session
        $_SESSION['categories'][] = array(
            'id' => count($_SESSION['categories']) + 1, // ID auto-incrémenté pour le tableau de session
            'nom' => $nom,
            'description' => $description
        );

        // Enregistrement dans la base de données
        try {
            $query = "INSERT INTO categorie (nom_categorie, description) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $nom);
            $stmt->bindParam(2, $description);
            $stmt->execute();

            echo "Enregistrement réussi dans la base de données.";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement dans la base de données: " . $e->getMessage();
        }

        // Redirection après la soumission du formulaire pour éviter le problème de rafraîchissement
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}

// Récupération de toutes les catégories depuis la base de données
try {
    $query = "SELECT * FROM categorie";
    $result = $conn->query($query);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des données depuis la base de données: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Stock - Catégorie</title>
    
</head>
<body>
    <h2>Ajouter une catégorie</h2>
    <form action="" method="post" id="categorieForm">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required pattern="[A-Za-z]+" title=""><br>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br>

        <button type="submit">Enregistrer</button>
    </form>
    
    <!-- Afficher la liste des catégories depuis la base de données -->
    <h2>Liste des catégories</h2>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        // Afficher les données depuis le tableau de session
        foreach ($_SESSION['categories'] as $categorie) {
            echo "<tr>";
            echo "<td>" . $categorie['id'] . "</td>";
            echo "<td>" . $categorie['nom'] . "</td>";
            echo "<td>" . $categorie['description'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script src="./js/script.js/"></script>
</body>
</html>