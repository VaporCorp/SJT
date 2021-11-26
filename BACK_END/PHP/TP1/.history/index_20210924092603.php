<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Page N°1 du TP de PHP">
   <link rel="shortcut icon" href="" type="image/x-icon">
   <link rel="stylesheet" href="">
   <title>TP N°1</title>
</head>
<body>
    <?php 
        $monPrenom = "Louis";
        echo "<h1>PHP - TP n°1 de ". $monPrenom."</h1>";

        $maVariable = 1;
        /*if ($maVariable != 1) {
            echo "<p>Une erreur est survenue !</p>";
        }                                                   Condition classique
        else {
            echo "<p>Tout va bien.</p>";
        }*/
        echo $maVariable != 1 ? "<p>Une erreur est survenue</p>" : "<p>Tout va bien !</p>"; /* Conditions ternaires */
        
        /* Exercice sur l'heure */

        /* Indiquer au serveur la géolocalisation des utilisateurs */
        date_default_timezone_set("Europe/Paris");

        /* Récupérer l'heure actuelle et la stocker au sein d'une variable */
        $heure = date('H:i');

        /* Batterie de tests */
        if($heure >= "06:00" && $heure < "14:00"){
            echo "<p>Bonjour il est ".$heure."</p>";
        }
        else if($heure >= "14:01" && $heure < "19:00"){
            echo "<p>Bonne après midi il est ".$heure."</p>"; 
        }

        else if($heure >= "19:01" && $heure < "00:00"){
            "Bonsoir";
        }

        else{
            "Oh! FAIS DODO IL EST TARD LA!!";
        }

        /* Afficher la table de multiplication de 8 */
        
        $maTable = 8;
        echo "<br>"
        echo "La table des ". $maTable. "vaut : </p>"
        for ($i=0; $i<=10; $i++) {
            echo $maTable*$i;
            echo "<br>";
        }
    ?>
</body>
</html>