<?php
// Test de variables
if ($_POST['nom'] && $_POST['prenom']) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

// Lifetime du cookie
    $duree = 60; // Durée à renseigner en secondes

// Creation du cookie
    setcookie('nom', $nom, time()+ $duree);
    setcookie('prenom', $prenom, time()+ $duree);  /* expire dans 10 secondes */
}
else {
    echo "<p>Formulaire mal renseigné</p>";
}
// Suppression du cookie
unset($_COOKIE);
// OU
setcookie('nom_du_cookie', 'valeur_du_cookie', time() - 3600); // Set un temps négatif pour que le cookie expire automatiquement

// Redirection vers la page qui lit les informations du cookie
header("location: ./page.php");