<?php 
    session_start();

    if(session_id()){
        echo "<h1>Bonjour ".$_SESSION['psd']."</h1>";
        echo "Cliquez ici pour vous <a href='scripts/logout.php'>déconnecter</a>";
    }

    else{
        echo "<h2>Votre requête n'a malheureusement pu aboutir.</h2>";
    }

?>