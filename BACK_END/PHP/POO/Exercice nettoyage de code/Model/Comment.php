<?php
require_once ("Mother.php");

    class Comment extends Mother{
        // Methodes //
        public function delete(int $commID, int $articleID): void
        {
            $commToDelele = dbConnect()->query("DELETE FROM comments WHERE id=$commID");
            $commToDelele->fetchAll();

            header("Location: article.php?action=afficher&id=$articleID");
        }

        public function add(string $title, string $content, int $id): void
        {
            $posted_at = new DateTime('now', new DateTimeZone('Europe/Paris'));
            $posted_at = $posted_at->format('Y-m-d H:i:s');

            $stmt= dbConnect()->prepare("INSERT INTO comments (title, content, articleId, posted_at) VALUES ('$title', '$content', '$id', '$posted_at')");
            $result = $stmt->execute();

            if($result === TRUE){
                header("Location: article.php?action=afficher&id=$artID");
            }
            else{
                echo "<p>Une erreur est survenue lors de l'ajout du commentaire.";
            }
        }
    }