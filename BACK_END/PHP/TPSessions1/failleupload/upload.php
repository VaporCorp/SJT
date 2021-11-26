<?php
if (is_dir('./uploads/')) {
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["fichier"]["name"]);
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($_POST["envoyer"]) {
        move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file);
        echo "<p>Félicitations, upload effectué</p>";
    }
}
else {
    mkdir('uploads', 0777);
    if ('./uploads/'){
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($_FILES["fichier"]["name"]);
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($_POST["envoyer"]) {
            move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file);
            echo "<p>Félicitations, upload effectué</p>";
        }
    }
}