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
        $response = self::apiCall('getUser');
        return json_decode($response);
    }

    public static function apiCall($endpoint)
    {
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