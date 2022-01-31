<?php 
    require_once ("header.php");
    require_once("database.php");
    require_once("Model/Comment.php");

    $comment = new Comment();

    // Si l'action passée en paramètres = delete //
    if($_GET && $_GET["action"] === "delete"){
        $comment->delete($_GET["id"], $_GET["artid"]);
    }

    // Ajout d'un commentaire en base de données //
    if($_POST && $_POST["action"] === "addDB"){
        $comment->add($_POST["title"], $_POST["content"], $_POST["articleid"]);
    }

    require_once ("footer.php");
?>