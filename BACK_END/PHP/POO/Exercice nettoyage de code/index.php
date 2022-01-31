<?php require_once ("header.php"); ?>
    <h1>Bienvenue sur mon blog!</h1>
    <a href="./article.php?action=ajouter">Ajouter un article</a>

    <?php 
        require_once("database.php");

        $allArticlesResult = dbConnect()->query("SELECT * FROM articles ORDER BY created_at DESC");
        $articles = $allArticlesResult->fetchAll();

        foreach($articles as $singleArticle): ?>
            <div class='articleContainer'>
                <h2><?= $singleArticle["title"]; ?></h2>
                <p><?= $singleArticle["created_at"]; ?></p>
                <p>
                    <?= $singleArticle["content"] ?>
                </p>
                <a href="./article.php?action=afficher&id=<?= $singleArticle["id"] ?>">Voir +</a>
                <a href="./article.php?action=supprimer&id=<?= $singleArticle["id"] ?>">Supprimer</a>
            </div>
  <?php endforeach ?>
<?php require_once ("footer.php"); ?>