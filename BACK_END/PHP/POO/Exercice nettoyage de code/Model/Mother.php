<?php
require_once ("/laragon/www/POO/Exercice nettoyage de code/database.php");

    class Mother {

        protected string $table = __CLASS__;

        public function find(int $id, string $relatedTo = ""):array{
            return dbConnect()->query("SELECT * FROM $this->table WHERE {$relatedTo}id=$id")->fetchAll();
        }
    }