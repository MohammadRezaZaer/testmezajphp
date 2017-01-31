<?php

define( 'API_KEY', '329586540:AAEaZ-91maCKl87zFX9r-PlGs-vIkaIfEUA' ) ;


$update = json_decode( file_get_contents( 'php://input' ) ) ;

var_dump( makeHTTPRequest( 'sendMessage', ['chat_id' => $update->message->chat->
		id, 'text' => "----" . file_get_contents( 'php://input' ), ] ) ) ;

if ( isset( $update->callback_query ) )
{
		var_dump( makeHTTPRequest( 'sendMessage', ['chat_id' => $update->message->
				chat->id, 'text' => "----" . file_get_contents( 'php://input' ), ] ) ) ;
		//$callbackMessage = '...آپدیت شد' ;





}
else
{

		$replyMarkup = array( 'keyboard' => array( array( "A", "B" ) ) ) ;
		$encodedMarkup = json_encode( $replyMarkup ) ;

		var_dump( makeHTTPRequest( 'sendMessage', ['chat_id' => $update->message->
				chat->id, 'text' => "اولین تلاش \n زمان :\n " . date( 'd M y -  h:i:s' ),
				'reply_markup' => json_encode( ['inline_keyboard' => [[['text' =>
				"رفرش زمان", 'callback_data' => '1']]]] )] ) ) ;
}
function makeHTTPRequest( $method, $datas = [] )
{
		$url = "https://api.telegram.org/bot" . API_KEY . "/" . $method ;
		$postdata = http_build_query( $datas ) ;

		$opts = array( 'http' => array(
						'method' => 'POST',
						'header' => 'Content-type: application/x-www-form-urlencoded',
						'content' => $postdata ) ) ;

		$context = stream_context_create( $opts ) ;

		$result = file_get_contents( $url, false, $context ) ;
}
