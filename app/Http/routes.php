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

Route::get('/', 'WelcomeController@index');
Route::get('my-points', 'UserTeamController@myPoints');
Route::get('create-team', 'UserTeamController@createTeam');
Route::get('pick-team/{teamId?}', 'UserTeamController@userTeam');
Route::get('players', 'UserTeamController@players');
Route::get('player-profile/{playerId}', 'UserTeamController@playerProfile');
Route::get('scouts', 'UserTeamController@scout');
Route::get('statistics', 'UserTeamController@statistics');
Route::get('fixtures', 'UserTeamController@fixtures');
Route::get('lobby', 'UserTeamController@userLobby');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::get('getAllPlayers', 'Api\PlayerController@getAllPlayers');
    Route::get('getUserTeam/{teamId}', 'Api\PlayerController@getUserTeam');
    Route::post('saveTeam', 'Api\PlayerController@saveTeam');
});