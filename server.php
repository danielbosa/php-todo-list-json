<?php

$todoJson = file_get_contents('js/data.json');
//var_dump($todoJson);

//aggiungo task
//$method = $_SERVER['REQUEST METHOD'];
if(isset($_POST['id'])) {
    //converto json in array php
    $todo = json_decode($todoJson, true);

    //creo nuovo array associativo per task
    $todoItem = [
        "id" => (int)$_POST['id'],
        "text" => $_POST['text'],
        "done" => $_POST['done']
    ];

    //aggiungo nuova task ad array
    $todo[] = $todoItem;

    //converto array in json
    $todoJson = json_encode($todo, JSON_PRETTY_PRINT);

    //scrivo file
    file_put_contents('data.json', $todoJson);
}

header("Content-Type: application/json");
echo $todoJson;
