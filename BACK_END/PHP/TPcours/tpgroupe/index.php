<?php
include ('mysqli.php');
$req = 'SELECT * FROM pokemon';
//$result = $connexionMySql->query($req);
//$final = $result -> fetch_all(MYSQLI_ASSOC);
$resultat = mysqli_query($connexionMySql, $req);
$final = mysqli_fetch_all($resultat, MYSQLI_ASSOC);

?>
<html>
<head>
    <link href="style.css" rel="stylesheet">
</head>
<header>
    <img>
    <h1>Pokémon</h1>
</header>
<table>
    <?php
    echo "<tr>";
    foreach($final['0'] as $key => $value){ //Passer le '0' en '1' si ça ne fonctionne pas
        echo "<th>".$key."</th>";
    }
    echo "</tr>";
    foreach($final as $key => $values){
        echo "<tr>";
        foreach($values as $key => $value){?>
            <td><?= $value ?></td>
        <?php }
        echo "<td>
                <form method='POST' action='scripts/delete.php'>
                    <input type='submit' name='supprimer' value='Supprimer'>
                    <input type='hidden' name='id' value='{$values["id"]}'>
                </form>
            </td>";
        echo "</tr>";
    }?>
</table>
<a href="pageajout.php"><button>Ajouter un pokémon</button></a>
</html>