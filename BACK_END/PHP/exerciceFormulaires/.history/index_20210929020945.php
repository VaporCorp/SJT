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

<form method="get" action="script.php">
    <label for="nom">Name</label>
    <input name="nom" type="text" value="<?php echo !empty($nom)? $nom : '';?>">
                        <?php if (!empty($nomError)): ?><!--on vérifie sil y a une erreur-->
                    <p> <span class="red"><?php echo $nomError;?></span></p><!--dans ce cas on l'affiche-->
                <?php endif; ?>
    <p><input type="submit" name="submit" value="valider"></p>
</form>

</body>
</html>