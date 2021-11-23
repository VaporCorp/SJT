<?php

    $target_dir = "images/";
//    var_dump($_FILES['uploadfichier']); Renvoie les informations du fichier uploadé
    $target_file = $target_dir.basename($_FILES["uploadfichier"]["name"]);
//    echo $target_file; Renvoie l'information de nom de fichier que l'on a établi avant
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check file type and integrity
    if($_POST["submit"]) {
        move_uploaded_file($_FILES["uploadfichier"]["tmp_name"], $target_file);
        echo "<p>Félicitations, upload effectué</p>";
    }
?>