<?php echo "<p>Bonjour "
.htmlspecialchars($_GET['nom'])
." "
.htmlspecialchars($_GET['prenom'])
.", vous avez "
.(int)$_GET['age']
." ans, comment allez-vous ?<br>
votre mail est : "
.htmlspecialchars($_GET['mail'])?>