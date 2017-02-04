<?php
$update =  file_get_contents( 'php://input' )  ;
$hostres = makeHTTPRequestTohost('http://changekey.ir/yaMohammad/sitebot', $update);

function makeHTTPRequestTohost($url, $datas)
{

    $opts = array('http' => array(
            'method' => 'POST',
            'content' => $datas,
            'header' => "Content-Type: application/json\r\n" . "Accept: application/json\r\n"));
    $context = stream_context_create($opts);
    $result = file_get_contents($url, false, $context);
    return $result;
}
