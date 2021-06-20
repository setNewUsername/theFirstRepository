<?php

require_once 'ClassFigure.php';

class Rectangle extends Figure{
    private $side;
    private $side2;
    
    function __construct(){
        parent::__construct('rectangle');
    }
    
    function randomParametres(){
        $this->side = rand(1, 100);
        $this->side2 = rand(1, 100);
    }
    
    function aria(){
        return ($this->side)*($this->side2);
    }
    
    function getParametres(){
        return $parametresString = "side1: " . $this->side . ", side2: " . $this->side2;
    }
}