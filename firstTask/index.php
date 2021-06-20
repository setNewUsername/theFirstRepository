<?php
$word = "get-books-count";
$word2 = "Set_Currency_Value";

function wordTransformer($wordToTransform){
    echo 'Изначальное слово: ' . $wordToTransform . '<br>';
    
    $newWord;
    $delimneterIndexes = array();
    $counter = 0;
    
    for($i = 0; $i < strlen($wordToTransform); $i++){
        if($wordToTransform[$i] == '_' || $wordToTransform[$i] == '-'){
            array_push($delimneterIndexes, $i);
        }else if($wordToTransform[$i] != '_' && $wordToTransform[$i] != '-'){
            $newWord = $newWord . $wordToTransform[$i];
        }
    }
    
    for($i = 0; $i < count($delimneterIndexes); $i++){
        $newWord[($delimneterIndexes[$i] - $counter)] = strtoupper($newWord[($delimneterIndexes[$i] - $counter)]);
        $counter++;
    }
    
    echo 'Результат работы функции: ' . $newWord . '<br>';
}

wordTransformer($word);
wordTransformer($word2);
?>