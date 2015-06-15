<?php
/**
 * Created by SiD 
 * Date: 14/06/15
 * Time: 1:58 PM
 */


require __DIR__ . '/team/bootstrap/autoload.php';
$userApp = require __DIR__ . '/team/bootstrap/app.php';


function getUserApp(){
    global $userApp;
    $kernel = $userApp->make('Illuminate\Contracts\Http\Kernel');
    $response = $kernel->handle(
        $request = \Illuminate\Http\Request::capture()
    );

    if(isset($_COOKIE[$userApp['config']['session.cookie']]))
    {
        $id = $userApp['encrypter']->decrypt($_COOKIE[$userApp['config']['session.cookie']]);
        $userApp['session']->driver()->setId($id);
    }

    $userApp['session']->driver()->start();

    /*
    if($userApp['auth']->check()){
        echo "AAAAA";
    }
    */
    return $userApp;
}
