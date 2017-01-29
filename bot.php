<?php

$update = file_get_contents('php://input');

$data = "https://api.telegram.org/bot329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA/sendmessage?chat_id=94036610&text=salam".$update;
$response = file_get_contents($data);
$update = json_decode(file_get_contents('php://input'));
$data = "https://api.telegram.org/bot329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA/sendmessage?chat_id=94036610&text=salam".$update->message->chat->username;
$response = file_get_contents($data);

$postdata = http_build_query(
    array(
        'var1' => 'some content',
        'var2' => 'doh'
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('https://api.telegram.org/bot329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA/sendmessage', false, $context);


define('API_KEY','329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA');
