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
        echo "<br>";

        /* Afficher la table de multiplication de 8 */
        echo "<h2>Table de multiplication de 8 boucle FOR PHP</h2>";
        $maTable = 8;
        echo "La table des ". $maTable. " vaut : </p>";
        for ($i=0; $i<=10; $i++) {
            echo "<p>$maTable*$i = ".$maTable*$i."</p>";
        }
        ?>

        <h2>Premier tableau en boucle FOR PHP</h2>   

        <table border="1">
        <?php
        for ($j=1; $j<=10; $j++) {
            echo "<tr>";
            
            for ($i=1; $i<=10; $i++) {
                echo "<td>".$j*$i."</td>";
            }

            echo "</tr>";
        }
        ?>
        </table>

        <br>

        <h2>Deuxième tableau en boucle WHILE PHP</h2>

        <table border="1">
        <?php
            $x=1;
            while ($x <= 10) {
                echo "<tr>";
                $y=1;
                while ($y <= 10) {
                    echo "<td>".$x*$y."</td>";
                    $y++;
                }
                $x++;
    
                echo "</tr>";
            }
        ?>
        </table>
        
        <?php
            $tableau = [
                "toto",
                "titi",
                "tata",
                "toutou",
                "tete",
                "tointoin",
                "tetard",
            ];
            foreach ($tableau as $v) {
                echo $v;
                echo "<br>";
            }    
        ?>

        <br>

        <?php
            $tableau = [
                ["toto", 15],
                ["titi", 12],
                ["tata", 4],
                ["toutou", 5],
                ["tete", 18],
                ["tointoin", 10],
                ["tetard", 15]
            ];
            foreach ($tableau as $k => $v) {
                echo "<p>".$v[0]." a eu la note de ".$v[1]."</p>";
            }    
        ?>

        <br>

        <?php   
            $pokemonList = [
                ["Elektrik", ["Pikachu","Dynavolt","Elektek","Electhor"]],
                ["Feu",["Salamèche","Goupix","Magby","Pyrobut"]],
                ["Eau",["Tortank","Barpau","Otaquin","Wailmer"]],
                ["Plante",["Bulbizarre","Roserade","Croquine","Chapignon"]],
            ];
            echo "<p>Les pokémons de type ".$pokemonList[0][0]." sont :";
            foreach ($pokemonList[0][1] as $pokemon) {
                echo "<p>".$pokemon."</p>";
            }
            echo "<br>";
            echo "<p>Afficher le pokémon Roserade :";
            foreach ($pokemonList[3][1] as $pokemon) {
                if ($pokemon == "Roserade") {
                    echo "<p>".$pokemon."</p>";
                }
            }
        ?>

        <?php
            $notes = [4,10,18,20,5,16,9,4,7,17,15,13,7];
            $somme = array_sum($notes);
            $nombreDeNotes = count($notes);
            $moyenne= round ($moyenne=($somme/$nombreDeNotes), 2);
            echo "<p>La moyenne est : ".$moyenne."</p>";
        ?>

        <br>

        <?php
            echo "Determiner des palindromes :";
            $mots = ["Kayak", "Bob", "Test", "Palindrome", "Radar", "Ete", "Laval", "Algorithmie", "La mariee ira mal", " A l'etape, epate-la", "A reveler mon nom, mon nom relevera", "Et la marine va venir a Malte"];
            foreach ($mots as $v) {
                $x=$v;
                $v=str_replace (
                    $search =[" ","'",",","!","?","-"],
                    $replace = "",
                    $subject = $v,  
                );
                $v=strtolower($v);
                if ($motsInverse=(strrev($v))==$v) {
                    $v=ucfirst($v);
                    echo "<p>".$x." est un palindrome</p>";
                }
                else {
                    "<p>".$v." n'est pas un palindrome</p>";   
                }
            }
        ?>

        <br>

        <?php
            /* Algorithme filtre à insultes sans longueur de mot */
            /* function censure($txt){
                return str_ireplace(array_map('trim', file('censure.txt')), '[Censuré]', $txt);
            }
 
            $string = 'Catin de tes morts sale batard';
 
            echo censure($string); */

            function filtreInsultes($texte){

                $tableauDeMots = preg_split('/[\s,\.,;,!,?,:,(,),%]+/', $texte);
                $tableauDeCaracteresSpeciaux = preg_split('/[A-Za-z0-9]+/', $texte);

                $tableauInsultes = ["merde","con","catin","salope","batard","bouffon","couillon","salaud","pute","connasse","conne","bouffonne"];
                
                $phraseFiltree = "";

                foreach ($tableauDeMots as $k => $mot) {
                    if (in_array($mot, $tableauInsultes)){
                        $tableauDeMots[$k] = str_repeat('*', strlen($mot));
                    }
                    $phraseFiltree = $phraseFiltree.$tableauDeCaracteresSpeciaux[$k].$tableauDeMots[$k];
                }

                return $phraseFiltree;
            }

            $phrase = "Ta mere la merde, sale catin, salope de pute, connasse.";
            echo "<p>".filtreInsultes($phrase)."</p>";
        ?>
</body>
</html>