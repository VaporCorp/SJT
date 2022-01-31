<?php

class Config
{
    private $conf;
    private static $_configInstance;

    public function __construct()
    {
        $this->conf = require_once 'conf.php';
    }

}