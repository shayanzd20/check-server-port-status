<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/Config/Terminal.php";
require_once __DIR__ . "/Config/telegram.class.php";

// must put telegram key
$botToken = "";
$webSite = "https://api.telegram.org/bot" . $botToken;
$Telegram = new TelegramBot($botToken);


// set IP and port of specific server
$portArray=["3306","22222","80"];
$IP="8.8.8.8";

foreach($portArray as $port){

    $cmdSatus = "nmap ".$IP." -p ".$port;

// run the system command and assign output to a variable ($output)
    exec($cmdSatus, $outputSatus1);

    var_dump($outputSatus1);

    $index=array_search($port,$outputSatus1);
    $input1 = preg_quote($port, '~');

    echo "that:"."\n";
    var_dump($input1);
    $result1 = preg_grep('~' . $port . '~', $outputSatus1);

    echo "result:"."\n";
    var_dump($result1);

    foreach($result1 as $result2){

        var_dump($result2) ;
        $closed=strpos($result2,"closed");
        var_dump($closed);
        if($closed AND intval($closed)>0){

            $message = "\xE2\x9D\x8C\xE2\x9D\x8C\xE2\x9D\x8C\xE2\x9D\x8C\xE2\x9D\x8C" . "\n";
            $message .= $IP . "\n";
            $message.="port ".$port." closed";
            // send telegram msg:
            $Telegram->sendMessage(94300794, $message);

        }
    }

    echo "this is needle:"."\n";
    var_dump($index);
}

