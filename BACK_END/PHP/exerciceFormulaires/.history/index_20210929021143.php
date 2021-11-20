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

<form method="POST" action="script.php">
    <label for="name">Name</label>
    <input name="name" type="text" value="<?php echo !empty($name)? $name : '';?>">
                        <?php if (!empty($nameError)): ?><!--on vérifie sil y a une erreur-->
                    <p> <span class="red"><?php echo $nameError;?></span></p><!--dans ce cas on l'affiche-->
                <?php endif; ?>
    <p><input type="submit" name="submit" value="valider"></p>
</form>

</body>
</html>