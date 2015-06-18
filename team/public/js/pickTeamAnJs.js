var playerStatsApp = angular.module('PickTeam', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})
    .controller('MainController', function($scope, $http) {


        $scope.model = {};
        $scope.model.playerInfo = {};
        $scope.model.playerInfo.loaded = 0;


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
    });