<?php

require_once 'database.php';

$values =
    [
        'title' => 'test',
        'content' => 'test',
        'created_at' => '2022-01-18 20:16:22'
    ];

$uservalues =
    [
        "lastname" => "Voie",
        "firstname" => "Jean",
        "email" => "jean.voie@gmail.com",
        "password" => "Teuteu1234"
    ];
//Database::insertQuery('articles', $values);
//Database::insertQuery('users', $uservalues);

//$ins = "INSERT INTO articles (title, content, created_at) VALUES ('test', 'test', '2022-01-18 20:16:22')";
//
//Database::queryInsert($ins);
$table = "articles";
$result = Database::queryFetchAll($table, ["created_at", "DESC"]);
$table = "users";
$resultUsers = Database::queryFetchAll($table, ["id", "ASC"]);
?>

<ul>
    <?php
    foreach ($result as $article) {
        ?>
        <li><?= $article['title'] ?></li><?php
    }
    ?>
</ul>

<ul>
    <?php
    foreach ($resultUsers as $user) {
        ?>
        <li><?= $user['lastname'] . "|" . $user['firstname'] . "|" . $user['email'] ?></li><?php
    }
    ?>
</ul>

