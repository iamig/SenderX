<?php

require_once "vendor/autoload.php";

use Vonage\Client\Credentials\Basic;

$client = new Vonage\Client(new Basic("", ""));

$act = $_REQUEST['act'];

$res = '';

switch($act){
    case "send":

        $name   = $_REQUEST['name'];
        $to     = $_REQUEST['to'];
        $text   = $_REQUEST['text'];

        $index = "995";

        $to = $index.$to;

        $message = new Vonage\SMS\Message\SMS($to, $name, $text);
        
        $response = $client->sms()->send($message);
        
        $data = $response->current();


    break;
    default:
        $res = array("message" => "Action is Null");
}


echo json_encode($res, true);


?>