<?php
/*
* le fichier doit se nommer image1.php
*/
session_start();//pour utiliser les $variables $_SESSION ouvertes
//on indique au header qu'il faut afficher la page en tant qu'image
header('Content-Type: image/png');

//params
$taillepolice=30;
$padding=5;//espaces entre les bords et les lettres
$lignes=5;//nombre de lignes multicolore qui seront affichées avec le code (5 est bien)
$cercles=5;//nombre de cercles multicolore transparents qui seront affichés avec le code (5 est bien)
$scatter=false;// (true/false) effets de dispersion/pixelisation (PHP 7.4 >= seulement)
$scatterForce=1;//jusqu'à 3

$str=isset($_SESSION['C2captcha']['calcul1'])?$_SESSION['C2captcha']['calcul1']:"Session not set";
$x=0;
$y=0;
$fonts=glob("fonts/*.ttf");//glob regroupe (via le masque *.ttf) tous les fichiers ttf du dossier fonts
$fonts_utilisees=[];
for($i=1;$i<=strlen($str);$i++){
	$font=array_rand($fonts,1);
	$font = realpath($fonts[$font]);
	$bbox = imagettfbbox($taillepolice, 0, $font, ($str[$i-1]=='1'?'-':$str[$i-1]));//le 1 est reconnu comme très peu large, du coup je met le tiret pour que ce soit bien pris en compte dans l'image et pas coupé
	$l=abs($bbox[0])+abs($bbox[2])+2;//abs() convertie une valeur en absolut, ex: -5 devient 5, + 2 pour espacer un peu les lettres
	$h=abs($bbox[7])+abs($bbox[1]);
	//var_dump($h);
	$fonts_utilisees[$i]=['caractere'=>$str[$i-1],'font'=>$font,'position_x1'=>$x+$padding,'position_y1'=>$h+$padding,'largeur'=>$l,'hauteur'=>$h];
	$x+=$l;
	$y=$h>$y?$h:$y;
}

$x += $padding;
$y += $padding;
$largeur=$x;//largeur de l'image
$hauteur=$y;//hauteur de l'image

//on crée le rectangle
$image = imagecreatetruecolor($largeur, $hauteur);
//imageantialias pour la finesse des traits
imageantialias($image, 1);
//on met un fond en blanc (255,255,255)
imagefilledrectangle($image, 0, 0, $largeur, $hauteur, imagecolorallocate($image, 255, 255, 255));
//on ajoute les lignes
function hexargb(){//fonction qui permet de retourner la valeur en RGB d'une couleur hexadécimale
    $hex=substr(str_shuffle("ABCDEF0123456789"),0,6);//choisi une couleur aléatoirement (str_shuffle), de 6 caractères (substr(chaine,0,6)) avec la sélection alphanumérique
	return array("r"=>hexdec(substr($hex,0,2)),"g"=>hexdec(substr($hex,2,2)),"b"=>hexdec(substr($hex,4,2)));//on retourne la valeur sous forme d'array
}
for($i=1;$i<=$lignes;$i++){
    $rgb=hexargb();
    imageline($image,rand(-($largeur/2),$largeur/2),rand(-($hauteur/2),($hauteur/2)*3),rand($largeur,$largeur+($largeur/2)),rand(-($hauteur/2),($hauteur/2)*3),imagecolorallocate($image, $rgb['r'], $rgb['g'], $rgb['b']));
}
for($i=1;$i<=$cercles;$i++){
    $rgb=hexargb();
    imagefilledellipse($image,rand(0,$largeur),rand(0,$hauteur),rand(10,50),rand(10,20),imagecolorallocatealpha($image, $rgb['r'], $rgb['g'], $rgb['b'],75));
}


for($i=1;$i<=strlen($str);$i++){
$rand_color=imagecolorallocate($image,rand(0,200), rand(0,200), rand(0,200));

	$pos_x=$fonts_utilisees[$i]['position_x1'];
	//pour pas que la lettre soit positionée en haut de l'image (certaines lettres ou symboles sont plus petits et tous sont affichés à partir de x 0) on la positionne au milieu
	$pos_y=($hauteur/1.2);
	/*if($fonts_utilisees[$i]['hauteur']<($hauteur-($padding*2))){
		$pos_y=($hauteur/2)+($fonts_utilisees[$i]['hauteur']/2);
	}*/
	//var_dump($fonts_utilisees[$i]);
	//on met des caractères aléatoire pour tromper les robots
	//imagechar($image, 5, $fonts_utilisees[$i]['position_x1'], 0, substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,1), imagecolorallocate($image, 0, 0, 0));
	imagettftext($image, $taillepolice, 0, $pos_x, $pos_y, $rand_color, $fonts_utilisees[$i]['font'], $fonts_utilisees[$i]['caractere']);
}
if($scatter) @imagefilter($image, IMG_FILTER_SCATTER, $scatterForce, $scatterForce+1);
//on affiche l'image
imagepng($image);
//puis on détruit l'image pour libérer de l'espace
imagedestroy($image);
?>