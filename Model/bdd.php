<?php

class Database {

    private static $bdd = null;

    private static $host = 'localhost'; 
    private static $port = '5432'; 
    private static $dbname = 'Groupe10'; 
    private static $user = 'postgres'; 
    private static $password = 'marine'; 

    
    public static function getConnection() {
        if (self::$bdd === null) {
            try {
                $dsn = "pgsql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname;
                self::$bdd = new PDO($dsn, self::$user, self::$password);
                self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
                die();
            }
        }
        return self::$bdd;
    }
}
