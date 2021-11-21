<?php
/*
* sauvegarde les stats d'aujourd'hui et les met dans le dossier txt/archives/aaaa/mm/jj.txt
* si c'est le 1er du mois, on envoi les nouveaux USER_AGENT trouvés par mail afin de mettre à jour le script
*/
define("C2STATS",1);
include(dirname(__DIR__)."/config.php");
//récupére la date d'hier pour créer le fichier (et dossier si ya un nouveau mois ou année) de stats à la bonne date, car la cron est lancée à minuit
$hier=mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
$annee=date("Y",$hier);
$mois=date("m",$hier);
$jour=date("d",$hier);
$chemin=dirname(__DIR__)."/".$C2STATS['chemin'].$annee."/$mois/";


//chaque jour:
$file=file_get_contents(dirname(__DIR__)."/ips.txt");
//si le fichier n'est pas vide, il y a eu des visiteurs
if($file!=""){
	if(!file_exists($chemin)){
		//creation des dossiers /année/mois/ (ou de /mois/ seulement)
		if(mkdir($chemin,0700,true)){
			//creation du txt de stats d'aujourd'hui
			file_put_contents($chemin.$jour.".txt",$file);
		}
	}else{
		//creation du txt de stats d'aujourd'hui
		file_put_contents($chemin.$jour.".txt",$file);
	}
	file_put_contents(dirname(__DIR__)."/ips.txt","",LOCK_EX);
}

//chaque 1er du mois:
if(date('j')==1){
	include(dirname(__DIR__)."/fonctions.php");
	//on met dans le fichier les nouveaux trouvés
	$array['bots']=[];
	$array['news']=[];
	$newbots='';
	$news='';
	
	$scandir3=scandir($chemin);
	foreach($scandir3 as $jours){
		if(substr($jours,-3)=='txt'){
			listeDesJours($jours,true);
		}
	}
	if($newbots!=''){
		insererNouveauxUA($array['bots'],true);
	}
	if($news!=''){
		insererNouveauxUA($array['news'],true);
	}
	

	//on vérifie que les nouveaux n'ont pas déjà été envoyé en vérifiant dans nouveaux-deja-envoyes.txt:
	$arr_nouveaux_ua=file(dirname(__DIR__)."/txt/listes/nouveaux-ua.txt");
	$nouv_arr_ua=[];
	foreach($arr_nouveaux_ua as $ua){
		$nouv_arr_ua[trim($ua)]=1;
	}
	foreach($nouv_arr_ua as $ua => $num){
		//while des déjà envoyés:
		$file=file(dirname(__DIR__)."/txt/listes/nouveaux-deja-envoyes.txt");
		foreach($file as $ua1){
			if(stristr($ua,trim($ua1))){
				unset($nouv_arr_ua[$ua]);
			}
		}
	}
	$NouveauxUA='';
	foreach($nouv_arr_ua as $ua => $num){
		file_put_contents(dirname(__DIR__).'/txt/listes/nouveaux-deja-envoyes.txt',"$ua\n",FILE_APPEND|LOCK_EX);
		$NouveauxUA.="$ua<br/>
		";
	}

	//Envoi du mail si il y en a des nouveaux
	if($NouveauxUA!=''){
		$messageMSG = "
			<h1 style='display:block;font-size:150%'>Nouveaux USER_AGENT détectés depuis ".$_SERVER['HTTP_HOST'].":</h1>
			$NouveauxUA
		";
		$enteteMSG = "MIME-Version: 1.0\r\n";
		$enteteMSG .= "Content-type: text/html; charset=UTF-8\r\n";
		$enteteMSG .= "From: C2stats <un@mail.com>\r\n";
		//on envoi les deux mails
		if($C2STATS['envoyer_mail']==1)mail($C2STATS['mail'],'Nouveaux bots/UA',$messageMSG,$enteteMSG);
		if($C2STATS['contribuer']==1)mail($C2STATS['mail_steve'],'Nouveaux bots/UA',$messageMSG,$enteteMSG);
		//on vide le fichier
		file_put_contents(dirname(__DIR__).'/txt/listes/nouveaux-ua.txt','');
	}
}