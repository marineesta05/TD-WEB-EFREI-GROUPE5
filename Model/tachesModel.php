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
    

}

