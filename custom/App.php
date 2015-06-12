<?php
/**
 * Created by SiD 
 * Date: 12/06/15
 * Time: 10:36 PM
 */

namespace custom;


class App {

    static public function getToken()
    {
        echo self::apiCall('getToken');
    }

    public static function apiCall($endpoint)
    {
        echo 'http://matchday45.com/team/api/v1/' . $endpoint;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, 'http://matchday45.com/team/api/v1/' . $endpoint);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //curl_setopt($ch,CURLOPT_HEADER, false);
        $output=curl_exec($ch);
        curl_close($ch);
        unset($ch);
        return $output;
    }

} 