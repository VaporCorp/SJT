<?php
    require_once 'Database.php';

    if($_GET && $_GET['action']==="supprimer"){
        Articles::delete($_GET['id']);
    }

    class Articles {
        public static function add(): void
        {
            $created_at =  new DateTime('now', new DateTimeZone('Europe/Paris'));
            $_POST['created_at'] = $created_at->format('Y-m-d H:i:s');

            Database::insertQuery(__CLASS__ , $_POST);

            header("location:index.php");
        }

        public static function find($id){
            return Database::find("articles", $id);
        }

        public static function findAll(){

        }

        public static function delete($id){
            Database::delete("articles", $id);
        }
    }