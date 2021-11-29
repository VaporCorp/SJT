<?php
if($_POST['pseudo'] && $_POST['mot_de_passe']){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mot_de_passe'];

    include('./connexionbdd.php');

    if($connexionMySql){

        $sqlids = "SELECT * FROM users WHERE (pseudo='$pseudo' AND mot_de_passe='$mdp')";
        $testids = mysqli_query($connexionMySql, $sqlids);
        $ok = mysqli_num_rows ($testids);

        if($ok > 0){
            session_start();
            $_SESSION['psd'] = $pseudo;
            $_SESSION['mdp'] = $mdp;

            header('Location: session.php');
        }

        else{
            echo "Votre requete SQL n'a pu aboutir.";
        }

    }

    else{
        echo "Erreur de connexion à la base de données";
    }

}

else{
    echo "Votre pseudo ou mot de passe n'est pas valide";
    echo "<a href='./index.html'>Cliquez ici pour être redirigé</a>";
}
