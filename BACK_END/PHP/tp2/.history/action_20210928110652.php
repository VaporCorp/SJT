<?php echo "<p>Bonjour "
.htmlspecialchars($_POST['nom'])
." "
.htmlspecialchars($_POST['prenom'])
.", vous avez "
.(int)$_POST['age']
." ans, comment allez-vous ?<br>
votre mail est : "
.htmlspecialchars($_POST['mail'])?>