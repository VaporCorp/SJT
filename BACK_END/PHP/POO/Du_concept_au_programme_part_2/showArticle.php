<?php
    require_once 'Articles.php';

    $singleArticle= Articles::find($_GET['id']);

    foreach($singleArticle as $single):?>
    <h2><?= $single["title"]; ?></h2>
    <p><?= $single["created_at"]; ?></p>
    <p><?= $single["content"]; ?></p>
<?php endforeach ?>
