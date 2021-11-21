<?php if(!defined("C2SCRIPT")) exit;//empêche l'accès direct à cette page, autorisé seulement en include en définissant "C2SCRIPT", juste avant

function htmlent($texte){
	// htmlentities(chaine de caractères,ENT_QUOTES,"UTF-8") permet de convertir tous les caractères en entité HTML, surtout pour éviter les injections SQL car elle convertir les guillemets simple et double: ' devient &#39; il me semble et " devient &quot;
	return htmlentities($texte,ENT_QUOTES,"UTF-8");
}
function raf($NomDuBouton,$TexteParDefaut=''){
	//fonction pour réafficher les champs du formulaire après l'avoir envoyé pour ne pas avoir à les reremplir
    //plus d'infos sur https://www.c2script.com/scripts/reafficher-les-champs-du-formulaire-en-php-s38.html
	return isset($_POST[$NomDuBouton]) ? htmlentities($_POST[$NomDuBouton],ENT_QUOTES,"UTF-8") : $TexteParDefaut;
}
function afficherFormulaireCommentaire($Page,$IdArticle=0){
	global $mysqli;//permet à la variable $mysqli d'être utilisée dans la fonction
	$AfficherForm=1;//quand tout sera bien posté, on cachera le formulaire en mettant cette valeur à 0
	$msg_erreur='';//pour indiquer les erreurs qui empéche la soumission du formulaire, on prendre aussi cette valeur comme répère pour savoir si il y a une erreur (vide = OK, pas vide = il y a des erreurs, on affiche le message)
	if(isset($_POST['envoyer'])){//si le bouton envoyer (name="envoyer") est cliqué, on traite le fomulaire
		if(empty($_POST['pseudo']) OR empty($_POST['mail']) OR empty($_POST['commentaire'])){
			$msg_erreur.="Un des champs est vide";
		} else {
			
			//les champs sont pas vides, on traite les informations saisies en commençant par l'adresse email
			if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['mail'])){
				$msg_erreur.="Le mail est incorrect<br/>";//on met un saut de ligne (br) pour afficher les messages les un sur les autres (si il y en a plusieurs) et pas les un derrière les autres
			}
			
			//on pourrait imaginer une vérififcation du pseudo, par exemple, on pourrait accepter seulement des lettres et des chiffres (pas d'espaces et caractères spéciaux)
			/*if(!preg_match("#^[a-z0-9]+$#i",$_POST['pseudo'])){//option "i" pour dire qu'on autorise a et A (i pour Insensible à la case)
				$msg_erreur.="Le pseudo est incorrect (lettres et chiffres seulement)<br/>";
			}
			
			//on peut également imaginer une vérif pour la longueur maximale du message:
			if(strlen($_POST['commentaire'])>1000){
				$msg_erreur.="Le commentaire est trop long, 1000 caractères maximum (vous avez tapé ".strlen($_POST['commentaire'])." caractères<br/>";
			}
			
			//ou même interdire des mots dans le message
			if(stristr($_POST['commentaire'],"connard")){//désolé c'est pour l'exemple :) ici j'utilise stristr qui est moins gourmand que preg_match, stristr recherche le mot en version Insensible (str"i"str), il trouvera connard comme Connard
				$msg_erreur.="Le commentaire contient le mot interdit: connard<br/>";
			}
			
			//interdire de poster une URL
			if(preg_match("#https?://[a-z0-9]+#i",$_POST['commentaire'])){ //on recherche avec ou sans "s" dans http car on demande avec "?" juste après le s, veut dire "peut y être ou pas" (concerne seulement la lettre (ou la classe) juste avant le point d'interrogation. Avec [a-z0-9]+ on demande à ce que ça ne soit pas seulement http(s):// et rien d'autre desuite après mais qu'il y ait bien des lettres ou des chiffres après http(s)://, comme http(s)://abcd123... qui constituerait une URL
				$msg_erreur.="Le commentaire contient une URL, c'est interdit<br/>";
			}
			
			//ajouter un captcha (que vous pouvez trouver sur mon site: https://www.c2script.com/scripts/captcha-simple-en-php-s14.html)
			if(empty($_POST['captcha'])){
				$msg_erreur.="Le captcha est vide";
			} else {
				if($_POST['captcha']!=$_SESSION['code']){
					$msg_erreur.="Le captcha est incorrect";
				}
			}*/
		
		}
		if($msg_erreur!=''){
			//si il y a des erreurs, on les affichent
			echo '<h1 style="color:red">Il y a des erreurs:</h1>';
			echo $msg_erreur;
		} else {
			//pas d'erreurs, on sécurise les champs pour les insérer dans la base de données
			$Pseudo = htmlent($_POST['pseudo']);//voir la fonction htmlent() dans le fichier fonctions/fonctions.php pour plus de détails
			$Mail = htmlent($_POST['mail']);
			$Commentaire =  htmlent($_POST['commentaire']);
			$Commentaire = nl2br($Commentaire);//nl2br nous permet d'ajouter des <br/> quand il y a un saut de ligne, nous permettra de garder les saut quand on 
			
			//on l'insère dans la bdd (vous remarquerez que je n'ai pas entouré les variable par ".$MaVariable.", ça fonctionne seulement si vous mettez des guillemets double en debut et en fin ("INSERT INTO....") ne fonctionnera pas avec des guillemets simples, exemple: ('INSERT INTO....')
			if(mysqli_query($mysqli,"INSERT INTO commentaires SET 
				pseudo = '$Pseudo',
				mail = '$Mail',
				commentaire = '$Commentaire',
				".($IdArticle!=0?"id_article = $IdArticle,":"") /* ici id_article à remplacer par le nom de votre colonne */ ."
				quand = ".time())){//time() donne le timestamp actuel, on pourra le manipuler avec la fonction date(), exemple: date("H:i d-m-Y",quand)
				echo "<p>Commentaire posté avec succès!</p>";
				//bien sûr, on pourrait imaginer que le commentaire ne soit pas tout de suite validé, en mettant une colonne supplémentaire dans la table des commentaires (ex: valide=0) et l'afficher que quand un admin le valide et mis à 1
				$AfficherForm=0;//on cache le formulaire
			} else {
				echo "<p>Une erreur s'est produite, merci de réessayer ou contactez le support si le problème persiste.</p>".mysqli_error($mysqli);
			}
		}
	}
	if($AfficherForm==1){
		?>
		<form action="<?php echo $Page; ?>" method="post">
			Pseudo
			<br/>
			<input type="text" name="pseudo" value="<?php echo raf("pseudo"); ?>" maxlength="20" required="required">
			<!--
			
			required="required"
			
			- pour obliger l'utilisateur à renseigner ce champ avant l'envoi, même si on indique ce paramètre, toujours faire la vérification du champs avec PHP (if empty) parce que l'utilisateur peut modifier le code source HTML (pas PHP) d'une page
			
			
			maxlength="20"
			
			- pour interdire de mettre plus de 20 caractères, si il en rentre plus, notre table SQL coupera à la longueur de 20 caractères (ne pas se fier à un paramètre HTML pour l'insert dans une table car on peut facilement modifier ces conditions (required, maxlength,...) dans le code source) ici ça indiquera à l'utilisateur (si il tente de mettre plus de 20 caractères) qu'il ne peut pas, ça éviera de lui couper pseudo si il est trop long
			
			-->
			<br/>
			Email
			<br/>
			<input type="text" name="mail" value="<?php echo raf("mail"); ?>" maxlength="50" required="required">
			<br/>
			Message
			<br/>
			<textarea name="commentaire" rows="10" cols="50" required="required"><?php echo raf("commentaire"); ?></textarea>
			<!--
			rows définit la hauteur, indique le nombre de ligne qui sera visible
			cols définit la largeur, indique le nombre de lettre qui sera visible de gauche à droite
			ici on à une hauteur de 10 ligne et d'une largeur de 50 lettres
			-->
			<br/>
			<input type="submit" name="envoyer" value="Poster!">
		</form>
		<?php
	}
}
function afficherCommentaires($IdArticle=0){
	global $mysqli;//permet à la variable $mysqli d'être utilisée dans la fonction
	//on va chercher les commentaires qui correspondent à l'id de l'article (si mentionné)
	$req = mysqli_query($mysqli,"SELECT * FROM commentaires WHERE id_article ".($IdArticle!=0?"=$IdArticle": "IS NULL")." ORDER BY id ASC");
	if(mysqli_num_rows($req)==0) {
		echo "<p>Aucun commentaire pour le moment.</p>";
	} else {
		while($infos = mysqli_fetch_assoc($req)) {
		?>
		<div style="margin-bottom:30px;border-bottom:1px solid black">
			<p style="text-decoration:underline"><b><?php echo $infos['pseudo']; ?> le <?php echo date("d-m-Y",$infos['quand'])." à ".date("H:i",$infos['quand']); ?></b></p>
			<p><?php echo $infos['commentaire']; ?></p>
		</div>
		<?php
		}
	}
}