<?php
/**
 * Created by SiD 
 * Date: 12/06/15
 * Time: 10:36 PM
 */

//namespace appclient;


class App {

    public function getAuthApp()
    {
        require dirname(dirname(__DIR__)) . '/team/bootstrap/autoload.php';
        $app = require_once dirname(dirname(__DIR__)) . '/team/bootstrap/app.php';

        $kernel = $app->make('Illuminate\Contracts\Http\Kernel');
        $response = $kernel->handle(
            $request = \Illuminate\Http\Request::capture()
        );

        if(isset($_COOKIE[$app['config']['session.cookie']]))
        {
            //$id = json_decode(base64_decode($_COOKIE[$app['config']['session.cookie']]));

            echo $_COOKIE[$app['config']['session.cookie']];

            $id = $app['encrypter']->decrypt($_COOKIE[$app['config']['session.cookie']]);
            $app['session']->driver()->setId($id);
            $app['session']->driver()->start();



            if($app['auth']->check())
            {
                echo "MMMMM";
                return $app;
            }
        }

        echo "AAAA";
        exit();
        return false;
    }

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