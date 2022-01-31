<?php 

    class Config{

        private $settingsArray;
        private static $_instance;

        public function __construct(){
            $this->settingsArray = require_once "conf.php";
            return $this->settingsArray;
        }

        public static function getAllSettings(){
            if(self::$_instance == NULL){
                self::$_instance = new Config();
            }
            return self::$_instance->settingsArray;
        }

        public static function getDatabase(){
            return self::getAllSettings()["database"];
        }

    }