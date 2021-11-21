<?php if(!defined("C2STATS")) exit;//on sécurise l'accès à cette page

/*
* ce fichier doit être inclus dans le footer de votre site (toutes les pages)
* il enregistre le passage des visiteurs et des robots
*/

if(!function_exists('htmlent')){
	function htmlent($texte){
		return htmlentities($texte,ENT_QUOTES,"UTF-8");
	}
}
if(!function_exists('convertirSite')){
	function convertirSite($URL) {
		//vérifie si l'URL est correcte
		if(preg_match("#^https?:\/\/((www\.)?[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30})#i", $URL, $URL_array))
		return $URL_array[1];
		else return false;
		//echo convertirSite("https://mon-sous_domaine.mon2eme-sousdomaine.c2script.com");//mon-sous_domaine.mon2eme-sousdomaine.c2script.com
	}
}

function venuDepuis1(){
	$return='';
	if(!isset($_SESSION['C2stats_venu_depuis'])){
		if(!empty($_SERVER['HTTP_REFERER'])){
			$SiteConvertiVenusDepuis = convertirSite($_SERVER['HTTP_REFERER']);
			if($SiteConvertiVenusDepuis){
				$return=htmlent($SiteConvertiVenusDepuis);
			} else $return='incorrect referer';
		} else $return='empty/no set referer';
		$_SESSION['C2stats_venu_depuis']=$return;
	}
}
venuDepuis1();
$ip=isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:"[not set REMOTE_ADDR]";
$ua=isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:"[not set HTTP_USER_AGENT]";
$vd=isset($_SESSION['C2stats_venu_depuis'])?$_SESSION['C2stats_venu_depuis']:"[not set venu_depuis]";
$su=isset($_SERVER['SCRIPT_URL'])?$_SERVER['SCRIPT_URL']:"[not set SCRIPT_URL]";
$fichier=C2chemin()."C2stats/ips.txt";
$file=file($fichier);
$nouveau_contenu="";
$trouve=0;
foreach($file as $ligne){
	$bloc=explode("@;@",$ligne); //ip@;@ua@;@url visitée@;@venu_depuis@;@vues
	if($bloc[0]==$ip){//ip trouvée, on compte pages+1
		$nouveau_contenu.=$bloc[0]."@;@".$bloc[1]."@;@".$bloc[2]."@;@".$bloc[3]."@;@".((int)$bloc[4]+1)."\n";
		$trouve=1;
	} else $nouveau_contenu.=$ligne;
}
if($trouve==0){//on insère ip si pas trouvée
	file_put_contents($fichier,htmlent($ip)."@;@".htmlent($ua)."@;@".htmlent($su)."@;@".$vd."@;@1\n",FILE_APPEND|LOCK_EX);
}else{
	//on recré le fichier avec +1 stats à cet ip
	file_put_contents($fichier,$nouveau_contenu,LOCK_EX);
}