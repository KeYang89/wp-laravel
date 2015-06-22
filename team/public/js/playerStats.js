var playerStatsApp = angular.module('PlayerStatus', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})
    .controller('MainController', function($scope, $http) {

        $scope.player = {};
        $scope.player.allLeagues = [];
        $scope.player.allSeasons = [];
        $scope.player.allPlayers = [];
        $scope.player.allTeams = [];

        $scope.player.gridStats = [
            {id: 'total_score', name: 'Total Score'},
            {id: 'total_passes', name: 'Total Passes'},
            {id: 'total_shots', name: 'Total Shots'},
            {id: 'goals_scored', name: 'Goals Scored'}

        ];

        $scope.compare = {};
        $scope.compare.selectedWidgetId = 1;
        $scope.compare.widgets = 4;
        $scope.compare.players = [];
        //$scope.compare.players.push({widgetId: $scope.compare.selectedWidgetId, playerId: null});





        $http.get('/team/api/v1/getAllPlayers').
            success(function(data, status, headers, config) {
                $scope.player.allPlayers = data.result;
            }).
            error(function(data, status, headers, config) {
                console.log('Error: Teams API');
            });

        $http.get('/team/api/v1/getAllTeams').
            success(function(data, status, headers, config) {
                $scope.player.allTeams = data.result;
            }).
            error(function(data, status, headers, config) {
                console.log('Error: Teams API');
            });

        $http.get('/team/api/v1/getAllLeagues').
            success(function(data, status, headers, config) {
                $scope.player.allLeagues = data.result;
            }).
            error(function(data, status, headers, config) {
                console.log('Error: Teams API');
            });


        $http.get('/team/api/v1/getAllSeasons').
            success(function(data, status, headers, config) {
                $scope.player.allSeasons = data.result;
            }).
            error(function(data, status, headers, config) {
                console.log('Error: Teams API');
            });



        $scope.removePlayer = function(index){
            var tempPlayers = [];
            angular.forEach($scope.compare.players, function(value, key){
                if(key != index)
                {
                    tempPlayers.push(value);
                }
            });

            $scope.compare.players = tempPlayers;
        };

        $scope.selectPlayer = function(){
            $('#tsf').addClass('control-sidebar-open');
        };

        $scope.addPlayer = function(widgetId)
        {
            if($('#cmp-season-id').val() == '' || $('#cmp-league-id').val() == '' || $('#cmp-player-id').val() == '')
            {
                $("#compare-player-model #modal-title").html('Alert');
                $("#compare-player-model #modal-body").html('Please enter all fields');
                $("#compare-player-model").modal('show');
            }
            else
            {
                var addPlayerId = $('#cmp-player-id').val();
                var addLeagueId = $('#cmp-league-id').val();
                var addSeasonId = $('#cmp-season-id').val();

                var playerName = '';
                var teamName = '';
                var leagueName = '';
                var seasonName = '';

                angular.forEach($scope.player.allPlayers, function(pValue, pKey){
                    if(pValue.id == addPlayerId)
                    {
                        playerName = pValue.first_name + ' ' + pValue.last_name;
                        angular.forEach($scope.player.allTeams, function(tValue, tKey){
                            if(pValue.team_id == tValue.id)
                            {
                                teamName = tValue.name;
                            }
                        });
                    }
                });

                // get league name
                angular.forEach($scope.player.allLeagues, function(lValue, lKey){
                    if(lValue.id == addLeagueId)
                    {
                        leagueName = lValue.league_name;
                    }
                });

                // get season name
                angular.forEach($scope.player.allSeasons, function(sValue, sKey){
                    if(sValue.id == addSeasonId)
                    {
                        seasonName = sValue.season;
                    }
                });

                console.log($scope.compare.selectedWidgetId);

                $http.get('/team/api/v1/getPlayerStat/' + addPlayerId + '/' + addLeagueId + '/' + addSeasonId).
                    success(function(data, status, headers, config) {

                        var st = {};
                        if(!angular.isUndefined(data.result))
                        {
                            var st = {
                                games: data.result.games,
                                mins_played: data.result.mins_played,
                                total_score: data.result.total_score,
                                total_passes: data.result.total_passes,
                                goals_scored: data.result.goals_scored,
                                total_shots: data.result.total_shots,
                                saves: data.result.saves,
                                red_cards: data.result.red_cards,
                                yellow_cards: data.result.yellow_cards,
                                starts: data.result.starts,
                                crosses: data.result.crosses,
                                goals_allowed: data.result.goals_allowed,
                                assists: data.result.assists,
                                shot_on_target: data.result.shot_on_target,
                                trackles: data.result.trackles,
                                chances_created: data.result.chances_created,
                                interceptions: data.result.interceptions
                            };
                        }

                        $scope.compare.players.push({
                            widgetId    :   $scope.compare.selectedWidgetId,
                            playerId    :   addPlayerId,
                            leagueId    :   addLeagueId,
                            seasonId    :   addSeasonId,
                            playerName  :   playerName,
                            teamName    :   teamName,
                            playerPhoto :   appUrl + '/public/images/pavt_' + addPlayerId + '.png',
                            leagueName  :   leagueName,
                            seasonName  :   seasonName,
                            stat        :   st
                        });

                        $scope.compare.selectedWidgetId = ($scope.compare.selectedWidgetId + 1);
                        if($scope.compare.selectedWidgetId >= 5)
                        {
                            $scope.compare.selectedWidgetId = 1;
                        }

                        //console.log(JSON.stringify($scope.player.gridStats));

                    }).
                    error(function(data, status, headers, config) {
                        console.log('Error: Teams API');
                    });



                $('#frm-comp-player')[0].reset();
                $('#tsf').removeClass('control-sidebar-open');
            }

            /*
            console.log(widgetId);
            $('#tsf').addClass('control-sidebar-open');
            console.log(JSON.stringify($scope.player.allSeasons));
            $scope.compare.players.push({id: 1});
            */
        };

    });