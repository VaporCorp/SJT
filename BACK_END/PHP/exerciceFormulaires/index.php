<?php
$animaux=['Chien','Chat','Cheval','Hamster','Lezard','Poisson',];
$especes=[
    'Mammifère' => ['Chien','Chat','Cheval'],
    'Rongeur' => ['Hamster'],
    'Reptile' => ['Lezard'],];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <link rel="shortcut icon" href="" type="image/x-icon">
   <link rel="stylesheet" href="">
   <title>Exercice formulaire php</title>
</head>

<body>

<!--<form method="get" action="formulaires/script.php" >                     -->
<!--   <input type="text" name="nom" placeholder="Ex: Deschamps">            -->
<!--   <input type="text" name="prenom" placeholder="Ex : Didier">           -->
<!--   <input type="text" name="mail" placeholder="Ex : d.dschmps@gmail.com">-->
<!--   <input type="submit" value="OK">                                      -->
<!--</form>                                                                  -->

<form method="post" action="formulaires/trait.php">
   <input type="text" placeholder="votre nom" name="nom"> <!-- NE PAS OUBLIER LE NAME POUR ENVOYER LES INFORMATIONS -->
   <input type="password" name="pw">
   <input type="submit">
    <select>
        <?php
        foreach ($animaux as $animal) {?>
            <option><?= $animal ?></option>
        <?php }?>
    </select>

    <select>
        <?php
        foreach($especes as $key => $value){?> <!-- Code pour faire une liste de sélection dans un formulaire -->
            <optgroup label="<?= $key?>">
                <?php
                foreach($value as $key => $value){?>
                    <option value="<?= $value?>"><?= $value ?></option>
                <?php }
                }?>
            </optgroup>
    </select>

</form>
<?php
$filepath = 'readme.txt';
// $file = fopen($filepath,'r', 1); COMMENT LIRE UN FICHIER EN PHP : TECHNIQUE COMPLIQUEE
// $readme = fread($file, filesize($filepath));
// echo $readme;
// echo file_get_contents($filepath); //Fonction de lecture de fichier plus intuitive

//$filedata = file_get_contents($filepath);
//$file = fopen($filepath,'w'); FONCTION D'ECRITURE
//$readme = fwrite($file,  $filedata);
//$readme = fwrite($file,  'Test');
//echo $filedata;

// phpinfo(); 1ERE ETAPE, VERIFIER QUE L'UPLOAD EST AUTORISE
?>
<form method="POST" action="upload/uploadimage.php" enctype="multipart/form-data">
    <input type="file" name="uploadfichier">
    <input type="submit" name="submit">
</form>
</body>
</html>