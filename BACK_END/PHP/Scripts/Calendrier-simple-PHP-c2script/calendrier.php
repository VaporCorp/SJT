<?php
//page: calendrier.php
session_start();//pour maintenir la session active
//connexion à la base de données:
$BDD = array();
$BDD['host'] = "localhost";
$BDD['user'] = "root";
$BDD['pass'] = "";
$BDD['db'] = "calendrier";
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
if(!$mysqli) {
	echo "Connexion non &eacute;tablie.";
	exit;
}

$NomDeSessionAdmin="nomdesession";//mettre ici le nom de $_SESSION de votre site quand l'administrateur est connecté
/*
* Module de connexion/déconnexion simplifié.
* Vous pouvez adapter une variable de session de votre site afin de supprimer ce module
*/
	
	$MotDePasse="votremotdepasse";//mettre ici un mot de passe
	//pour vous connecter, entrez votresite.tld/calendrier.php?connexion=votremotdepasse
	if(isset($_GET['connexion'])) {
		if($_GET['connexion']==$MotDePasse){
			$_SESSION[$NomDeSession]=1;
			echo "Connecté avec succès!";
		}
	}
	if(isset($_GET['deconnexion'])) {
		unset($_SESSION[$NomDeSessionAdmin]);
		echo "Déconnecté avec succès!";
	}
	if(isset($_SESSION[$NomDeSessionAdmin])) {
		echo '<p><a style="letter-spacing:0.5px;" href="?deconnexion">Déconnexion</a></p>';
	}
/*
* Fin du module de connexion/déconnexion
*/

$jours = array(1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",0=>"Di");
if(isset($_GET['annee']) AND preg_match("#^[0-9]{4}$#",$_GET['annee'])){//si on souhaite afficher une autre année, on l'affiche si elle est correcte
	$annee=$_GET['annee'];
} else {
	$annee=date("Y");//si non, on affiche l'année actuelle
}
$NbrDeJour=[];
for($mois=1;$mois<=12;$mois++) {
	$NbrDeJour[$mois]=date("t",mktime(1,1,1,$mois,2,$annee));
	$PremierJourDuMois[$mois]=date("w",mktime(5,1,1,$mois,1,$annee));
}
?>
<table id="recap">
	<tr>
		<td style="background:#FF8888;width:15px;height:15px;"></td><td>Réservé</td>
	</tr>
	<tr>
		<td style="background:#88FF88;width:15px;height:15px;"></td><td>Disponible</td>
	</tr>
</table>
<?php
$_SESSION[$NomDeSessionAdmin]=1;
if(isset($_SESSION[$NomDeSessionAdmin])){
	if(
	isset($_GET['jour']) AND preg_match("#^[0-9]{1,2}$#",$_GET['jour']) AND
	isset($_GET['mois']) AND preg_match("#^[0-9]{1,2}$#",$_GET['mois']) AND
	isset($_GET['choix']) AND preg_match("#^(0|1)$#",$_GET['choix'])) {
		if($_GET['choix']==1){
			if(mysqli_query($mysqli,"INSERT INTO calendrier SET date='".$annee."-".$_GET['mois']."-".$_GET['jour']."'")) {
				echo "Jour mise en \"réservé\" avec succès !";
			} else {
				echo "Une erreur s'est produite:<br />".mysqli_error($mysqli);
			}
		} else {
			if(mysqli_query($mysqli,"DELETE FROM calendrier WHERE date='".$annee."-".$_GET['mois']."-".$_GET['jour']."'")) {
				echo "Journée mise en \"disponible\" avec succès !";
			} else {
				echo "Une erreur s'est produite:<br />".mysqli_error($mysqli);
			}
		}
	}
}
$StyleTh="text-shadow: 1px 1px 1px #000;color:white;width:75px;border-right:1px solid black;border-bottom:1px solid black;";
?>
<table style="border:1px solid black;border-collapse:collapse;box-shadow: 10px 10px 5px #888888;">
	<caption style="font-size:18px;"><a href="?annee=<?php echo $annee-1; ?>" style="font-size:50%;vertical-align:middle;text-decoration:none;"><?php echo $annee-1; ?></a> <?php echo $annee; ?> <a href="?annee=<?php echo $annee+1; ?>" style="font-size:50%;vertical-align:middle;text-decoration:none;"><?php echo $annee+1; ?></a></caption>
	<tr style="border-right:1px solid black;">
					<th style="<?php echo $StyleTh; ?>background:#FF3333">Janvier</th>
					<th style="<?php echo $StyleTh; ?>background:#FF9933">Février</th>
					<th style="<?php echo $StyleTh; ?>background:#FFF833">Mars</th>
					<th style="<?php echo $StyleTh; ?>background:#A7FF33">Avril</th>
					<th style="<?php echo $StyleTh; ?>background:#3EFF30">Mai</th>
					<th style="<?php echo $StyleTh; ?>background:#30FF83">Juin</th>
					<th style="<?php echo $StyleTh; ?>background:#33FFEB">Juillet</th>
					<th style="<?php echo $StyleTh; ?>background:#33A7FF">Août</th>
					<th style="<?php echo $StyleTh; ?>background:#3341FF">Septembre</th>
					<th style="<?php echo $StyleTh; ?>background:#8636FF">Octobre</th>
					<th style="<?php echo $StyleTh; ?>background:#F133FF">Novembre</th>
					<th style="<?php echo $StyleTh; ?>background:#FF33A7">Décembre</th>
	</tr>
	<tr>
		<?php
		for($mois=1;$mois<=12;$mois++) {
			for($jour=1;$jour<=$NbrDeJour[$mois];$jour++){
				if($jour==1){
					echo '<td style="vertical-align:top;border-right:1px solid black;">
							<center><table style="width:100%;border-collapse:collapse;">';
							$Jr=$PremierJourDuMois[$mois];
				}
			$JourReserve=0;
			$req = mysqli_query($mysqli,"SELECT * FROM calendrier WHERE date='".$annee."-".$mois."-".$jour."'");
			if(mysqli_num_rows($req)>0)$JourReserve=1;
			?>
			<tr>
				<td style="<?php echo $JourReserve==1?"background:#FF8888;":"background:#88FF88;"; ?>border-bottom:1px solid #eee;"><?php echo $jours[$Jr]; ?></td>
				<td style="<?php echo $JourReserve==1?"background:#FF8888;":"background:#88FF88;"; ?>border-bottom:1px solid #eee;width:20%;"><?php echo $jour; ?></td>
				<?php 
				if($Jr>5){
					$Jr=0;
				} else {
					$Jr++;
				}
				if(isset($_SESSION[$NomDeSessionAdmin])) { ?>
				<td style="<?php echo $JourReserve==1?"background:#FF8888;":"background:#88FF88;"; ?>border-bottom:1px solid #eee;"><a href="?jour=<?php echo $jour; ?>&amp;mois=<?php echo $mois; ?>&amp;annee=<?php echo $annee; ?>&amp;choix=<?php echo $JourReserve==1?0:1; ?>#recap"><img src="images/<?php echo $JourReserve; ?>.png" alt="Action" style="width:13px;" title="<?php echo $JourReserve==1?"Mettre ce jour en Disponible":"Mettre ce jour en Réservé"; ?>" /></a></td>
				<?php } ?>
			</tr>
			<?php
				if($jour==$NbrDeJour[$mois]){
					echo '</table></center>
						</td>';
				}
			}
		}
		?>
	</tr>
	<tr>
		<td colspan="12" style="display:none;text-align:right;font-size:10px">Calendrier par <a href="//www.c2script.com">C2Script.com</a></td>
	</tr>
</table>