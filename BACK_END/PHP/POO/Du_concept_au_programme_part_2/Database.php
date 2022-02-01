<?php 

    require_once 'Config.php';

    class Database{

        private $conn;
        private static $_instance;

        public function __construct(){
            // Connexion à la Database :
            $hote = Config::getDatabase()["host"];
            $dbname = Config::getDatabase()["name"];
            $user = Config::getDatabase()["user"];
            $pass = Config::getDatabase()["password"];

            $connexion = new PDO('mysql:host='.$hote.'; charset=UTF8; dbname='.$dbname.'', $user, $pass);
            $this->conn = $connexion;
        }

        public static function dbConnect(){
            if(self::$_instance == NULL){
                self::$_instance = new Database;
            }
            return self::$_instance->conn;
        }

        private static function genericQuery($req){
            return self::dbConnect()->query($req);
        }

        public static function queryFA($table, $orderBy = ""){
            $req = "SELECT * FROM {$table}";

            if($orderBy){
                $req .= " ORDER BY $orderBy[0] $orderBy[1]";
            }
            
            return self::genericQuery($req)->fetchAll();
        }

        public static function preparedQuery($values, $req){

            $query = self::dbConnect()->prepare($req);

            foreach ($values as $key=>$val){
                $query->bindValue(":$key", $val);
            }

            $query->execute();

        }

        public static function insertQuery($table, $values){

            $dbFields = "";
            $dbValues = "";

            foreach ($values as $key=>$value){
                $dbFields .= $key.',';
                $dbValues .= ":".$key.",";
            }

            $dbFields = rtrim($dbFields, ',');
            $dbValues = rtrim($dbValues, ',');

            $req = "INSERT INTO {$table} ({$dbFields}) VALUES ($dbValues)";
            self::preparedQuery($values, $req);
        }

        public static function find($table, $id){
            $req = "SELECT * FROM {$table} WHERE id=$id";

            return self::genericQuery($req)->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function delete($table, $id){
            $req = "DELETE FROM {$table} WHERE id=$id";

            self::genericQuery($req)->fetchAll();
        }
    }