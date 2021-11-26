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
//if (isset($_SESSION)){
//    echo "<h2>Bonjour {$_SESSION['pseudo']}</h2>";
//}
//else {
//    if (isset($_POST['envoyer']) AND (isset($_POST['pseudo']) AND isset($_POST['mot_de_passe']))) {
//        if ($connexionMySql){
//            $pseudo = $_POST['pseudo'];
//            $mot_de_passe = $_POST['mot_de_passe'];
//            $sqlids = "SELECT * FROM users WHERE (pseudo='{$_POST['pseudo']}' AND mot_de_passe='{$_POST['mot_de_passe']}')";
//            $testids = mysqli_query($connexionMySql, $sqlids); // RENVOIE UNIQUEMENT LA VALEUR DE QUERY ET PAS UNE INFORMATION A TRAITER
//            $ok = mysqli_num_rows ($testids);
////    var_dump($ok); Pour vérifier que la requête renvoie bien une information
//            if ($ok > 0 ){ // Pour récupérer les informations seulement si la requête renvoie quelque chose
////        var_dump($final); Pour vérifier le résultat de la requête SQL
//                session_start();
//                $_SESSION['pseudo'] = $pseudo;
//                $_SESSION['mot_de_passe'] = $mot_de_passe;
//                echo "<h2>Bonjour {$_SESSION['pseudo']}</h2>";
//                }
//            else {
//                echo "<h2>Utilisateur inconnu ! Pseudo ou mot de passe incorrect !</h2>";
//            }
//        }
//        else {
//            echo "<p>Connexion à la base de données échouée</p>";
//        }
//    }
//}
