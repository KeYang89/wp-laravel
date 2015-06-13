<?php
/**
 * Created by SiD 
 * Date: 12/06/15
 * Time: 10:36 PM
 */

namespace appclient;


class App {

    static public function getUser()
    {
        $data = self::apiCall('getUser');
        print_r($data);
        exit();
    }

    public static function apiCall($endpoint)
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, 'http://localhost/team/api/v1/' . $endpoint);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        //curl_setopt($ch,CURLOPT_HEADER, false);
        $output=curl_exec($ch);
        curl_close($ch);
        unset($ch);
        return $output;
    }

} 