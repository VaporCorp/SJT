<?php
include ('mysqli.php');
$req = 'SELECT * FROM UTILISATEURS'; // On enregistre la requête dans une variable
$resultat = mysqli_query($connexionMySql, $req); // On enregistre l'envoi de la requête dans une variable

//var_dump($resultat);

$final = mysqli_fetch_all($resultat, MYSQLI_ASSOC); // On enregistre les informations de retour de la requête dans une variable

//var_dump($final);

?>
<table>
    <?php
    echo "<tr>";
    foreach($final['1'] as $key => $value){
        echo "<th>".$key."</th>";
    }
    echo "</tr>";
    foreach($final as $key => $value){
        echo "<tr>";
        foreach($value as $key => $value){?>
            <td><?= $value ?></td>
        <?php }
        echo "</tr>";
    }?>
</table>

<h3>Formulaire de suppression d'utilisateur</h3>
<form method="POST" action="script/delete.php">
    <input type="number" name="valeurnum">
    <input type="submit" name="submit">
</form>
<h3>Formulaire d'ajout d'utilisateur</h3>
<form method="POST" action="script/create.php">
    <label>Nom : </label>
    <input type="text" name="nom">
    <br>
    <label>Pseudo : </label>
    <input type="text" name="pseudo">
    <br>
    <label>Mot de passe : </label>
    <input type="password" name="password">
    <br>
    <input type="submit" name="submit">
</form>

<h3>Formulaire de modification d'utilisateur</h3>
<form method="POST" action="script/update.php">
    <label>Ancien pseudo : </label>
    <input type="text" name="ancienpseudo">
    <br>
    <label>Nouveau pseudo : </label>
    <input type="text" name="nouveaupseudo">
    <br>
    <input type="submit" name="submit">
</form>