<?php

class Figure{
    private $name;
    
    function __construct($name){
        $this->name = $name;
    }
    
    function putInfoOnScreen(){
        echo 'Name of figure: ' . $this->name . '<br>';
        echo 'Random parametres: ' . $this->getParametres() . '<br>';
        echo 'Aria of figure: ' . $this->aria() . '<br><br>';
    }
    
    function getAria(){
        return $this->aria();
    }
}
