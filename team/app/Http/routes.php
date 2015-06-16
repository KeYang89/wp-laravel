<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'UserTeamController@index');
Route::get('my-points', 'UserTeamController@myPoints');
Route::get('create-team', 'UserTeamController@createTeam');
Route::get('pick-team/{teamId?}', 'UserTeamController@userTeam');
Route::get('players', 'UserTeamController@players');
Route::get('player-profile/{playerId}', 'UserTeamController@playerProfile');
Route::get('scouts', 'UserTeamController@scout');
Route::get('statistics', 'UserTeamController@statistics');
Route::get('fixtures', 'UserTeamController@fixtures');
Route::get('lobby', 'UserTeamController@userLobby');
Route::get('player-stats', 'UserTeamController@playerStats');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::get('getAllPositions', 'Api\PlayerController@getAllPositions');
    Route::get('getAllPlayers', 'Api\PlayerController@getAllPlayers');
    Route::get('getAllTeams', 'Api\PlayerController@getAllTeams');
    Route::get('getAllLeagues', 'Api\PlayerController@getAllLeagues');
    Route::get('getAllSeasons', 'Api\PlayerController@getAllSeasons');
    Route::get('getUserTeam/{teamId}', 'Api\PlayerController@getUserTeam');
    Route::post('saveTeam', 'Api\PlayerController@saveTeam');
    Route::get('getPlayerStat/{playerId}/{leagueId}/{seasonId}', 'Api\PlayerController@getPlayerStat');
    Route::get('getToken', 'Api\PlayerController@getToken');
    Route::get('getUser', 'Api\PlayerController@getUser');
});