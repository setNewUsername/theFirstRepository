<?php

require 'functions.php';
require 'classes/ClassCircle.php';
require 'classes/ClassRectangle.php';
require 'classes/ClassTriangle.php';

/*
$circle = new Сircle();
$circle->putInfoOnScreen();

$rectangle = new Rectangle();
$rectangle->putInfoOnScreen();

$triangle = new Triangle();
$triangle->putInfoOnScreen(); */


$collection = &generateRandomObjects();

putFiguresCollectionInFile($collection);

getFiguresCollectionFromFile(); 
?>