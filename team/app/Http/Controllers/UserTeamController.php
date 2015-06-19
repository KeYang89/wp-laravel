<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class UserTeamController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
        return redirect('lobby');
	}

	public function userTeam($teamId = null)
	{
        $positionNames = array(
            '1'     =>  'Goalkeeper',
            '2'     =>  'Right-back',
            '3'     =>  'Centre-back',
            '4'     =>  'Centre-back',
            '5'     =>  'Left-back',
            '6'     =>  'Right midfield',
            '7'     =>  'Centre midfield',
            '8'     =>  'Centre midfield',
            '9'     =>  'Left midfield',
            '10'    =>  'Centre forward',
            '11'    =>  'Centre forward',
            '12'    =>  'Substitute',
            '13'    =>  'Substitute',
            '14'    =>  'Substitute',
            '15'    =>  'Substitute'
        );

        $userAllTeams = \DB::table('user_teams')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        if(!empty($userAllTeams))
        {
            if(!empty($teamId))
            {
                $team = \DB::table('user_teams')->where('user_id', Auth::user()->id)->where('id', $teamId)->first();
                if(empty($team))
                {
                    $message = 'Invalid request';
                    return view('error', compact('message'));
                }
            }
            else
            {
                $team = \DB::table('user_teams')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            }

            $team->team_players = unserialize(base64_decode($team->team_players));

            foreach($team->team_players as $teamPlayer)
            {
                $singlePlayer = \DB::table('players')->where('id', $teamPlayer['playerId'])->first();
                $teamPlayerData[] = array(
                    'tshirt'    =>  \Config::get('app.url') . '/public/images/shirt_' . $singlePlayer->team_id . '.png',
                    'fullName'  =>  $singlePlayer->first_name . ' ' . $singlePlayer->last_name,
                    'position'  =>  $positionNames[$teamPlayer['playerPosition']],
                    'price'     =>  $singlePlayer->price
                );
            }
            return view('pickTeam', compact('team', 'userAllTeams', 'teamPlayerData'));
        }
        else
        {
            return view('pickTeam');
        }
	}

    public function myPoints($teamId = null)
    {
        $positionNames = array(
            '1'     =>  'Goalkeeper',
            '2'     =>  'Right-back',
            '3'     =>  'Centre-back',
            '4'     =>  'Centre-back',
            '5'     =>  'Left-back',
            '6'     =>  'Right midfield',
            '7'     =>  'Centre midfield',
            '8'     =>  'Centre midfield',
            '9'     =>  'Left midfield',
            '10'    =>  'Centre forward',
            '11'    =>  'Centre forward',
            '12'    =>  'Substitute',
            '13'    =>  'Substitute',
            '14'    =>  'Substitute',
            '15'    =>  'Substitute'
        );

        $userAllTeams = \DB::table('user_teams')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        if(!empty($userAllTeams))
        {
            if(!empty($teamId))
            {
                $team = \DB::table('user_teams')->where('user_id', Auth::user()->id)->where('id', $teamId)->first();
                if(empty($team))
                {
                    $message = 'Invalid request';
                    return view('error', compact('message'));
                }
            }
            else
            {
                $team = \DB::table('user_teams')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            }

            $team->team_players = unserialize(base64_decode($team->team_players));

            foreach($team->team_players as $teamPlayer)
            {
                $singlePlayer = \DB::table('players')->where('id', $teamPlayer['playerId'])->first();
                $teamPlayerData[] = array(
                    'tshirt'    =>  \Config::get('app.url') . '/public/images/shirt_' . $singlePlayer->team_id . '.png',
                    'fullName'  =>  $singlePlayer->first_name . ' ' . $singlePlayer->last_name,
                    'position'  =>  $positionNames[$teamPlayer['playerPosition']]
                );
            }
            return view('myPoints', compact('team', 'userAllTeams', 'teamPlayerData'));
        }
        else
        {
            return view('myPoints');
        }
    }

    public function players()
    {
        $weekTeam = \DB::table('user_teams')->orderBy('team_rank', 'desc')->first();
        $playersByScore = \DB::select('SELECT a.*, b.name AS clubName FROM players a INNER JOIN teams b ON a.team_id = b.id ORDER BY a.score DESC LIMIT 5');
        $playersByGoal = \DB::select('SELECT a.*, b.name AS clubName FROM players a INNER JOIN teams b ON a.team_id = b.id ORDER BY a.goals DESC LIMIT 5');
        return view('players', compact('weekTeam', 'playersByScore', 'playersByGoal'));
    }

    public function playerProfile($playerId)
    {
        $playerData = \DB::table('players')->where('id', $playerId)->first();
        return view('playerProfile', compact('playerData'));
    }

    public function userLobby()
    {
        $input = \Request::all();

        $url_string['area'] = $this->urlString($input, 'area');
        $url_string['contest_type'] = $this->urlString($input, 'type');


        $whereString = '1=1';

        foreach($input as $key => $value){
            $value = urldecode($value);

            if(in_array($key, array('area', 'contest_type', 'keyword')))
            {
                if($key == 'keyword')
                {
                    $whereString .= ' AND contest LIKE "%' . $value . '%"';
                }
                else
                {
                    $whereString .= ' AND ' . $key . ' = "' . $value . '"';
                }
            }

        }

        $contests = \DB::select('SELECT *, DATE_FORMAT(start_time,"%h:%i %p") AS f_start_time FROM contests WHERE ' . $whereString);

        return view('userLobby', compact('contests', 'input', 'url_string'));
    }

    private function urlString($param, $field)
    {
        if(isset($param[$field]))
        {
            unset($param[$field]);
        }

        if(isset($param['all' . $field]))
        {
            unset($param['all' . $field]);
        }

        $string = '';
        foreach($param as $key => $value)
        {
            $string .= '&' . $key . '=' . urlencode($value);
        }
        return $string;
    }

    public function createTeam()
    {
        $allCoaches = \DB::table('coaches')->get();
        $allPositions = \DB::table('positions')->get();
        $allTeams = \DB::table('teams')->orderBy('name')->get();
        return view('createTeam', compact('allPositions', 'allCoaches', 'allTeams'));
    }

    public function scout()
    {
        return view('scout');
    }

    public function statistics()
    {
        $arrPos = array('MID', 'FWD', 'DEF', 'GKP');
        $arrnum = array('MID', 'FWD', 'DEF', 'GKP');

        $totalStart = 233;

        $playersByGoal = \DB::select('SELECT a.*, b.name AS clubName FROM players a INNER JOIN teams b ON a.team_id = b.id ORDER BY a.goals');
        foreach($playersByGoal as $player){
            $playerData[] = array(
                'tshirt'    =>  \Config::get('app.url') . '/public/images/shirt_' . $player->team_id . '.png',
                'playerId'  =>  $player->id,
                'name'      =>  $player->first_name . ' ' . $player->last_name,
                'team'      =>  $player->clubName,
                'position'  =>  $arrPos[array_rand($arrPos)],
                'selected'  =>  rand(1, 9) . rand(1, 9) . '.' . rand(1, 9) . rand(1, 9) . '%',
                'price'     =>  '$' . rand(1, 15),
                'gw'        =>  rand(0, 10),
                'total'     =>  $totalStart

            );

            $totalStart = $totalStart - 15;
        }

        return view('statistics', compact('playerData'));
    }


    public function fixtures()
    {
        return view('fixtures');
    }

    public function playerStats()
    {
        return view('playerStats');
    }
}
