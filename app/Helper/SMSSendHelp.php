<?php


namespace App\Helper;




class SMSSendHelp
{



    private static $api = "NTc2YjRlNzIzNTQ5NGI0ZDcyMzc2ODc0NjU0ODYxNGM=";
    private static $sender = "AHSECM";


    public static function sendMessage($message, $number)
    {


        $message = urlencode($message);

        $data = "apikey=" . self::$api . "&message=" . $message . "&sender=" . self::$sender . "&numbers=" . $number;
        $ch = curl_init('https://control.textlocal.in/api2/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
    }


    public static function generateRandomOTP($length)
    {
        return substr(str_shuffle("0123456789"), 0, $length);

    }



}
