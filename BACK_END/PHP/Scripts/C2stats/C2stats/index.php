<?php

/*
* Ici vous pouvez sécuriser l'accès à cette page que pour les administrateurs, à adapter avec votre système de vérification des utilisateurs
*/


define("C2STATS",1);
include("config.php");
include("fonctions.php");

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>C2stats - <?=$_SERVER['SERVER_NAME']?></title>
	<style>
	#c2stats{cursor:default}
	#c2stats li:hover{background-color:#6fdb6736}
	#c2stats li.nolist{list-style:none}
	#c2stats .u{text-decoration:underline}
	#c2stats .cursor_help{cursor:help}
	#c2stats .cursor_help:hover::after{content:"\2193"}
	#c2stats .fleche_plus,#c2stats .fleche_moins,#c2stats .fleche_egal,#c2stats .fleche_{margin-left:20px}

	#c2stats .fleche_plus::after{padding:0 5px 0 2px;content:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH5AMWEBc30ssDTgAAAKFJREFUGNNt0LENwjAQBdDviB7RYChSmJINEGN4iMzkIbIIrICEkTunywD3U1h2bJKTrrD0zv90iiRyDWO/Pv5K1TDjx/0JipR+fd7o9qYpBISASGqghcPYU58uAAlSSjcwI3M2aywFQFrt0CBtCvDTD3GeSlqX0BVG38pePnrEeYKzQTkbVBXNste3Qvk3Z4NSJFP0UYOUDdrcMR97DwHAAhz4eoS8LF3EAAAAAElFTkSuQmCC)}
	#c2stats .fleche_egal::after{padding:0 5px 0 2px;content:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAJCAYAAAAGuM1UAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH5AMWEBcpKMQ+LQAAAIVJREFUGNOFkMsNxCAMRB9RSggnOqEmusE90UhuCEpg9kREVpuNJWv8GXnkQRJPmXPW92zjJcxMa+9yznoie+8BqLWSUnIAO0CM8SY7xrihJMxMKSW3rxfnctYTQwiMMTAzbSvxKc/zpPfOpVBK+fnDcRxIorV2/eCm9D+HJhl4t3UlA3wAqtOMbSPw0mAAAAAASUVORK5CYII=)}
	#c2stats .fleche_moins::after{padding:0 5px 0 2px;content:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH5AMWEBUgYy7kCwAAAKBJREFUGNN9kDsOgzAQRJ8t8bmEkXsK+xKcmpIjIHok5COkQGBvigAyCslI272dnVklIgDMXScAtu8VD9InVFpL2TTXwhd4QrX31N7/hDUAKX0GqJyjMOYGz10nSkQ+p5uGyjnYdyRG1mliC+FyVHmZwhiqtoV9h5SQGCElXsNwnD7absvCOo436DTSeWDb92oL4Q4d2TX/lJW8MuZPf9IbNQpmWZeyhsgAAAAASUVORK5CYII=)}
	</style>
	<script src="<?=$CONFIG['jquery']?>"></script>
	<script>
	$(document).on("click",".clickjq",function(){$(this).next().toggle(500);return false;});
	</script>
</head>
<body>
<h1>Statistiques du site <?=$_SERVER['SERVER_NAME']?></h1>
<?php
$chemin=$C2STATS['chemin'];
$scandir1=scandir($chemin);
echo "<div id='c2stats'>
		<h2 class='clickjq notdeployed cursor_help' data-ips='1'>Aujourd'hui</h2>
		<li class='nolist' style='margin-left:30px;background-color:unset;display:none'>
			<ul id='c2-ips'>Chargement ...</ul>
		</li>
		<p>Archives:</p>";
foreach($scandir1 as $annees){
	if(ctype_digit($annees)){
		$scandir2=scandir("$chemin"."$annees/");
		echo "<h2 class='u clickjq cursor_help'>$annees</h2>
				<ul style='display:none'>";
		foreach($scandir2 as $mois){
			if(ctype_digit($mois)){
				//$scandir3=scandir("$chemin"."$annees/$mois/");
				echo "<h3 class='clickjq notdeployed cursor_help' data-annee='$annees' data-mois='$mois'>".date_mois_fr($mois)."</h3>
					  <li class='nolist' style='margin-left:30px;background-color:unset;display:none'>
						<ul id='c2-$annees-$mois'>Chargement ...</ul>
					  </li>
				";
			}
		}
		echo "</ul>";
	}
}
echo '</div>';
?>
<script>
$("[data-annee]").click(function(){
	var _this=$(this);
	if($(this).hasClass("notdeployed")){
		var annee=_this.attr("data-annee"),mois=_this.attr("data-mois");
		$.post("statsjq.php",{annee:annee,mois:mois},function(donnees){
			$("#c2-"+annee+"-"+mois).html(donnees);
			_this.removeClass("notdeployed");
		});
	}
});
$("[data-ips]").click(function(){
	var _this=$(this);
	if(_this.hasClass("notdeployed")){
		$.post("statsjq.php",{annee:'0000',mois:'00',jour:'ips'},function(donnees){
			$("#c2-ips").html(donnees);
			_this.removeClass("notdeployed");
		});
	}
});

$(document).on("click","[data-jour]",function(){
	var _this=$(this);
	if($(this).hasClass("notdeployed")){
		var annee=_this.attr("data-annee"),mois=_this.attr("data-mois"),jour=_this.attr("data-jour");
		$.post("statsjq.php",{annee:annee,mois:mois,jour:jour},function(donnees){
			$("#c2-jour-"+jour).html(donnees);
			_this.removeClass("notdeployed");
		});
	}
});
</script>
</body>
</html>