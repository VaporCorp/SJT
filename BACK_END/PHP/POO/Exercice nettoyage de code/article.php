<?php 
    require_once ("header.php");
    require_once ("database.php");
    require_once ("Model/Article.php");
    require_once ("Model/Comment.php");

    $article = new Article();
    $comment = new Comment();

    if($_GET["action"] === "afficher"){
        $singleArticle = $article->find($_GET["id"]);
        $allComments = $article->find($_GET["id"], "article");
    ?>

    <div class='articleContainer'>
        <?php foreach($singleArticle as $single):?>
            <h2><?= $single["title"]; ?></h2>
            <p><?= $single["created_at"]; ?></p>
            <p><?= $single["content"]; ?></p>
        <?php endforeach ?>

        <h3>Ajouter un commentaire :</h3>
        <form method="POST" action="comments.php">
            <div>
                <input type="hidden" name="action" value="addDB">
                <input type="hidden" name="articleid" value="<?= $_GET["id"] ?>">
                <input type="text" name="title" placeholder="Titre du commentaire">
            </div>
            <div>
                <textarea name="content" placeholder="Contenu du commentaire ..."></textarea>
            </div>
            <div>
                <input type="submit">
            </div>
        </form> 

        <?php
        if($allComments):?>
                <h3>Commentaires :</h3>
        <?php endif; 
            foreach($allComments as $singleComment):?>
            <div class='commentContainer'>
                <h4><?= $singleComment["title"]; ?></h4>
                <p><?= $singleComment["content"] ?></p>
                <p>Posté à <?= $singleComment["posted_at"];?></p>
                <a href="comments.php?artid=<?= $_GET["id"] ?>&action=delete&id=<?= $singleComment["id"] ?>">Supprimer</a>
            </div>
      <?php endforeach ?>
    </div>

<?php        
    }

    // Si l'on souhaite afficher la vue qui propose le formulaire d'ajout //
    if($_GET["action"] === "ajouter"){
?>
    <h1>Ajouter un nouvel article :</h1>
    <form method="POST" action="article.php">
        <div>
            <input type="hidden" name="action" value="addDB">
            <input type="text" name="title" placeholder="Titre de l'article">
        </div>
        <div>
            <textarea name="content" placeholder="Contenu de l'article ..."></textarea>
        </div>
        <div>
            <input type="submit">
        </div>

    </form>    
    <?php 
    }

    // Ajout d'un article en base de données //

    if($_POST && $_POST["action"] === "addDB"){
        $result = $article->add($_POST["title"], $_POST["content"]);
    }

    // Supression d'un article //
    if($_GET["action"] === "supprimer"){
        $article->delete($_GET["id"]);
    }
    require_once ("footer.php");
?>

