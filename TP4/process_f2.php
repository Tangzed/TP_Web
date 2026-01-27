<?php
echo "<h1>Dessin du triangle</h1>";

// Récupération des données du formulaire
$taille = isset($_POST['size']) ? intval($_POST['size']) : 0;
$isFilled = $_POST['isFilled']; // "0" pour vide, "1" pour plein
$char = $_POST['character'];

echo "Taille demandée : $taille <br><br>";
echo "<pre>"; // Balise cruciale pour l'alignement des caractères

for ($i = 1; $i <= $taille; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        // Logique pour le triangle vide : 
        // On dessine si on est sur les bords (1ère colonne, dernière colonne, ou dernière ligne)
        // Ou si l'utilisateur a choisi "plein" (isFilled == "1")
        if ($isFilled == "1" || $i == 1 || $i == $taille || $j == 1 || $j == $i) {
            echo $char;
        } else {
            echo " "; // Espace vide pour l'intérieur
        }
    }
    echo "\n"; // Retour à la ligne pour chaque rangée
}

echo "</pre>";
echo '<br><a href="tp4.php">Retour au formulaire</a>';
?>