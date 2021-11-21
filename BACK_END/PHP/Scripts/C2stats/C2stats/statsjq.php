<?php

/*
* Ici vous pouvez sécuriser l'accès à cette page que pour les administrateurs, à adapter avec votre système de vérification des utilisateurs
*/




if(!isset($_POST['annee']) OR !isset($_POST['mois'])){
	echo "Not set.";
	exit;
}
if(!preg_match("#^[0-9]{4}$#",$_POST['annee']) OR !preg_match("#^[0-9]{2}$#",$_POST['mois'])){
	echo "Valeurs incorrectes.";
	exit;
}
$jour=false;
if(isset($_POST['jour'])){
	if(preg_match("#^[0-9]{2}$#",$_POST['jour'])) $jour=true;
	elseif($_POST['jour']=='ips') $jour=true;
}
$time_start=microtime(true);

//inclusions des fichiers nécessaires
define("C2STATS",1);
include 'config.php';
include 'fonctions.php';


$annee=$_POST['annee'];
$mois=$_POST['mois'];


echo $jour!=true?"<li class='nolist clickjq'><span style='color:blue;margin-right:20px'>Visiteurs</span> <span style='color:red'>Pages vues</span></li>":'';

$int['pagesvues_visiteurs_t']=0;
$int['pagesvues_robots_t']=0;
$int['pagesvues_rs_t']=0;
$int['visiteurs_t']=0;
$int['robots_t']=0;
$array['bots']=[];
$array['news']=[];
$array['sites']=[];
$array['navigateurs']=[];
$array['os']=[];
$array['robots_t']=[];
$array['pages_visiteurs']=[];
$array['pages_robots']=[];
$array['pages_rs']=[];
$NbrDeJours=0;
$mobile=0;
$newbots='';
$news='';
$premiertour=true;//pour ne pas afficher une fleche au premier jour
if($jour==true)
	listeDesJours("{$_POST['jour']}.txt");
else {
	$scandir3=scandir($C2STATS['chemin']."$annee/$mois/");
	foreach($scandir3 as $jours){
		if(substr($jours,-3)=='txt'){
			listeDesJours($jours);
		}
	}
}

echo "<li class='nolist'><h3>Statistiques du ".($jour==true?($_POST['jour']=='ips'?'jour même':"jour {$_POST['jour']}"):"mois de ".date_mois_fr($mois))."</h3>
		<ul>
			<li>Visiteurs au total:
				<ul>
					<li><b style='color:blue'>{$int['visiteurs_t']}</b>".(!$jour?($NbrDeJours>1?(' <i>(Moyenne de <b style="color:blue">'.round($int['visiteurs_t']/$NbrDeJours).'</b> visiteurs, par jour)</i>'):''):'')."</li>
				</ul>
			</li>
			<li>Pages vues:
				<ul>
					<li>Par les visiteurs: <b style='color:red'>{$int['pagesvues_visiteurs_t']}</b>".(!$jour?($NbrDeJours>1?(' <i>(Moyenne de <b style="color:red">'.round($int['pagesvues_visiteurs_t']/$NbrDeJours).'</b> pages vues, par jour)</i>'):''):'')."</li>
					<li>Par les robots: <b>{$int['pagesvues_robots_t']}</b></li>
					<li>Par les réseaux sociaux: <b>{$int['pagesvues_rs_t']}</b></li>
				</ul>
			</li>
			<li>Moyenne de pages vues par visite:
				<ul>
					<li>Visiteurs: <b>".($int['visiteurs_t']!=0?round($int['pagesvues_visiteurs_t']/$int['visiteurs_t'],2):0)."</b></li>
					<li>Robots: <b>";
					if($jour==true){
						echo $robots_ce_jour!=0?round($int['pagesvues_robots_t']/$robots_ce_jour,2):0;
					} else {
						echo $int['robots_t']!=0?round($int['pagesvues_robots_t']/$int['robots_t'],2):0;
					}
					echo "</b></li>
				</ul>
			</li>
			<li>Visiteurs sur mobile:
				<ul>
					<li><b>$mobile</b> (".($int['visiteurs_t']!=0?round($mobile/$int['visiteurs_t']*100,2):0)."%)</li>
				</ul>
			</li>
			<li>Robots qui ont crawlés le site:
				<ul>
					<li><b>".($jour==true?$robots_ce_jour:$int['robots_t'])."</b><br/>
					<span style='font-size:75%'>Crawlé par: <i>";
						if($jour==true){
							natcasesort($array['robots_ce_jour']);//trie alphabétique (croissant)
							foreach($array['robots_ce_jour'] as $bots) echo "- $bots ";
						} else {
							natcasesort($array['robots_t']);//trie alphabétique (croissant)
							foreach($array['robots_t'] as $bots) echo "- $bots ";
						}
					echo "</i></span>
					</li>
				</ul>
			</li>
		</ul>
	  </li>";



//affichage des pages visitées
echo "<li class='nolist clickjq'><h3 class='cursor_help'>Les pages vues par les visiteurs</h3></li><ul style='display:none'>";
arsort($array['pages_visiteurs']);//trie decroissant des valeurs du tableau (le nombre de fois vue, pour remonter la page la plus vue, en haut)
$resultats=0;
foreach($array['pages_visiteurs'] as $page => $vues){
	echo "<li>$page<span style='float:right'>$vues fois</span></li>";
	$resultats=1;
}
echo $resultats==0?'<li>Aucun résultat.</li>':'';
echo "</ul>";

//affichage des robots
echo "<li class='nolist clickjq'><h3 class='cursor_help'>Les pages vues par les robots</h3></li><ul style='display:none'>";
arsort($array['pages_robots']);//trie decroissant des valeurs du tableau (le nombre de fois vue, pour remonter la page la plus vue, en haut)
$resultats=0;
foreach($array['pages_robots'] as $page => $arrays){
echo "<li>$page<span style='float:right'>{$arrays['vues']} fois</span><br/>
		<span style='font-size:75%'>Crawlé par: <i>";
	foreach($arrays['robots'] as $robot){
		echo "- ".ucfirst($robot)." ";
	}
	echo "</i></span></li>";
	$resultats=1;
}
echo $resultats==0?'<li>Aucun résultat.</li>':'';
echo "</ul>";

//affichage des pages partagées sur les réseaux sociaux
echo "<li class='nolist clickjq'><h3 class='cursor_help'>Les pages partagées sur les réseaux sociaux</h3></li><ul style='display:none'>";
arsort($array['pages_rs']);//trie decroissant des valeurs du tableau (le nombre de fois vue, pour remonter la page la plus vue, en haut)
$resultats=0;
foreach($array['pages_rs'] as $rs => $arrays){
	echo "<li>$rs<span style='float:right'>{$arrays['vues']} fois</span>
			<ul>";
	arsort($arrays['pages']);
	foreach($arrays['pages'] as $page => $vues){
		echo "<li>$page<span style='float:right'>$vues fois</span></li>";
	}
	echo "	</ul>
		</li>";
	$resultats=1;
}
echo $resultats==0?'<li>Aucun résultat.</li>':'';
echo "</ul>";

//affichage des sites référants (venus depuis un site)
echo "<li class='nolist clickjq'><h3 class='cursor_help'>Les sites référants</h3></li><ul style='display:none'>";
arsort($array['sites']);
$resultats=0;
foreach($array['sites'] as $site => $arrays){
	echo "<li>$site<span style='float:right'>{$arrays['vues']} fois</span></li>";
	$resultats=1;
}
echo $resultats==0?'<li>Aucun résultat.</li>':'';
echo "</ul>";

//affichage des navigateurs utilisés
echo "<li class='nolist clickjq'><h3 class='cursor_help'>Les navigateurs</h3></li><ul style='display:none'>";
arsort($array['navigateurs']);
$resultats=0;
foreach($array['navigateurs'] as $navigateur => $arrays){
	echo "<li>$navigateur<span style='float:right'>{$arrays['vues']} fois</span></li>";
	$resultats=1;
}
echo $resultats==0?'<li>Aucun résultat.</li>':'';
echo "</ul>";

//affichage des systèmes d'exploitation utilisés
echo "<li class='nolist clickjq'><h3 class='cursor_help'>Les systèmes d'exploitation</h3></li><ul style='display:none'>";
arsort($array['os']);
$resultats=0;
foreach($array['os'] as $os => $arrays){
	echo "<li>$os<span style='float:right'>{$arrays['vues']} fois</span></li>";
	$resultats=1;
}
echo $resultats==0?'<li>Aucun résultat.</li>':'';
echo "</ul>";


//si de nouveaux robots sont trouvés ou des user_agent non analysables, on les affichent et on les enregistres si ils le sont pas
if($newbots!=''){
	echo $C2STATS['afficher_nouveaux_ua']==1?'<ul><li class="nolist" style="color:red">Nouveaux robots détectés:</li>'.$newbots.'</ul>':'';
	insererNouveauxUA($array['bots']);
}
if($news!=''){
	echo $C2STATS['afficher_nouveaux_ua']==1?'<ul><li class="nolist" style="color:red">Nouveaux user_agent détectés:</li>'.$news.'</ul>':'';
	insererNouveauxUA($array['news']);
}

$time_end = microtime(true);
$time = round($time_end - $time_start,4);

echo "<p style='font-size:75%'>Résultats générés en $time secondes.<br/>$iterations itérations</p>";