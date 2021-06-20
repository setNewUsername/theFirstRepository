<?php
function generateRandomObjects(){
    $amountOfObjects = rand(1, 100);
    $typeOfObject = rand(0, 2);
    $figuresCollection = array();
    
    $figuresTypesArray = array(
        0 => new Сircle(),
        1 => new Rectangle(),
        2 => new Triangle(),
    );
    
    for($i = 0; $i < $amountOfObjects; $i++){
        $typeOfObject = rand(0, 2);
        array_push($figuresCollection, $figuresTypesArray[$typeOfObject]);
    }
    
    return $figuresCollection;
}

function putFiguresCollectionInFile($collectionPointer){
    $fileStream = fopen('file.txt', 'w');
    
    for($i = 0; $i < count($collectionPointer); $i++){
        $collectionPointer[$i] -> randomParametres();
        fwrite($fileStream, serialize($collectionPointer[$i]) . "\r\n");
    }
    
    fclose($fileStream);
}

function getFiguresCollectionFromFile(){
    $objectsFromFile = file('file.txt');
    $figuresCollection = array();
    
    
    foreach($objectsFromFile as $object){
        array_push($figuresCollection, unserialize($object));
    }
    
    for($i = 0; $i < count($figuresCollection); $i++){
        $currentElement = $figuresCollection[$i];
        $currentPosition = $i;
        
        for($m = $i+1; $m < count($figuresCollection); $m++){
            if(($figuresCollection[$m] -> getAria()) > ($currentElement->getAria())){
                $currentPosition = $m;
                $currentElement = $figuresCollection[$m];
            }
        }
        
        $figuresCollection[$currentPosition] = $figuresCollection[$i];
        $figuresCollection[$i] = $currentElement;
    }
    for($i = 0; $i < count($figuresCollection); $i++){
        echo $figuresCollection[$i] -> putInfoOnScreen();
    }
}