<?php
include "../mysqli.php";
$reqdel = "DELETE FROM pokemon WHERE id=".$_POST['id'];
$delete = mysqli_query($connexionMySql, $reqdel);

header("refresh:3; url=../../index.php");?>
<html>
<head>
    <link href="../style.css" rel="stylesheet">
</head>
<header>
    <img>
    <h1>Pokémon</h1>
</header>
<h2>Pokémon en cours de suppression !</h2>
</html>