<?php

class Database
{

    private $conn;
    private static $_instance;

    public function __construct()
    {
        // BDD Connexion
        $host = "localhost";
        $dbname = "poo";
        $user = 'root';
        $pass = '';

        $connexion = new PDO('mysql:host=' . $host . '; charset=UTF8; dbname=' . $dbname, $user, $pass);
        $this->conn = $connexion;
    }

    public static function dbConnect() // Static method so we can call it with ClassName::Method() after a require;
    {
        if (self::$_instance == NULL) {
            self::$_instance = new Database;
        }
        return self::$_instance->conn;
    }

    private static function genericQuery($req)
    {
        return self::dbConnect()->query($req);
    }

//    public static function queryInsert($req){
//        return self::genericQuery($req);
//    }

    public static function queryFetchAll($table, $orderBy = "")
    {
        // BDD Request for all articles
        $req = "SELECT * FROM {$table}";
        if ($orderBy) {
            $req .= " ORDER BY $orderBy[0] $orderBy[1]";
        }
        return self::genericQuery($req)->fetchAll();
    }

    public static function preparedQuery($values, $req)
    {
//        $dbFields = "";
//        $dbValues = "";
//
//        foreach ($values as $key=>$value){
//            $dbFields .= $key.',';
//            $dbValues .= "'".$value."',";
//        }
//
//        $dbFields = rtrim($dbFields, ',');
//        $dbValues = rtrim($dbValues, ',');
//
//        $req = "INSERT INTO {$table} ({$dbFields}) VALUES ($dbValues)";
//        self::dbConnect()->prepare($req)->execute();

        $query = self::dbConnect()->prepare($req);
        foreach ($values as $key => $val) {
            $query->bindValue(":" . $key, $val);

        }
        $query->execute();

    }

    public static function insertQuery($table, $values): void
    {
        $dbFields = "";
        $dbValues = "";

        foreach ($values as $key => $value) {
            $dbFields .= $key . ',';
            $dbValues .= ":" . $key . ",";
        }

        $dbFields = rtrim($dbFields, ',');
        $dbValues = rtrim($dbValues, ',');
//        var_dump($dbFields);
//        var_dump($dbValues);

        $req = "INSERT INTO {$table} ({$dbFields}) VALUES ($dbValues)";
        self::preparedQuery($values, $req);
    }
}
