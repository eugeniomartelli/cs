<?php

class DAO {
    protected static $db;
    
    public function __construct() {
        if (!isset(DAO::$db)) {
            DAO::$db = new PDO("mysql:host=localhost;dbname=corpsearch","root","root");
            DAO::$db->exec('SET CHARSET UTF8');
        }
    }
}
