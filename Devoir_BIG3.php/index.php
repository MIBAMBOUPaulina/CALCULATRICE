<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    

    <title>Gestion de Stock - Accueil</title>
    
</head>
<body>
    <img src="/img/images.jpeg" width = '1000'>
   

    <h1>Gestion de Stock</h1>
    <div class="info">
        <a href="./class/categorie.php" class="categories">Explorer les Catégories : <span id="totalCategories">0</span></a>
        <a href="./class/produit.php" class="produits">Découvrir les Produits : <span id="totalProduits">0</span></a>
    </div>
    <script>
        // Initialiser le nombre de catégories et de produits à zéro
        let totalCategories = 0;
        let totalProduits = 0;
    </script>
</body>
</html>
