<?php 
    if($_POST['pseudonyme'] && $_POST['lemotdepasse']){
        $pseudo = $_POST['pseudonyme'];
        $mdp = $_POST['lemotdepasse'];
    
        include('./dbconnect.php');

        if($connexion){
            
            $req = "SELECT id FROM users WHERE pseudo LIKE '$pseudo' AND motdepasse LIKE '$mdp'";
            $execution = mysqli_query($connexion, $req);

            if(mysqli_num_rows($execution) > 0){
                session_start();
                $_SESSION['psd'] = $pseudo;
                $_SESSION['mdp'] = $mdp;

                header('Location: sessionvalues.php');
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
?>