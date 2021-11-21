<?php

/*

Utilisation en 5 étapes:

*/


//ÉTAPE 1: Important, ouvrir une session avec session_start();
session_start();

//ÉTAPE 2: ensuite, inclure le style CSS: 
?>
<style>
*{font-size:20px}
.C2captcha{padding:10px;display:inline-block;border:3px double red;text-align:center}
.C2captcha:hover{border-style:solid}
.C2captcha_inputs{display:inline-block;height:40px;margin-top:10px}
.C2captcha_inputs img{margin:0;height:100%;max-height:calc(100% - 2px);border:1px solid gray!important}
.C2captcha_inputs input{width:60px;display:inline;margin:0;vertical-align:top;height:calc(100% - 2px);padding:0;border:0px;border-bottom:2px dashed gray}
</style>
<?php

//ÉTAPE 3: inclure la fonction PHP C2captcha()

/*Nom: C2captcha

Description:

Captcha calcul, l'utilisateur doit trouver la case manquante du calcul (résoudre un calcul mathématique), ex: "10 - [case manquante] = 2" (réponse 8)
Les calculs peuvent être écrits en lettres et/ou en chiffres et les réponses peuvent être demandées en lettre ou en chiffre, ex: "[ ] - treize = -3" (réponse "dix" ou "10" suivant la demande du script)

Vous pouvez mettre des polices d'écritues (fonts) differentes dans le dossier fonts/ (prenez soin de choisir des polices avec une taille à peu près pareil sinon les lettres risque d'être plus grosse ou plus petites suivant la police utilisée et le captcha illisible)

*/
function C2captcha($cheminImg=''){
	
	//PARAMÉTREZ CI-DESSOUS:
	$difficulte=2;//(1, 2 ou 3) 3 prend toutes les valeurs du tableau $chiffres, donc des calculs parfois compliqués, 1 coupe le tableau jusqu'à 5 et 2 jusqu'à 10
	$signes=3;//1 = + seulement, 2 = + -, 3 = + - /, 4 = + - / *
	$resultatEntier=1;//0 = résultats à virgule possibles, 1 résultat de type entier seulement
	$enLettres=1;//0 = les calculs sont écrits en chiffres seulement, 1 = les calculs peuvent être écrits en lettres ou en chiffres
	
	//en cas de demande de vérification du champ du formulaire:
	if(is_int($cheminImg)){
		if(!preg_match("#^([a-z]+-?[a-z]+|-?[0-9]+)$#i",$_POST['C2code'])) return false;
		if($_POST['C2code']!=$_SESSION['C2captcha']['decouvrir']) return false;
		return true;
	
	//sinon on affiche le captcha
	} else {
		//fonction:
		$chiffres=[
			1=>[1,'un'],//aléatoirement une version chiffre ou une version lettre sera choisie
			2=>[2,'deux'],
			3=>[3,'trois'],
			4=>[4,'quatre'],
			5=>[5,'cinq'],
			6=>[6,'six'],
			7=>[7,'sept'],
			8=>[8,'huit'],
			9=>[9,'neuf'],
			10=>[10,'dix'],
			11=>[11,'onze'],
			12=>[12,'douze'],
			13=>[13,'treize'],
			14=>[14,'quatorze'],
			15=>[15,'quinze'],
			16=>[16,'seize'],
			17=>[17,'dix-sept'],
			18=>[18,'dix-huit'],
			19=>[19,'dix-neuf'],
			20=>[20,'vingt'],
		];
		if($difficulte==1) $chiffres=array_slice($chiffres,0,5,true);
		if($difficulte==1) $chiffres=array_slice($chiffres,0,10,true);
		$operateurs=[
			1=>['+','plus'],//aléatoirement une version symbole ou une version lettre sera choisie
			2=>['-','moins'],
			3=>['/','diviser'],
			4=>['*','multiplier'],
		];
		$operateurs=array_slice($operateurs,0,$signes,true);

		//on va vérifier si le résultat est un entier pour pas compliquer la tâche à l'utilisateur avec des résultats comme 1.25, 0.875,...
		//si c'est pas un entier on refait un calcul (avec do while) jusqu'à arriver à un entier pour un résultat plus simple à résoudre
		do{
			$chiffre1=array_rand($chiffres,1);
			$operateur=array_rand($operateurs,1);
			$chiffre2=array_rand($chiffres,1);
			if($operateur==1){
				$resultat=$chiffre1+$chiffre2;
			}elseif($operateur==2){
				$resultat=$chiffre1-$chiffre2;
			}elseif($operateur==3){
				$resultat=$chiffre1/$chiffre2;
			}elseif($operateur==4){
				$resultat=$chiffre1*$chiffre2;
			}
			$chiffre1=$chiffres[$chiffre1][rand(0,$enLettres)];
			$operateur=$operateurs[$operateur][rand(0,$enLettres)];
			$chiffre2=$chiffres[$chiffre2][rand(0,$enLettres)];
		} while(!is_int($resultat) AND $resultatEntier==1);
		
		$valeurs=['chiffre1','chiffre2','resultat'];
		$valeurCachee=array_rand($valeurs,1);
		$valeurCachee=$valeurs[$valeurCachee];
		$_SESSION['C2captcha']=[];
		//on retourne nos valeurs
		if($valeurCachee=='chiffre1'){
			$calcul1=$operateur." ".$chiffre2." = ".$resultat;
			//on envoi le calcul dans la page image1.php en session pour le retrouver, avec session_start()
			$_SESSION['C2captcha']['calcul1']=$calcul1;
			$inputs='<input name="C2code" type="text" autocomplete="off" required><img src="'.$cheminImg.'/image1.php?'.rand(0,100000).'" alt="image1 code incorrecte">';
			$decouvrir=$chiffre1;
		} elseif($valeurCachee=='chiffre2'){
			$calcul1=$chiffre1." ".$operateur." ";
			$_SESSION['C2captcha']['calcul1']=$calcul1;
			$calcul2=" = ".$resultat;
			$_SESSION['C2captcha']['calcul2']=$calcul2;
			$inputs='<img src="'.$cheminImg.'/image1.php?'.rand(0,100000).'" alt="image1 code incorrecte"><input name="C2code" type="text" autocomplete="off" required><img src="'.$cheminImg.'/image2.php?'.rand(0,100000).'" alt="image2 code incorrecte">';
			$decouvrir=$chiffre2;
		} else {
			$calcul1=$chiffre1." ".$operateur." ".$chiffre2." = ";
			$_SESSION['C2captcha']['calcul1']=$calcul1;
			$inputs='<img src="'.$cheminImg.'/image1.php?'.rand(0,100000).'" alt="image1 code incorrecte"><input name="C2code" type="text" autocomplete="off" required>';
			$decouvrir=$resultat;
		}
		//on retourne le captcha
		echo '<div class="C2captcha">';
			//au cas où le chemin indiqué dans captcha(ici) est pas joignable, on affiche une erreur:
			if(!file_exists(($cheminImg==''?'.':$cheminImg).'/image1.php')){//($cheminImg==''?'.':$cheminImg) = si chemin indiqué est vide, on met un . pour chercher depuis la page courante: ./
				echo "Le chemin indiqué dans la fonction C2captcha est injoignable.";
			} else {
				//on sauvegarde le résultat à découvrir pour l'analyser lors du clic formulaire
				$_SESSION['C2captcha']['decouvrir']=$decouvrir;
				echo '<b>Calcul de sécurité</b><br/>Ecrivez la case manquante en <u>'.(is_numeric($decouvrir)?'chiffre':'lettre').'</u>:<br/><div class="C2captcha_inputs">'.$inputs.'</div>';
			}
		echo '</div><br/>';
	}
}

//ÉTAPE 4: validation du captcha entré par l'utilisateur:

if(isset($_POST['C2code'])){
	if(!C2captcha(1)){
		echo "<p>Le code est incorrect</p>";
	} else {
		echo "<p>Le code est correct</p>";
	}
}


//utilisation en indiquant un chemin vers le images codes:
//$captcha=captcha('dossier_des_images_code');//cherchera les image1 et image2 dans le dossier indiqué (ici dossier_des_images_code, sans slash de fin)


//ÉTAPE 5: mise en place du captcha dans le formulaire: C2captcha('[chemin vers image1.php et image2.php]')

?><br/>
<form method="post">
<?=C2captcha('images/captchacalcul')?>
<input type="submit">
</form>
<?php