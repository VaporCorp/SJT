<?php
    function db_connect(){
        $user = 'root';
        $pass = '';

        try{
            $dbh = new PDO ("mysql:host=localhost;dbname=tpa;charset=UTF8", $user, $pass);
        }

        catch (PDOException $e){
            print "Erreur de connexion à la base de donnée!: ". $e->getMessage(). "<br>";
            die();
        }
        return $dbh;
    }

    
    
    $mail = "clement.pouillart@gmail.com";
    $pwd = "azerty123";
    
    $mailLog = $_POST["id"];
    $pwdLog = $_POST["pwd"];

    $dbRequest = db_connect()->prepare("SELECT username, passwd FROM user WHERE username LIKE '$mailLog' AND passwd LIKE '$pwdLog' ");
    $dbRequest->execute();
    $result = $dbRequest->fetch(PDO::FETCH_ASSOC);

/*     var_dump($result); */

    if (($result["username"] === $mailLog) && ($result["passwd"] === $pwdLog)){
        session_start();

        $_SESSION["userName"] = $mailLog;
        $_SESSION["userPwd"] = $pwdLog;
        
        echo "Authentification réussie!<br>Redirection en cours...";
        header('Refresh: 3; loggedin.php');
    }
    else{
        echo "Non connecté";
        header('Refresh: 3; index.php');
    }




/*     if ($mail === $mailLog && $pwd === $pwdLog){
        session_start();

        $_SESSION["userName"] = $mailLog;
        $_SESSION["userPwd"] = $pwdLog;
        
        echo "Authentification réussie!<br>Redirection en cours...";
        header('Refresh: 3; loggedin.php');
    }
    else{
        echo "Non connecté";
        header('Refresh: 3; index.php');
    }
 */

?>