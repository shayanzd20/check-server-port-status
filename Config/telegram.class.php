<?php

class TelegramBot
{
    public $DBA;
    public $botToken;
    public $webSite;
    public $telegramhub;

    function __construct($token)
    {
        // entry of Terminal must be database
//        $this->DBA = new Terminal("DAEMON");
        $this->botToken = $token;
        $this->webSite = "https://api.telegram.org/bot" . $this->botToken;
        $this->telegramhub = "http://baloot-bot.ir:8080";

    }

//////// functions ///////
    function sendMessage($chatId, $message,$reply_markup=NULL)
    {

        if (count($chatId) > 1) {
            foreach ($chatId as $chatId1) {

                if($reply_markup!=NULL){

                    $replyMarkup = array(
                        'keyboard' => array(
                            $reply_markup
                        )
                    );

//                    $url = $this->webSite . " / sendMessage ? chat_id = " . $chatId1->chat_id . " & text = " . urlencode($message)." & reply_markup = ".json_encode($replyMarkup);
                    $url = $this->telegramhub." ? token = " . $this->botToken. " & chat_id = " . $chatId1->chat_id . " & message = " . urlencode($message) . " & reply_markup = " . json_encode($replyMarkup);

                    file_get_contents($url);

                }else{
//                    $url = $this->webSite . " / sendMessage ? chat_id = " . $chatId1->chat_id . " & text = " . urlencode($message);
                    $url = $this->telegramhub." ? token = " . $this->botToken. " & chat_id = " . $chatId1->chat_id . " & message = " . urlencode($message);

                    file_get_contents($url);
                }

            }
        }else{
            if($reply_markup!=NULL){

                $replyMarkup = array(
                    'keyboard' => array(
                        $reply_markup
                    )
                );

//                $url = $this->webSite . " / sendMessage ? chat_id = " . $chatId . " & text = " . urlencode($message)." & reply_markup = ".json_encode($replyMarkup);
                $url = $this->telegramhub." ? token = " . $this->botToken. " & chat_id = " . $chatId . " & message = " . urlencode($message) . " & reply_markup = " . json_encode($replyMarkup);

                file_get_contents($url);
            }else{
//                $url = $this->webSite . " / sendMessage ? chat_id = " . $chatId . " & text = " . urlencode($message);
                $url = $this->telegramhub." ? token = " . $this->botToken. " & chat_id = " . $chatId . " & message = " . urlencode($message);

                file_get_contents($url);
            }
        }

    }


    function registerUser($chatId, $first_name = null, $last_name = null, $username = null, $type = null)
    {
        $this->DBA->Run("INSERT INTO `telegram_bot` . `users_report` (`chat_id`,`first_name`,`last_name`,`username`,`type`,`dateStart`)
VALUES('" . $chatId . "', '" . $first_name . "', '" . $last_name . "', '" . $username . "', '" . $type . "', NOW())");
    }

    function notifycontent($chatId)
    {
        $this->DBA->Run("UPDATE `telegram_bot` . `users_report` SET `contentnotification` = 'Y' WHERE `chat_id` = '" . $chatId . "'");
    }

    function notifyreport($chatId)
    {
        $this->DBA->Run("UPDATE `telegram_bot` . `users_report` SET `deliveryreport` = 'Y' WHERE `chat_id` = '" . $chatId . "'");
    }

    function sendReport()
    {
        $output = null;
        $DBA1 = $this->DBA->Shell("SELECT * FROM `" . date("Y-m") . "` WHERE `To` = 'f-9801-37400018472192' AND SendAt > '" . date("Y-m-d 00:00:00") . "'");
        $DBA2 = $this->DBA->Buffer($DBA1);
        foreach ($DBA2 as $DBA3) {

            $output .= "From = " . $DBA3->From . " - Content = " . $DBA3->Content . " - SendTime = " . $DBA3->SendAt . " - Status = " . $DBA3->DeliveryStatus . "\n";
        }

        return $output;
    }

    function sendDeliveryReport()
    {
        $output = "\xF0\x9F\x92\xB0\xF0\x9F\x92\xB0\xF0\x9F\x92\xB0"."\n";

        $DBA1 = $this->DBA->Shell("SELECT SUM(`SALES`) AS SALES,
                                          SUM(`POTENTIAL`) AS POTENTIAL,
                                          SUM(`REGISTER`) AS REGISTER,
                                          SUM(`DEACTIVATION`) AS DEACTIVATION,
                                          SUM(CHARGEABLE_MT) AS CHARGEABLE_MT FROM `gateway_reports` . `mounth_view`
                                    WHERE `DATE` = CURDATE()");
        $DBA2 = $this->DBA->Load($DBA1);

        $output .= "گزارش درآمد"."\n".
            "Date:".date("Y - m - d")."\n".
            "Sales = " . $DBA2->SALES . "\n" .
            "Potential = " . $DBA2->POTENTIAL . "\n" .
            "Register = " . $DBA2->REGISTER . "\n" .
            "Deactive = " . $DBA2->DEACTIVATION . "\n" .
            "Chargable_MT = " . $DBA2->CHARGEABLE_MT . "\n";


        return $output;
    }

    function contentUsers()
    {
        $output = null;
        $DBA1 = $this->DBA->Shell("SELECT chat_id FROM `telegram_bot` . `users_report` WHERE contentnotification = 'Y';");
        $DBA2 = $this->DBA->Buffer($DBA1);
        return $DBA2;
    }

    function deliveryUsers()
    {
        $output = null;
        $DBA1 = $this->DBA->Shell("SELECT chat_id FROM `telegram_bot` . `users_report` WHERE deliveryreport = 'Y';");
        $DBA2 = $this->DBA->Buffer($DBA1);
        return $DBA2;
    }

    function adminUsers()
    {
        $output = null;
        $DBA1 = $this->DBA->Shell("SELECT chat_id FROM `telegram_bot` . `users_report` WHERE admin = 'Y';");
        $DBA2 = $this->DBA->Buffer($DBA1);
        return $DBA2;
    }


}
