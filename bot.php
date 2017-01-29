<?php



$update = json_decode(file_get_contents('php://input'));

echo $update->message->chat->id;
define('API_KEY','329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA');

function makeHTTPRequest($method,$datas=[]){
    
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $postdata = http_build_query($datas)
$data = "https://api.telegram.org/bot329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA/sendmessage?chat_id=94036610&text=salam".$postdata;
$response = file_get_contents($data);
$opts = array(
    "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
);

$context  = stream_context_create($opts);

$result = file_get_contents($url, false, $context);
            
}




// Fetching UPDATE

if(isset($update->callback_query)){
    $callbackMessage = 'آپدیت شد';
    var_dump(makeHTTPRequest('answerCallbackQuery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>$callbackMessage
    ]));
    $chat_id = $update->callback_query->message->chat->id;
    $message_id = $update->callback_query->message->message_id;
    $tried = $update->callback_query->data+1;
    var_dump(
        makeHTTPRequest('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>($tried)." امین تلاش \n زمان : \n".date('d M y -  h:i:s'),
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"رفرش زمان",'callback_data'=>"$tried"]
                    ]
                ]
            ])
        ])
    );

}else{
    makeHTTPRequest('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"اولین تلاش \n زمان :\n ".date('d M y -  h:i:s'),
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [
                    ['text'=>"رفرش زمان",'callback_data'=>'1']
                ]
            ]
        ])
    ]);
}

