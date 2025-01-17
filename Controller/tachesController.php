<?php
include_once __DIR__ . '/../Model/tachesModel.php';


class TachesController
{

    private $model;

    public function __construct()
    {
        $this->model = new TachesModel;
    }

    public function showTaches($phase){
        return $this->model->getTacheByPhase($phase); 
    }

    public function updateTacheEtat($idTache)
    {
        $updated = $this->model->updateTacheEtat($idTache);
    }
    
    
}