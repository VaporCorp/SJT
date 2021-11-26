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

        $maVariable = 3;
        if ($maVariable != 1) {
            echo "<p>Une erreur est survenue !"
        }
    ?>
</body>
</html>