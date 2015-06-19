var playerStatsApp = angular.module('CreateTeam', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})
    .controller('MainController', function($scope, $http) {

        $scope.emptyPlayerPositionList = function(){
            $scope.rightSlider.goalkeepers = [];
            $scope.rightSlider.diffenders = [];
            $scope.rightSlider.midfielders = [];
            $scope.rightSlider.forward = [];
        }

        $scope.rightSlider = {};
        $scope.rightSlider.playerList = [];
        $scope.rightSlider.playerSearch = 0;
        $scope.rightSlider.selectedPosition = '';
        $scope.rightSlider.selectedOrder = 'first_name';
        $scope.rightSlider.selectedPriceLimit = '';
        $scope.rightSlider.allPositions = [];
        $scope.model = {};
        $scope.model.playerInfo = {};
        $scope.model.playerInfo.loaded = 0;

        $scope.team = {};
        $scope.team.teamBudget = 120;
        $scope.team.coachBudget = 20;


        $scope.emptyPlayerPositionList();

        //$scope.rightSlider.playerListPositions = new Array();

        $http.get('/team/api/v1/getAllPositions').
            success(function(data, status, headers, config) {
                $scope.rightSlider.allPositions = data.result;
                /*
                angular.forEach($scope.rightSlider.allPositions, function(value, key) {
                    $scope.rightSlider.playerListPositions[value.id] = new Array();
                });
                */
            }).
            error(function(data, status, headers, config) {
                console.log('Error: Teams API');
            });

        $scope.openSlider = function(position) {

            $scope.rightSlider.selectedPosition = position;
            $scope.rightSlider.selectedOrder = 'first_name';
            $scope.rightSlider.selectedPriceLimit = '';

            //$('#frm-cteam-plr-ftr')[0].reset();

            $scope.rightSlider.playerList = [];

            //console.log('PPPP');

            var myEl = angular.element( document.querySelector( '#tsf' ) );
            myEl.addClass('control-sidebar-open');

            $scope.getPlayers();
        }

        $scope.loadPlayerInfo = function(playerId) {
            $scope.model.playerInfo.loaded = 0;
            $("#player-info-model").modal('show');
            $http.get('/team/api/v1/getPlayerInfo/' + playerId).
                success(function(data, status, headers, config) {
                    $scope.model.playerInfo.loaded = 1;
                    $scope.model.playerInfo.playerId = data.result.id;
                    $scope.model.playerInfo.name = data.result.first_name + ' ' + data.result.last_name;
                    $scope.model.playerInfo.teamId = data.result.team_id;
                    $scope.model.playerInfo.team = data.result.team;
                    $scope.model.playerInfo.goals = data.result.goals;
                    $scope.model.playerInfo.score = data.result.score;
                    $scope.model.playerInfo.price = data.result.price;
                    $scope.model.playerInfo.price = data.result.price;
                }).
                error(function(data, status, headers, config) {
                    console.log('Error: Teams API');
                });
        }

        $scope.getPlayers = function() {
            $scope.emptyPlayerPositionList();
            $scope.rightSlider.playerSearch = 1;
            $http.get('/team/api/v1/getAllPlayers?position=' + $scope.rightSlider.selectedPosition + '&order=' + $scope.rightSlider.selectedOrder + '&priceLimit=' + $scope.rightSlider.selectedPriceLimit).
                success(function(data, status, headers, config)
                {
                    console.log(JSON.stringify(teamPlayers));
                    angular.forEach(data.result, function(value, key)
                    {
                        if(!teamPlayers.some(function(addedPlayer) { return $scope.objectHasValue(addedPlayer, 'playerId', value.id); }))
                        {
                            if(value.position_id == '1')
                            {
                                $scope.rightSlider.goalkeepers.push({
                                    id      :   value.id,
                                    name    :   value.first_name + ' ' + value.last_name,
                                    price   :   value.price,
                                    score   :   value.score
                                });
                            }
                            else if(value.position_id == '2')
                            {
                                $scope.rightSlider.diffenders.push({
                                    id      :   value.id,
                                    name    :   value.first_name + ' ' + value.last_name,
                                    price   :   value.price,
                                    score   :   value.score
                                });
                            }
                            else if(value.position_id == '3')
                            {
                                $scope.rightSlider.midfielders.push({
                                    id      :   value.id,
                                    name    :   value.first_name + ' ' + value.last_name,
                                    price   :   value.price,
                                    score   :   value.score
                                });
                            }
                            else if(value.position_id == '4')
                            {
                                $scope.rightSlider.forward.push({
                                    id      :   value.id,
                                    name    :   value.first_name + ' ' + value.last_name,
                                    price   :   value.price,
                                    score   :   value.score
                                });
                            }
                        }
                    });


                    $scope.rightSlider.playerList = data.result;
                    ////console.log($scope.rightSlider.playerListPositions);
                    $scope.rightSlider.playerSearch = 0;

                }).
                error(function(data, status, headers, config) {
                    console.log('Error: Teams API');
                });
        }

        $scope.objectHasValue = function(obj, key, value){
            return obj.hasOwnProperty(key) && obj[key] === value;
        }

    });