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
        $position = Request::input('position');
        $order = Request::input('order');
        $priceLimit = Request::input('priceLimit');
        $teamId = Request::input('teamId');

        $dbQuery =  \DB::table('players');

        if(!empty($position))
        {
            $dbQuery = $dbQuery->where('position_id', $position);
        }
        if(!empty($priceLimit))
        {
            $dbQuery = $dbQuery->where('price', '<=', $priceLimit);
        }
        if(!empty($teamId))
        {
            $dbQuery = $dbQuery->where('team_id', '=', $teamId);
        }
        if(!empty($order))
        {
            $dbQuery = $dbQuery->orderBy($order, 'ASC');
        }

        $respone = $dbQuery->get();

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

    public function getAllPositions()
    {
        $respone = \DB::table('positions')->get();

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

    public function getPlayerStat($playerId, $leagueId, $seasonId)
    {
        $respone = \DB::table('player_statistics')->where('player_id', $playerId)->where('league_id', $leagueId)->where('season_id', $seasonId)->first();
        if(!empty($respone))
        {
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

    public function getPlayerInfo($playerId)
    {
        $respone = \DB::table('players')->where('id', $playerId)->first();
        $teamRespone = \DB::table('teams')->where('id', $respone->team_id)->first();
        $respone->team = $teamRespone->name;

        if(!empty($respone))
        {
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



    public function saveTeam()
    {
        $teamName = Request::input('teamName');
        $coachId = Request::input('coachId');

        $teamPlayers = Request::input('teamPlayers');

        $array =  (array) $teamPlayers;
        $teamPlayers = base64_encode(serialize($array));

        $teanPoint = rand(30, 80);
        $teamRank = 1511123 + $teanPoint;

        \DB::insert('insert into user_teams set user_id = "' . Auth::user()->id . '", team_name = "' . $teamName . '", coach_id = "' . $coachId . '", team_players = "' . $teamPlayers . '", team_points = "' . $teanPoint . '", team_rank = "' . $teamRank . '"');
        $teamId = \DB::getPdo()->lastInsertId();

        // success
        return Response::json([
                'status'    =>  200,
                'teamId'    =>  $teamId
            ], 200);
    }

    public function getAllLeagues()
    {
        $respone = \DB::table('leagues')->get();

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

    public function getAllSeasons()
    {
        $respone = \DB::table('seasons')->get();

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

    public function getAllTeams()
    {
        $respone = \DB::table('teams')->get();

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

    public function getToken()
    {
        return csrf_token();
    }

    public function getUser()
    {
        if(Auth::user())
        {
            return Response::json([
                    'status'    =>  'success',
                    'auth'      =>  true,
                    'user'      =>  ['name' => Auth::user()->name, 'email'  =>  Auth::user()->email]
                ], 200);

        }
        else
        {
            return Response::json([
                    'status'    =>  'success',
                    'auth'      =>  false
                ], 200);
        }
    }
}