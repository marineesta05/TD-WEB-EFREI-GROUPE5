<?php
include_once __DIR__ . '/../Model/lieuxModel.php';


class LieuxController
{

    private $model;

    public function __construct()
    {
        $this->model = new LieuxModel;
    }

    public function showLieux($image){
        return $this->model->getImage($image);
    }
    
    public function showPos($lieu) {
        $data = $this->model->getCSS($lieu);

        return $data;
    }
    

   
}
