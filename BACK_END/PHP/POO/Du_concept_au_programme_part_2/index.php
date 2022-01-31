<?php 

    require_once 'Database.php';

    $insertValues = [
                        "title"=>"Test", 
                        "content"=>"Lorem Ipsum", 
                        "created_at"=>"2022-01-18 20:56:16"
                    ];

    $insertUserVal = [
                        "lastname"=>"Voie",
                        "firstname"=>"Jean",
                        "email"=>"jean.voie@gmail.com",
                        "password"=>"azerty123",
                    ];

/*     Database::insertQuery("articles", $insertValues);
    Database::insertQuery("users", $insertUserVal); */

    // Requête de la BDD pour récupérer tous les articles //
    $result = Database::queryFA("articles", ["created_at" , "DESC"]);
    $resultUsers = Database::queryFA("users");
?>
    <ul> <h2>Liste des articles : </h2>
<?php foreach($result as $single):?>
        <li><?= $single["title"];?></li>
<?php endforeach; ?>
    </ul>

    <ul> <h2>Liste des users :</h2>
        <?php foreach($resultUsers as $single): ?>
            <li><?= $single["lastname"]." ".$single["firstname"]; ?></li>
        <?php endforeach;  ?>
    </ul>