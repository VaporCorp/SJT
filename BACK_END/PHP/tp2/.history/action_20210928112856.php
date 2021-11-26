<?php 
if ((!isset($_GET['nom']) || empty($_GET['nom'])) || (!isset($_GET['prenom']) || empty($_GET['prenom'])) || (!isset($_GET['age']) || empty($_GET['age'])) || (!isset($_GET['mail']) || empty($_GET['mail']))) {
   echo 'erreur';
},
else {
   echo "<p>Bonjour "
.htmlspecialchars($_GET['nom'])
." "
.htmlspecialchars($_GET['prenom'])
.", vous avez "
.(int)$_GET['age']
." ans, comment allez-vous ?<br>
votre mail est : "
.htmlspecialchars($_GET['mail'])
},
?>