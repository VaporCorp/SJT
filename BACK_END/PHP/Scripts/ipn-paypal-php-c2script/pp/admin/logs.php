<?php
	/*
	*  Affiche les logs IPN
	*  Il est préférable de faire une vérif de qui peut accèder à ce fichier (session PHP ou via htaccess)
	*
	*/

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logs IPN</title>
</head>
<body>
<h1>Logs IPN</h1>
<ul>
	<li><a href="?log=IPNPayPal.txt">Logs: IPNPayPal.txt</a> <i>(VALID/INVALID toutes infos)</i></li>
	<li><a href="?log=newException.txt">Logs: newException.txt</a> <i>(Erreurs survenues sur la page IPNPaypal.class.php)</i></li>
	<li><a href="?log=url-de-notification.txt">Logs: url-de-notification.txt</a> <i>(Erreurs seulement)</i></li>
</ul>
<?php
$page="logs.php";
if(isset($_GET['log'])){
	if(in_array($_GET['log'],array("IPNPayPal.txt","newException.txt","url-de-notification.txt"))){
		if(isset($_GET['del'])){
			file_put_contents("../logs/".$_GET['log'],"");
			echo "<span style='color:green'>Le contenu du log à été supprimé!</span>";
		}
		$file=file_get_contents("../logs/".$_GET['log']);
		$ex=explode("@@",$file);
		echo '<p><a href="?log='.$_GET['log'].'&del">Supprimer le contenu du log (Action irréversible)</a></p>';
		if($file=="")echo "Log vide";
	}
	
	if($_GET['log']=="IPNPayPal.txt"){
		echo '<table style="word-wrap: break-word;width:100%">';
		foreach($ex as $ligne){
			$ex2=explode(":",$ligne);
			if($ex2[0]!="") echo '<tr><td>'.($ex2[0]=="VALID"?'<span style="color:green">VALID</span>':'<span style="color:red">INVALID</span>').'</td><td>'.$ex2[1].'</td></tr>';
		}
		echo '</table>';
	} elseif($_GET['log']=="newException.txt"){
		echo '<table style="word-wrap: break-word;width:100%">';
		foreach($ex as $ligne){
			$ex2=explode(":",$ligne);
			if($ex2[0]!="") echo '<tr><td>'.date("d-m-Y H:i:s",$ex2[0]).'</td><td>'.substr($ligne,11).'</td></tr>';
		}
		echo '</table>';
	} elseif($_GET['log']=="url-de-notification.txt"){
		echo '<table style="word-wrap: break-word;width:100%">';
		foreach($ex as $ligne){
			$ex2=explode(":",$ligne);
			if($ex2[0]!="") echo '<tr><td>'.$ex2[0].'</td><td>'.date("d-m-Y H:i:s",$ex2[1]).'</td><td>'.$ex2[2].'</td></tr>';
		}
		echo '</table>';
	}
	
}
?>
</body>
</html>