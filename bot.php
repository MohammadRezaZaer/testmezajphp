<?php

$update = file_get_contents('php://input');

$data = "https://api.telegram.org/bot329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA/sendmessage?chat_id=94036610&text=salam".$update;
$response = file_get_contents($data);
$update = json_decode(file_get_contents('php://input'));
$data = "https://api.telegram.org/bot329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA/sendmessage?chat_id=94036610&text=salam".$update->message->chat->text;

define('API_KEY','329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA');
