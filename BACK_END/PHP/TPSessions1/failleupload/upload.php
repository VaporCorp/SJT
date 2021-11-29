<?php
//if (is_dir('./uploads/')) {
//    $target_dir = "uploads/";
//    $target_file = $target_dir.basename($_FILES["fichier"]["name"]);
//    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//    if($_POST["envoyer"]) {
//        move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file);
//        echo "<p>Félicitations, upload effectué</p>";
//    }
//}
//else {
//    mkdir('uploads', 0777);
//    if ('./uploads/'){
//        $target_dir = "uploads/";
//        $target_file = $target_dir.basename($_FILES["fichier"]["name"]);
//        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//        if($_POST["envoyer"]) {
//            move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file);
//            echo "<p>Félicitations, upload effectué</p>";
//        }
//    }
//}

$erreur = FALSE;

var_dump($_FILES["monFichier"]);

// Si il y a un fichier dans le formulaire //
if ($_FILES["monFichier"]) {
    $where = "uploads/";

    // Verifier si le répertoire existe //
    if (!is_dir($where)) {
        // Creation du repertoire avec les droits de lecture et d'ecriture uniquement //
        mkdir('uploads', 0666);
    }

    // Chemin definitif //
    $cheminDef = $where . basename($_FILES["monFichier"]["name"]);

    // Récupérer l'extension (en minuscule) du fichier //
    $getFileType = $_FILES["monFichier"]["type"];

    var_dump($getFileType);

    // Si ce n'est pas une image au format JPEG et PNG.
    if ($getFileType != "image/jpeg" && $getFileType != "image/png") {
        $erreur .= "Ce n'est pas une image au format JPEG ou PNG";
    }

    if (filesize($_FILES["monFichier"]["tmp_name"]) > 512000) {
        $erreur .= "Fichier trop lourd";
    }

    // Si il n'y a pas d'erreurs //
    if (!$erreur) {
        // Déplacer le fichier temporaire à l'endroit définitif
        $status = move_uploaded_file($_FILES["monFichier"]["tmp_name"], $cheminDef);

        // Changer le nom du fichier
        // CODE //
        //
    } else {
        echo $erreur;
    }
}
