<?php

	/*************************
	*  Page: inscription.php
	*  Page encodée en UTF-8
	**************************/

?><!DOCTYPE HTML>
<html>
	<head>
		<title>Script espace membre</title>
	</head>
	<body>
		<h1>S'inscrire</h1>
		<a href="./">Retour à l'accueil</a>
		<br>
		<?php
		//si le formulaire est envoyé ("envoyé" signifie que le bouton submit est cliqué)
		if(isset($_POST['valider'])){
			//vérifie si tous les champs sont bien  pris en compte:
			//on peut combiner isset() pour valider plusieurs champs à la fois
			if(!isset($_POST['pseudo'],$_POST['mdp'],$_POST['mail'])){
				echo "Un des champs n'est pas reconnu.";
			} else {
				//on vérifie le contenu de tous les champs, savoir si ils sont correctement remplis avec les types de valeurs qu'on souhaitent qu'ils aient
				if(!preg_match("#^[a-z0-9]{1,15}$#",$_POST['pseudo'])){
					//la preg_match définie: ^ et $ pour dire commence et termine par notre masque;
					//notre masque défini a-z pour toutes les lettres en minuscules et 0-9 pour tous les chiffres;
					//d'une longueur de 1 min et 15 max
					echo "Le pseudo est incorrect, doit contenir seulement des lettres minuscules et/ou des chiffres, d'une longueur minimum de 1 caractère et de 15 maximum.";
					//Il est préférable que le pseudo soit en lettres minuscules ceci afin d'être unique, par exemple si le choix peut être avec majuscule, deux membres pourrait avoir le même pseudo, par exemple Admin et admin et ce n'est pas ce que l'on veut.
				} else {
					//on vérifie le mot de passe:
					if(strlen($_POST['mdp'])<5 or strlen($_POST['mdp'])>15){
						echo "Le mot de passe doit être d'une longueur minimum de 5 caractères et de 15 maximum.";
					} else {
						//on vérifie que l'adresse est correcte:
						if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['mail'])){
							//cette preg_match est un petit peu complexe, je vous invite à regarder l'explication détaillée sur mon site c2script.com
							echo "L'adresse mail est incorrecte.";
							//normalement l'input type="email" vérifie que l'adresse mail soit correcte avant d'envoyer le formulaire mais il faut toujours être prudent et vérifier côté serveur (ici) avant de valider définitivement
						} else {
							if(strlen($_POST['mail'])<7 or strlen($_POST['mail'])>50){
								echo "Le mail doit être d'une longueur minimum de 7 caractères et de 50 maximum.";
							} else {
								//tout est précisés correctement, on inscrit le membre dans la base de données si le pseudo n'est pas déjà utilisé par un autre utilisateur
								//d'abord il faut créer une connexion à la base de données dans laquelle on souhaite l'insérer:
								$mysqli=mysqli_connect('localhost','root','','nom_de_la_base_de_donnees');//'serveur','nom d'utilisateur','pass','nom de la table'
								if(!$mysqli) {
									echo "Erreur connexion BDD";
									//Dans ce script, je pars du principe que les erreurs ne sont pas affichées sur le site, vous pouvez donc voir qu'elle erreur est survenue avec mysqli_error(), pour cela décommentez la ligne suivante:
									//echo "<br>Erreur retournée: ".mysqli_error($mysqli);
								} else {
									$Pseudo=htmlentities($_POST['pseudo'],ENT_QUOTES,"UTF-8");//htmlentities avec ENT_QUOTES permet de sécuriser la requête pour éviter les injections SQL, UTF-8 pour dire de convertir en ce format
									$Mdp=md5($_POST['mdp']);// la fonction md5() convertie une chaine de caractères en chaine de 32 caractères d'après un algorithme PHP, cf doc
									$Mail=htmlentities($_POST['mail'],ENT_QUOTES,"UTF-8");
									if(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM membres WHERE pseudo='$Pseudo'"))!=0){//si mysqli_num_rows retourne pas 0
										echo "Ce pseudo est déjà utilisé par un autre membre, veuillez en choisir un autre svp.";
									} else {
										//insertion du membre dans la base de données:
										if(mysqli_query($mysqli,"INSERT INTO membres SET pseudo='$Pseudo', mdp='$Mdp', mail='$Mail'")){
											echo "Inscrit avec succès! Vous pouvez vous connecter: <a href='connexion.php'>Cliquez ici</a>.";
											$TraitementFini=true;//pour cacher le formulaire
										} else {
											echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
											//echo "<br>Erreur retournée: ".mysqli_error($mysqli);
										}
									}
								}
							}
						}
					}
				}
			}
		}
		if(!isset($TraitementFini)){//quand le membre sera inscrit, on définira cette variable afin de cacher le formulaire
			?>
			<br>
			<p>Remplissez le formulaire ci-dessous pour vous inscrire:</p>
			<form method="post" action="inscription.php">
				<input type="text" name="pseudo" placeholder="Votre pseudo..." required><!-- required permet d'empêcher l'envoi du formulaire si le champ est vide -->
				<input type="password" name="mdp" placeholder="Votre mot de passe..." required>
				<input type="email" name="mail" placeholder="Votre mail..." required>
				<input type="submit" name="valider" value="Cliquez ici pour envoyer le formulaire">
			</form>
			<?php
		}
		?>
	</body>
</html>