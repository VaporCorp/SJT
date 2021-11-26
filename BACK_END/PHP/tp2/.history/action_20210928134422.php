<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <link rel="shortcut icon" href="" type="image/x-icon">
   <link rel="stylesheet" href="">
   <title>Document</title>
</head>
<body>
   
<?php 
if ((!isset($_GET['nom']) || empty($_GET['nom'])) || (!isset($_GET['prenom']) || empty($_GET['prenom'])) || (!isset($_GET['age']) || empty($_GET['age'])) || (!isset($_GET['mail']) || empty($_GET['mail']))) {
   echo 'Erreur, il manque une donnée dans le formulaire';
}
else {
   echo "<p>Bonjour ".htmlspecialchars($_GET['nom'])." ".htmlspecialchars($_GET['prenom']).", vous avez ".(int)$_GET['age']." ans, comment allez-vous ?<br>votre mail est : ".htmlspecialchars($_GET['mail']);
}
?>
</body>
</html>