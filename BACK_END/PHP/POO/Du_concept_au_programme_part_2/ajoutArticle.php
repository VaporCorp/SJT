
<?php
    require_once 'Articles.php';
?>
<h1>Ajouter un article : </h1>
<form method="post" action="<?php Articles::add()?>">
    <div>
        <label>
            <input type="text" placeholder="Titre" name="title">
        </label>
    </div>
    <div>
        <label>
            <textarea type="text" placeholder="Contenu" name="content"></textarea>
        </label>
    </div>
    <input type="submit" value="Envoyer">
</form>
