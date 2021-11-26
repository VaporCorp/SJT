<?php
$regnom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u";
$regpseudo = "/^[a-zA-Z0-9_'-.#]*$/";
$regmail = "";
$regmdp = "";

if (trim($_POST['nom']=='')){
    echo "<h2>Vous n'avez pas renseigné de nom !</h2>";
}
else {
    $nom = trim($_POST['nom']);
    if (preg_match($regnom, $nom)) {
        echo "<h2>Le nom : {$nom} est ok !</h2>";
    }
    else {
        echo "<h2>Votre nom contient des caractères interdits !</h2>";
    }
}
if (trim($_POST['pseudo']=='')){
    echo "<h2>Vous n'avez pas renseigné de pseudo !</h2>";
}
else {
    $pseudo = trim($_POST['pseudo']);
    if (preg_match($regpseudo, $pseudo)) {
        echo "<h2>Le pseudo : {$pseudo} est ok !</h2>";
    }
    else {
        echo "<h2>Votre pseudo contient des caractères interdits !</h2>";
    }
}
if (trim($_POST['pseudo']=='')){
    echo "<h2>Vous n'avez pas renseigné de pseudo !</h2>";
}
else {
    $pseudo = trim($_POST['pseudo']);
    if (preg_match($regpseudo, $pseudo)) {
        echo "<h2>Le pseudo : {$pseudo} est ok !</h2>";
    }
    else {
        echo "<h2>Votre pseudo contient des caractères interdits !</h2>";
    }
}

// https://www.it-swarm-fr.com/fr/regex/expression-reguliere-pour-le-prenom-et-le-nom/968019401/
// https://tutowebdesign.com/controle-formulaire-php.php
// https://www.it-swarm-fr.com/fr/php/regex-pour-le-mot-de-passe-php/941267945/
// https://www.c2script.com/scripts/formulaire-d-inscription-simple-en-php-s25.html
// https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/securiser-valider-formulaire/
// https://codes-sources.commentcamarche.net/source/26383-formulaire-d-inscription-avec-verification-de-l-e-mail-par-code-de-confirmation
// https://www.chiny.me/exercice-verification-des-champs-de-formulaire-en-php-7-9.php