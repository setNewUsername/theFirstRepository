<?php

require_once 'ClassFigure.php';

class Сircle extends Figure{
    private $radius;
    
    function __construct(){
        parent::__construct('circle');
    }
    
    function randomParametres(){
        $this->radius = rand(1, 100);
    }
    
    function aria(){
        return (($this->radius)*($this->radius))*pi();
    }
    
    function getParametres(){
        return $parametresString = "radius: " . $this->radius;
    }
}