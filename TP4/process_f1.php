<?php
echo "<h1>Résultat du premier formulaire</h1>";

// Récupération des langues (tableau)
if (isset($_POST['langues']) && !empty($_POST['langues'])) {
    echo "Vous parlez : <ul>";
    foreach ($_POST['langues'] as $langue) {
        echo "<li>" . htmlspecialchars($langue) . "</li>";
    }
    echo "</ul>";
} else {
    echo "Aucune langue sélectionnée.<br>";
}

// Récupération des compétences (tableau)
if (isset($_POST['competences']) && !empty($_POST['competences'])) {
    echo "Vos compétences : <b>" . implode(", ", $_POST['competences']) . "</b>";
} else {
    echo "Aucune compétence sélectionnée.";
}

echo '<br><br><a href="tp4.php">Retour au formulaire</a>';
?>