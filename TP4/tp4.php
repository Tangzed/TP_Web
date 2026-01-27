<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TP n°4 - Premiers pas PHP</title>
</head>
<body>
    <h1>TP n°4 - Premiers pas PHP</h1>
    <hr>

    <h2>Premiers pas</h2>
    <?php
        date_default_timezone_set("Europe/Paris");
        echo 'Bonjour, nous sommes le <b>'.date('d/m/Y').'</b>, il est <b>'.date('H:i:s').'</b>';
    ?>

    <br><br>

    <h2>Premier formulaire</h2>
    <form action="process_f1.php" method="POST">
        <h3>Nous aimerions mieux vous connaître :</h3>
        <label for="languages">Quelles langues parlez-vous :</label>
        <br><br>
        <select name="langues[]" multiple="multiple" id="languages" style="height: 80px;">
            <option value="français">Français</option>
            <option value="anglais">Anglais</option>
            <option value="allemand">Allemand</option>
            <option value="espagnol">Espagnol</option>
        </select>
        <br><br>
        Quels sont vos compétences en informatique (choisir au minimum 2) :
        <br>
        <input type="checkbox" name="competences[]" value="HTML" id="html"> <label for="html">HTML</label>&nbsp;
        <input type="checkbox" name="competences[]" value="CSS" id="css"> <label for="css">CSS</label>&nbsp;
        <input type="checkbox" name="competences[]" value="PHP" id="php"> <label for="php">PHP</label>&nbsp;
        <input type="checkbox" name="competences[]" value="SQL" id="sql"> <label for="sql">SQL</label>&nbsp;
        <br><br>
        <input type="reset" value="Effacer">
        <input type="submit" value="Envoyer">
    </form>
    <br>

    <h2>Second formulaire</h2>
    <form action="process_f2.php" method="POST">
        <h3>Dessin d'un triangle :</h3>
        <label for="size">Longueur du coté :</label>
        <input type="number" min="0" name="size" id="size" required>
        <br>
        <input type="radio" name="isFilled" id="v0" value="0" checked>&nbsp;
        <label for="v0">Intérieur vide</label>
        <input type="radio" name="isFilled" id="v1" value="1">&nbsp;
        <label for="v1">Intérieur plein</label>
        <br>
        <label for="character">Caractère à utiliser :</label>
        <select name="character" id="character">
            <?php
                $characters = array('*', '#', 'o', 'x');
                foreach ($characters as $char) {
                    echo '<option value="'.$char.'">'.$char.'</option>';
                }
            ?>
        </select>
        <br><br>
        <input type="reset" value="Effacer">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>