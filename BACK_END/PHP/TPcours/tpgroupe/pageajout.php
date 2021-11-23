<?php
include ('mysqli.php');
$req = 'SELECT * FROM pokemon';
//$result = $connexionMySql->query($req);
//$final = $result -> fetch_all(MYSQLI_ASSOC);
$resultat = mysqli_query($connexionMySql, $req);
$final = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
?>
<form method="POST" action="scripts/create.php">
    <label>ID du pokémon : </label>
    <input type="number" name="id">
    <br>
    <label>Nom : </label>
    <input type="text" name="nom">
    <br>
    <label>Type primaire : </label>
    <select name="type1">
        <?php
        $types = 'SELECT * FROM type';
        $types = mysqli_query($connexionMySql, $types);
        $types = mysqli_fetch_all($types, MYSQLI_ASSOC);
        foreach ($types as $type) {?>
            <option><?= $type['Type'] ?></option>
        <?php }?>
    </select>
    <br>
    <label>Type secondaire : </label>
    <select name="type2">
        <?php
        $types = 'SELECT * FROM type';
        $types = mysqli_query($connexionMySql, $types);
        $types = mysqli_fetch_all($types, MYSQLI_ASSOC);
        foreach ($types as $type) {?>
            <option><?= $type['Type'] ?></option>
        <?php }?>
    </select>
    <br>
    <label>Poids : </label>
    <input type="float" name="poids">
    <br>
    <label>Taille : </label>
    <input type="float" name="taille">
    <br>
    <input type="submit" value="Ajouter le pokémon">
</form>
