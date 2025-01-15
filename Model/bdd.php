<?php

class Bdd {

    private static $host = 'localhost'; 
    private static $port = '5432'; 
    private static $dbname = 'Groupe10'; 
    private static $user = 'postgres'; 
    private static $password = 'marine'; 

    public static function connexion() {
        try {
          
            $dsn = "pgsql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname;
            $bdd = new PDO($dsn, self::$user, self::$password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;

        } catch (Exception $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
}