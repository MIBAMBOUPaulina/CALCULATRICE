<?php

include("connexion.php");

class Produit {
    private $id;
    private $nom;
    private $categorie;

    public function __construct($nom, $categorie) {
        $this->nom = $nom;
        $this->categorie = $categorie;
    }

    public function save() {
        global $bdd;
        $stmt = $bdd->prepare('INSERT INTO produits (nom, categorie_id) VALUES (?, ?)');
        $stmt->execute([$this->nom, $this->categorie->getId()]);
        $this->id = $bdd->lastInsertId();
    }
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
    <form action="traitement_categorie.php" method="post" id="categorieForm">
        <!-- Champ pour l'ID (peut être caché si autoincrémenté) -->
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" readonly><br><br><br><br>

        <!-- Champ pour le Nom -->
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br><br>

        <!-- Champ pour la Catégorie -->
        <label for="categorie">Catégorie:</label>
        <input type="text" id="categorie" name="categorie" required><br><br><br>

        <!-- Champ pour la Description -->
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br><br><br>

        <!-- Bouton de soumission -->
        <button type="submit">Enregistrer</button>
    </form>

    <!-- Tableau des catégories -->
    <h2>Liste des catégories</h2>
    <table border='1' id="tableCategorie">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
            // Placeholder data from the database (you should replace this with actual data retrieval)
            $categoriesData = [
                ["id" => 1, "nom" => "Cat1", "categorie" => "Categorie1", "description" => "Description1"],
                ["id" => 2, "nom" => "Cat2", "categorie" => "Categorie2", "description" => "Description2"]
            ];

            foreach ($categoriesData as $row) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nom']}</td>";
                echo "<td>{$row['categorie']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "<td><button type='button' onclick='modifierLigne(this)'>Modifier</button> <button type='button' onclick='supprimerLigne(this)'>Supprimer</button></td>";
                echo "</tr>";
            }
        ?>
    </table>

    <script>
        // Reste du script JavaScript (voir versions précédentes)
    </script>
</body>
</html>

// Charger les données stockées localement au chargement de la page
        window.onload = function () {
            chargerDonnees();
        };

        function ajouterCategorie() {
            var nom = document.getElementById("nom").value;
            var categorie = document.getElementById("categorie").value;
            var description = document.getElementById("description").value;

            var table = document.getElementById("tableCategorie");
            var newRow = table.insertRow(table.rows.length);

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            cell1.innerHTML = table.rows.length - 1; // ID auto-incrémenté
            cell2.innerHTML = nom;
            cell3.innerHTML = categorie;
            cell4.innerHTML = description;
            cell5.innerHTML = '<button type="button" onclick="modifierLigne(this)">Modifier</button> ' +
                              '<button type="button" onclick="supprimerLigne(this)">Supprimer</button>';

            // Enregistrer les données dans le stockage local
            sauvegarderDonnees();

            document.getElementById("categorieForm").reset();
        }

        function supprimerLigne(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Enregistrer les données dans le stockage local après suppression
            sauvegarderDonnees();
        }

        function modifierLigne(button) {
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName("td");

            // Remplir le formulaire avec les données de la ligne sélectionnée
            document.getElementById("id").value = cells[0].innerHTML;
            document.getElementById("nom").value = cells[1].innerHTML;
            document.getElementById("categorie").value = cells[2].innerHTML;
            document.getElementById("description").value = cells[3].innerHTML;

            // Supprimer la ligne du tableau
            row.parentNode.removeChild(row);

            // Enregistrer les données dans le stockage local après modification
            sauvegarderDonnees();
        }

        function sauvegarderDonnees() {
            var table = document.getElementById("tableCategorie");
            var data = [];

            for (var i = 1; i < table.rows.length; i++) {
                var cells = table.rows[i].cells;
                var rowData = {
                    id: cells[0].innerHTML,
                    nom: cells[1].innerHTML,
                    categorie: cells[2].innerHTML,
                    description: cells[3].innerHTML
                };

                data.push(rowData);
            }

            localStorage.setItem("categoriesData", JSON.stringify(data));
        }

        function chargerDonnees() {
            var data = localStorage.getItem("categoriesData");

            if (data) {
                data = JSON.parse(data);

                var table = document.getElementById("tableCategorie");

                for (var i = 0; i < data.length; i++) {
                    var newRow = table.insertRow(table.rows.length);

                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);

                    cell1.innerHTML = data[i].id;
                    cell2.innerHTML = data[i].nom;
                    cell3.innerHTML = data[i].categorie;
                    cell4.innerHTML = data[i].description;
                    cell5.innerHTML = '<button type="button" onclick="modifierLigne(this)">Modifier</button> ' +
                                      '<button type="button" onclick="supprimerLigne(this)">Supprimer</button>';
                }
            }
        }
    

