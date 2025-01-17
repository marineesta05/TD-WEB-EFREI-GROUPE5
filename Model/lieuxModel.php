<?php

require_once 'bdd.php';

class LieuxModel{

    private $bdd;
    public function __construct(){
        $this->bdd = Database::getConnection();
    }

    public function getImage($image){
        try {
            
            $stmt = $this->bdd->prepare("SELECT * FROM lieux WHERE image = ?");
            $stmt->execute([$image]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function getCSS($lieu){
        try {
            
            $stmt = $this->bdd->prepare("SELECT objets.id_objet, objets.name_objet, objets.css, objets.sous_image, lieux.id_image, lieux.name_image, lieux.image FROM objets JOIN lieux ON objets.id_image = lieux.id_image WHERE lieux.name_image = ?");
            $stmt->execute([$lieu]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    

    

}

