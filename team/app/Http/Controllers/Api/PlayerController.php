<?php
/**
 * Created by SiD
 * Date: 16/03/15
 * Time: 12:14 PM
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Response;


class PlayerController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Api Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth.basic');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function getAllPlayers()
    {

        $respone = \DB::table('players')->get();

        if(!empty($respone)){
            // success
            return Response::json([
                    'status'    =>  200,
                    'result'    =>  $respone
                ], 200);
        }
        else{
            // no result found
            return Response::json([
                    'status'    =>  204
                ], 204);
        }
    }

    public function getUserTeam($teamId)
    {
        $respone = \DB::table('user_teams')->where('id', $teamId)->first();
        if(!empty($respone))
        {
            $result['team_name'] = $respone->team_name;
            $result['team_players'] = array();
            if($respone->team_players != '')
            {
                $teamPlayers = unserialize(base64_decode($respone->team_players));
                $result['team_players'] = $teamPlayers;
            }

            // success
            return Response::json([
                    'status'    =>  200,
                    'result'    =>  $result
                ], 200);
        }
        else{
            // no result found
            return Response::json([
                    'status'    =>  204
                ], 204);
        }
    }

    public function saveTeam()
    {
        $teamName = Request::input('teamName');
        $teamPlayers = Request::input('teamPlayers');

        $array =  (array) $teamPlayers;
        $teamPlayers = base64_encode(serialize($array));

        $teanPoint = rand(30, 80);
        $teamRank = 1511123 + $teanPoint;

        \DB::insert('insert into user_teams set user_id = "' . Auth::user()->id . '", team_name = "' . $teamName . '", team_players = "' . $teamPlayers . '", team_points = "' . $teanPoint . '", team_rank = "' . $teamRank . '"');
        $teamId = \DB::getPdo()->lastInsertId();

        // success
        return Response::json([
                'status'    =>  200,
                'teamId'    =>  $teamId
            ], 200);
    }
}