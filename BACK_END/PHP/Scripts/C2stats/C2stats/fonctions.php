<?php if(!defined("C2STATS")) exit;//on sécurise l'accès à cette page
function infos_ua($user_agent,$nouveaux=false){
	global $iteration;
	$iteration=0;
	
	/**Notes et références utilisées:
	Pour les robots j'ai utilisé la database sur ce site: https://user-agents.net/bots
	Pour les navigateurs et la détection du mobile, j'ai lu la doc de Mozilla: https://developer.mozilla.org/fr/docs/Web/HTTP/Detection_du_navigateur_en_utilisant_le_user_agent
	*/
	
	//ROBOTS
	$robot='';
	$file=file(($nouveaux?'../':'')."txt/listes/bots.txt");//file() permet de mettre chaque ligne dans un tableau
	foreach($file as $ligne){
		$ligne=trim($ligne);//trim enlève les espaces devant et derrière si il y en a
		$iteration+=1;
		if(stristr($user_agent,$ligne) OR stristr($user_agent,str_replace(' ','-',$ligne))){
			$robot=$ligne;
			break; //arrêt de la boucle pour gagner en ressource
		}
	}
	
	//NAVIGATEURS
	$navigateur='';
	$types=array('Chrome'=>['Chrome'],'Firefox'=>['Firefox'],'MSIE'=>['MSIE'],'Trident'=>['MSIE'],'Seamonkey'=>['Seamonkey'],'Chromium'=>['Chromium'],'Safari'=>['Safari'],'Opera'=>['Opera'],'OPR'=>['Opera'],'Mozilla'=>['Firefox']);//L'ordre de recherche des navigateurs (array('Chrome'=>['Chrome'],'Firefox'=>...) est défini pour trouvé le bon nom du navigateur car plusieurs nom peuvent être indiqués dans l'ua, ex: Chrome/ver Safari/ver Edge/ver, la doc mozilla précise que si certains nom sont avant certains autres, ça définit le vrai nom du navigateur. à ne pas toucher, sauf cas contraire ;)
	foreach($types as $type => $nom){
		$iteration+=1;
		if(stristr($user_agent,$type)){
			$navigateur=$nom[0];
			break;
		}
	}
	
	//OS
	$os='';
	$types=array('Windows','Linux','Mac','Android','X11');
	foreach($types as $type){
		$iteration+=1;
		if(stristr($user_agent,$type)){
			$os=$type;
			break;
		}
	}
	
	//IS MOBILE
	$mobile=false;
	$types=array('Mobi','Android','Nokia');
	foreach($types as $type){
		$iteration+=1;
		if(stristr($user_agent,$type)){
			$mobile=true;
			break;
		}
	}
	
	//RESEAUX SOCIAUX
	$rs='';
	$file=file(($nouveaux?'../':'')."txt/listes/reseaux-sociaux.txt");
	foreach($file as $ligne){
		$iteration+=1;
		$ligne=trim($ligne);
		if(stristr($user_agent,$ligne)){
			$rs=$ligne;
			break; //arrêt de la boucle pour gagner en ressource
		}
	}
	
	if($robot=='' AND $rs==''){
		if(stristr($user_agent,'bot'))$robot='newbot';//si il trouve "bot" dans user_agent mais qu'il correspond à aucun précédent, on le nomme newbot pour ensuite le récupérer facilement dans le script
		elseif(stristr($user_agent,'spider'))$robot='newbot';
		elseif(stristr($user_agent,'crawl'))$robot='newbot';
	}
	return array(
		'robot'=>$robot,
		'navigateur'=>$navigateur,
		'os'=>$os,
		'mobile'=>$mobile,
		'rs'=>$rs,
		'iteration'=>$iteration,
	);
}
function insererNouveauxUA($uas,$nouveaux=false){
	//on vérifie si cet ua n'est pas déjà inséré
	foreach($uas as $ua){
		$trouve=0;
		$file=file(($nouveaux?'../':'')."txt/listes/nouveaux-ua.txt");
		foreach($file as $ligne){
			$ligne=trim($ligne);
			if(stristr($ua,$ligne)){
				$trouve=1;
				break; //arrêt de la boucle pour gagner en ressource
			}
		}
		if($trouve==0) file_put_contents(($nouveaux?'../':'')."txt/listes/nouveaux-ua.txt","$ua\n",FILE_APPEND|LOCK_EX);
	}
}
function c2fleches($value,$a_value){
	if($value>$a_value)
		return 'plus';
	elseif($value==$a_value)
		return 'egal';
	elseif($value<$a_value)
		return 'moins';
}
function listeDesJours($jours,$nouveaux=false){
	//les variables avec (nom)_t indiquent "total"
	//les variables avec a_(nom) indiquent "ancienne valeurs"
	
	/*if($jour==true){
		$time_start=microtime(true);
	}*/
	
	//inclusions des variables qui sont utilisées hors de la fonction, pour les reconnaitres dans et hors cette fonction
	global $C2STATS,$annee,$mois,$jour,$NbrDeJours,
	
	$visiteurs,
	
	//variables pour aujourd'hui seulement (si un jour en particulier est demandé)
	$pagesvues_visiteurs,
	$robots_ce_jour,
	$pagesvues_robots,
	
	//inclusions des variables prédéfinies dans la page, pour les lire hors de la fonction
	$int,//sont toutes valeurs integer
	$array,//plusieurs variables tableaux rassemblées dans un seul, pour faire moins fouillis
	$newbots,//affichera les nouveaux bots inconnus
	$news,//affichera les nouveaux user_agent inconnus
	$mobile,//nombre de visiteur sur mobile
	
	//création ici des variables, pour les lire hors de la fonction
	$iterations;
	//fin global
	$NbrDeJours+=1;
	if(!$nouveaux){
		//variables pour aujourd'hui seulement
		$array['robots_ce_jour']=[];
		
		//POUR LA FLECHE
		//ancienne valeur de $visiteurs, pour afficher une fleche +, = ou - (flèche qui indique si il y a eu plus ou moins de visiteurs qu'hier)
		$a_visiteurs=0;
		if(isset($visiteurs))$a_visiteurs=$visiteurs;
		$visiteurs=0;
		
		$a_pagesvues_visiteurs=0;
		if(isset($pagesvues_visiteurs))$a_pagesvues_visiteurs=$pagesvues_visiteurs;
		$pagesvues_visiteurs=0;
		
		$a_robots_ce_jour=0;
		if(isset($robots_ce_jour))$a_robots_ce_jour=$robots_ce_jour;
		$robots_ce_jour=0;
		
		$a_pagesvues_robots=0;
		if(isset($pagesvues_robots))$a_pagesvues_robots=$pagesvues_robots;
		$pagesvues_robots=0;
	}
	
	//On regarde dans ce fichier stats pour retirer toutes les infos, ligne par ligne
	$file=$jours=='ips.txt'?file($jours):file(($nouveaux?'../':'').$C2STATS['chemin']."$annee/$mois/$jours");
	foreach($file as $ligne){
		$bloc1=explode("@;@",$ligne);
		$bloc['ip']=$bloc1[0];//IP
		$bloc['ua']=$bloc1[1];//User agent
		$bloc['page']=$bloc1[2];//page visitée en premier
		$bloc['referer']=$bloc1[3];//referer
		$bloc['vues']=(int)trim($bloc1[4]);//nombre de pages vues
		if($bloc['vues']!=0){//bug constaté, la ligne créée dans le fichier ips.txt ne contient pas toutes les infos, donc, on épargne cette ligne car elle affichera une erreur sinon (Warning: A non-numeric value encountered)
			$infos_ua=infos_ua($bloc['ua'],$nouveaux);
			// $robot=bot($bloc['ua']);
			// $rs=reseau_social($bloc['ua']);
			// $os=get_os($bloc['ua']);
			// if(is_mobile($bloc['ua'])) $mobile+=1;
			$robot=$infos_ua['robot'];
			$navigateur=$infos_ua['navigateur'];
			$os=$infos_ua['os'];
			$mobile1=$infos_ua['mobile'];
			$rs=$infos_ua['rs'];
			$iterations=$infos_ua['iteration'];

			if($mobile1) $mobile+=1;
			//si aucune robot, aucun reseau social et aucun system d'exploitation est détecté, on enregistre ce nouveau user_agent pour l'afficher dans les "nouveaux" et ensuite l'analyser manuellement
			if($robot=='' and $rs=='' and $os==''){
				if(!in_array($bloc['ua'],$array['news'])){
					//on vérifie que ce bot ne soit pas ignoré, si non, on l'affiche dans la liste "nouveaux"
					$ignore='';
					$filei=file(($nouveaux?'../':'')."txt/listes/ignores.txt");
					foreach($filei as $lignei){
						$lignei=trim($lignei);
						$iteration+=1;
						if(preg_match("#$lignei#",$bloc['ua'])){
							$ignore=$lignei;
							break; //arrêt de la boucle pour gagner en ressource
						}
					}
					if($ignore==''){
						$news.='<li>'.$bloc['ua'].'</li>';
						$array['news'][]=$bloc['ua'];
					}
				}
			}
			
			//LES PAGES PARTAGEES SUR LES RESEAUX SOCIAUX
			if($rs!=''){
				if(!$nouveaux){
					$int['pagesvues_rs_t']+=$bloc['vues'];
					//on ajoute le nom du reseau
					if(!array_key_exists($rs,$array['pages_rs'])){
						//on ajoute la page visité par ce reseau
						$array['pages_rs'][$rs]=['vues'=>1,'pages'=>[$bloc['page']=>1]];
					} else {
						//total de fois que ce réseau à vue le site
						$array['pages_rs'][$rs]['vues']+=1;
						//si cette page n'est pas enregistrée, on l'ajoute
						if(!array_key_exists($bloc['page'],$array['pages_rs'][$rs]['pages'])){
							//ajout de la page
							$array['pages_rs'][$rs]['pages'][$bloc['page']]=1;
						} else {
							//on compte le total de fois vue de cette page
							$array['pages_rs'][$rs]['pages'][$bloc['page']]+=1;
						}
					}
				}
			}
			
			//LES ROBOTS
			elseif($robot!=''){
				if(!in_array($bloc['ua'],$array['bots'])){
					if($robot=='newbot'){
						$newbots.='<li>'.$bloc['ua'].'</li>';
					}
					$array['bots'][]=$bloc['ua'];//on l'enregistre dans un array pour pas le réafficher à l'écran
				}
				if(!$nouveaux){
					$pagesvues_robots+=$bloc['vues'];
					$int['pagesvues_robots_t']+=$bloc['vues'];
					if(!in_array($robot,$array['robots_ce_jour'])){
						$array['robots_ce_jour'][]=$robot;
						$robots_ce_jour+=1;
					}
					if(!in_array($robot,$array['robots_t'])){
						$array['robots_t'][]=$robot;
						$int['robots_t']+=1;
					}
					if(!array_key_exists($bloc['page'],$array['pages_robots'])){
						//on enregistre le fait que cette page à été vue
						$array['pages_robots'][$bloc['page']]=['vues'=>1,'robots'=>[$robot]];
					} else {
						//on compte le nombre de fois que cette à été vue
						$array['pages_robots'][$bloc['page']]['vues']+=1;
						if(!in_array($robot,$array['pages_robots'][$bloc['page']]['robots']))
							$array['pages_robots'][$bloc['page']]['robots'][]=$robot;
					}
				}
			}
			
			else{
				if(!$nouveaux){
					//LES VISITEURS
					$pagesvues_visiteurs+=$bloc['vues'];
					$int['pagesvues_visiteurs_t']+=$bloc['vues'];
					$visiteurs+=1;
					$int['visiteurs_t']+=1;
					if(!array_key_exists($bloc['page'],$array['pages_visiteurs'])){
						$array['pages_visiteurs'][$bloc['page']]=1;
					} else {
						$array['pages_visiteurs'][$bloc['page']]+=1;
					}
					
					//NAVIGATEURS
					//$navigateur=get_navigateur($bloc['ua']);
					if($navigateur!=''){
						if(!array_key_exists($navigateur,$array['navigateurs'])){
							$array['navigateurs'][$navigateur]=['vues'=>1];
						} else {
							$array['navigateurs'][$navigateur]['vues']+=1;
						}
					}
					
					//OS
					if($os!=''){
						if(!array_key_exists($os,$array['os'])){
							$array['os'][$os]=['vues'=>1];
						} else {
							$array['os'][$os]['vues']+=1;
						}
					}
				}
			}
			
			if(!$nouveaux){
				//SITES REFERANTS (seulement si c'est un vrai visiteur et pas un robot)
				if($robot==''){
					if(!array_key_exists($bloc['referer'],$array['sites'])){
						$array['sites'][$bloc['referer']]=['vues'=>1];
					} else {
						$array['sites'][$bloc['referer']]['vues']+=1;
					}
				}
			}
		}
	}
	if(!$nouveaux){
		if($jour==false){
			echo "<li class='clickjq notdeployed cursor_help' data-annee='$annee' data-mois='$mois' data-jour='".substr($jours,0,-4)."'>".substr($jours,0,-4)." <span style='color:blue' class='fleche_".($premiertour?'':c2fleches($visiteurs,$a_visiteurs))."'>$visiteurs</span> <span style='color:red' class='fleche_".($premiertour?'':c2fleches($pagesvues_visiteurs,$a_pagesvues_visiteurs))."'>$pagesvues_visiteurs</span></li>";
			$premiertour=false;
			echo "
			<li class='nolist' style='margin-left:30px;display:none'>
				<ul id='c2-jour-".substr($jours,0,-4)."'>Chargement ...</ul>
			</li>";
		} /*else {
			$time_end = microtime(true);
			$time = $time_end - $time_start;
			echo "<p>Résultats générés en $time secondes.</p>";
		}*/
	}
}
function date_mois_fr($mois) {
	if($mois == "January" OR $mois==1) { $return = "Janvier"; }
	elseif($mois == "February" OR $mois==2) { $return = "Février"; }
	elseif($mois == "March" OR $mois==3) { $return = "Mars"; }
	elseif($mois == "April" OR $mois==4) { $return = "Avril"; }
	elseif($mois == "May" OR $mois==5) { $return = "Mai"; }
	elseif($mois == "June" OR $mois==6) { $return = "Juin"; }
	elseif($mois == "July" OR $mois==7) { $return = "Juillet"; }
	elseif($mois == "August" OR $mois==8) { $return = "Août"; }
	elseif($mois == "September" OR $mois==9) { $return = "Septembre"; }
	elseif($mois == "October" OR $mois==10) { $return = "Octobre"; }
	elseif($mois == "November" OR $mois==11) { $return = "Novembre"; }
	elseif($mois == "December" OR $mois==12) { $return = "Décembre"; }
	else { $return = $mois; }
	return $return;
}