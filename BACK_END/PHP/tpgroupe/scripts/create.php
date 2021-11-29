<head>
    <link href="../style.css" rel="stylesheet">
</head>
<header>
    <h1>Pokemon</h1>
</header>
<main>
    <div class="tableau ">
        <?php
        include "../mysqli.php";
        if(!$_POST['id']||!$_POST['nom']||!$_POST['type1']||!$_POST['type2']||!$_POST['taille']||!$_POST['poids']||!$_FILES['file']['size']){
            echo "<h2>Veuillez renseigner toutes les informations</h2>";
            echo "<a href='../index.php'><button>Retourner à l'accueil</button></a>";
            die();
        }
        $reqadd = "INSERT INTO pokemon (id, nom, type, type2, taille, poids)
        VALUES ('{$_POST['id']}','{$_POST['nom']}','{$_POST['type1']}', '{$_POST['type2']}', '{$_POST['taille']}', '{$_POST['poids']}')";

        $create = mysqli_query($connexionMySql, $reqadd);

        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $_FILES["file"]["name"]= "{$_POST['nom']}.$imageFileType";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

        echo "<h2>Pokémon en cours d'ajout dans la base de données</h2>";

        header('Refresh: 10; URL=../index.php');?>
    </div>
</main>