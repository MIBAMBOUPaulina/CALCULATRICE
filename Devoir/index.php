<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/logsign.css">
    <title>Accueil</title>
</head>

<body>
   <?php include("./vue/header.php");?>
    <div id="log">
        <pre id="slogan"><span id="txtg">Bienvenue sur notre site </span>Institut African de Management</pre>
        <p id="connexion">Connexion</p>
        <form action="" method="post">
            <div class="form">
                <input type="text" placeholder="Email" name="email" required>
                <input type="password" placeholder="Mots de passe" name="mdp" required>
                <p class="erreur"> </p>
                
                <button id="btn" type="submit" name="valider"><a href="index1.php">Se connecter</a></button>
                <p id="sinscrire"><span>Vous avez pas de compte? 
                        <a href="./Signup.php"> <span
                                style="text-decoration-line: underline;color: black;font-weight: 900;cursor: pointer;">
                                <br> Veuillez-vous inscrire</span></a></span></p><br><br><br><br>
                <button id="btn" type="submit" name="valider"><a href="Page4.php">Créer un compte</a></button>
         
            </div>
        </form>

    </div>

</body>
<footer>

</footer>
</html>