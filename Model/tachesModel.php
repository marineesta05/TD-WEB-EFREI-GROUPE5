<?php

require_once 'bdd.php';

class TachesModel{

    private $bdd;
    public function __construct(){
        $this->bdd = Database::getConnection();
    }

    public function getTacheByPhase($phase){
        $stmt = $this->bdd->prepare("SELECT * FROM etapes WHERE phase = ?");
        $stmt->execute([$phase]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function updateTacheEtat($idTache) {
        $stmt = $this->bdd->prepare("UPDATE etapes SET etat = 'FAIT' WHERE id = ? AND etat = 'NON FAIT'");
        $stmt->execute([$idTache]);
        return $stmt->rowCount() > 0;
    }
    

}

