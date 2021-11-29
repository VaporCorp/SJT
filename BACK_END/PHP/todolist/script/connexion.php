<?php
if($_POST['email'] && $_POST['motdepasse']){
    $mail = $_POST['email'];
    $mdp = $_POST['motdepasse'];
    include('./connexionbdd.php');

    if($connexionMySql){

        $sqlids = "SELECT * FROM users WHERE (email='$mail' AND motdepasse='$mdp')";
        $testids = mysqli_query($connexionMySql, $sqlids);
        $ok = mysqli_num_rows ($testids);

        if($ok > 0){
            session_start();
            $_SESSION['email'] = $mail;
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
