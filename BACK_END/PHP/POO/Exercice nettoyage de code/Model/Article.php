<?php
require_once ("Mother.php");

    class Article extends Mother {

        public function add(string $title, string $content): void{
            $created_at = new DateTime('now', new DateTimeZone('Europe/Paris'));
            $created_at = $created_at->format('Y-m-d H:i:s');

            $query= dbConnect()->prepare("INSERT INTO articles (title, content, created_at) VALUES ('$title', '$content', '$created_at')");
            $result = $query->execute();

            if($result == TRUE){
                header("Location: index.php");
            }
            else{
                echo "<p>Une erreur est survenue lors de l'ajout de l'article.</p>";
            }
        }

        public function delete(int $id):void{
            $query = dbConnect()->query("DELETE FROM articles WHERE id=$id");
            $query->fetchAll();

            $qComments = dbConnect()->query("DELETE FROM comments WHERE articleid=$id");
            $qComments->fetchAll();

            header("Location: index.php");
        }
    }