<!DOCTYPE html>
<html>

<head>
    <title> Easy CV - CV</title>
   
    <script src="JS/Page4.js" ></script>
</head>

<body>
    <button id="btn" type="submit" name="valider"><a href="index.php">Presentation</a></button>
    <fieldset class="contener">
        <legend>Formulaire</legend>
        <form action="" onchange="verif()">
            <div class="contener">
                <div class="contener">
                    <div class="contener_input">
                        <label for="lenom">Nom complet :</label>
                        <input type="text" name="nom" id="lenom">
                    </div>

                    <div class="contener_input">
                        <label for="laprofession">Profession :</label>
                        <input type="text" name="profession" id="laprofession">
                    </div>

                    <div class="contener_input">
                        <label for="adresse">Adresse :</label>
                        <input type="text" name="adresse" id="adresse">

                    </div>

                    <div class="contener_input">
                        <label for="tel">Telephone :</label>
                        <input type="number" name="tel" id="tel" max="15">
                    </div>

                    <div class="contener_input">
                        <label for="mail">Mail :</label>
                        <input type="email" name="mail" id="mail">
                    </div>

                    <div class="contener_input">
                        <input type="button" name="enregistrer"  value="Sauvegarder" id="enregistrer">
                    </div>

                </div>
                <div class="contener cv" id="droite">
                    Merci de bien vérifier après la saisie
                </div>
            </div>
        </form>
    </fieldset>
</body>

</html>