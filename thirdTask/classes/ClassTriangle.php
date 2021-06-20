<?php

require_once 'ClassFigure.php';

class triangle extends Figure{
    private $side;
    private $side2;
    private $angle;
    
    function __construct(){
        parent::__construct('triangle');
    }
    
    function randomParametres(){
        $this->side = rand(1, 100);
        $this->side2 = rand(1, 100);
        $this->angle = rand(1, 178);
    }
    
    function aria(){
        return 0.5 * ($this->side) * ($this->side2) * sin(deg2rad($this->angle));
    }
    
    function getParametres(){
        return $parametresString = "side1: " . $this->side . ", side2: " . $this->side2 . ", angle: " . $this->angle;
    }
}