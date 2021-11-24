<head>
    <link href="../style.css" rel="stylesheet">
</head>
<header>
    <h1>Pokemon</h1>
</header>
<main>
    <?php
include "../mysqli.php";
$reqname = "SELECT nom FROM pokemon WHERE id={$_POST['id']}";
$result= mysqli_query($connexionMySql, $reqname);
if ($result) {
    $name = mysqli_fetch_all($result, MYSQLI_ASSOC);
    unlink(__DIR__."\..\images\\{$name[0]['nom']}.gif");
}

$reqdel = "DELETE FROM pokemon WHERE id=".$_POST['id'];
$delete = mysqli_query($connexionMySql, $reqdel);
echo "<h2>Pokémon en cours de suppression de la base de données</h2>";

header('Refresh: 3; URL=../index.php');?>
</main>
