<?php
include ('mysqli.php');
$req = 'SELECT * FROM pokemon';
//$result = $connexionMySql->query($req);
//$final = $result -> fetch_all(MYSQLI_ASSOC);
$resultat = mysqli_query($connexionMySql, $req);
$final = mysqli_fetch_all($resultat, MYSQLI_ASSOC);

?>
<head>
    <link href="style.css" rel="stylesheet">
</head>
<header>
    <h1>Pokemon</h1>
</header>
<main>
    <div class="tableau">
        <table>
            <?php
            echo "<tr>";
            foreach($final['0'] as $key => $value){
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            foreach($final as $key => $values){
                echo "<tr>";
                foreach($values as $key => $value){?>
                    <?php if ($key=='type'||$key=='type2') {?>
                        <td><p class="type <?= $value?>"><?= $value ?></p></td>
                    <?php }
                    else {?>
                        <td><p><?= $value ?>&nbsp;
                                <?php if($key=='poids') {
                                    echo "kg";
                                }
                                elseif ($key=='taille') {
                                    echo "m";
                                }
                                ?></p>
                        <?php if ($key=='nom') {
                        if(file_exists(__DIR__."/images/$value.gif"))
                            echo "<img src='images/$value.gif' alt='image de $value' class='sprite'>";
                        else if(file_exists(__DIR__."/images/$value.png"))
                            echo "<img src='images/$value.png' alt='image de $value' class='sprite'>";
                        else if(file_exists(__DIR__."/images/$value.jpg"))
                            echo "<img src='images/$value.jpg' alt='image de $value' class='sprite'>";
                        }
                        ?>
                        </td>
                    <?php }?>
                <?php }
                echo "<td>
                    <form method='POST' action='scripts/delete.php' class='suppression'>
                        <input type='submit' name='supprimer' value='Supprimer'>
                        <input type='hidden' name='id' value='{$values["id"]}'>
                    </form>
                </td>";
                echo "</tr>";
            }?>
        </table>
        <a href="pageajout.php"><button>Ajouter un pokémon</button></a>
    </div>
</main>