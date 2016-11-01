<?php
require_once 'src/Dao/Config.php';
class DataAccess {
    
    public static function conectData() {
        $host = Config::$HOST;
        $dbname = Config::$BDNAME;
        $dns = "mysql:host={$host};dbname={$dbname}";
        $conect = new PDO($dns, Config::$USER, Config::$PASS, Config::$OPTIONS);
        return $conect;
    }
}

