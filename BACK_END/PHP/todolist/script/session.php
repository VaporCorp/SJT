<?php

include('./connexionbdd.php');
$mail = $_POST['email'];
$mdp = $_POST['motdepasse'];
$sqlids = "SELECT * FROM users WHERE (email='$mail' AND motdepasse='$mdp')";
$testids = mysqli_query($connexionMySql, $sqlids);
$infos = mysqli_fetch_all($sqlids);


session_start();

if(session_id()){
    echo "<h1>Bonjour ".$_SESSION['email']."</h1>";
    echo "Cliquez ici pour vous <a href='logout.php'>déconnecter</a>";
}

else{
    echo "<h2>Votre requête n'a malheureusement pu aboutir.</h2>";
}