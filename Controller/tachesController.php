<?php
include_once '../Model/tachesModel.php';

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
    
}