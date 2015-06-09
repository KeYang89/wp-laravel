/**
 * Created by SiD on 22/01/15.
 */

angular.module('starter.controllers', [])

.controller('TeamController', function($scope, teamService, $ionicModal, $ionicPopup, $http, $timeout) {

        $scope.team = {};

        $scope.team.teamName = '';
        $scope.team.selectedPlayerPosition = '';
        $scope.team.teamPlayers = [];
        $scope.playerData = [];
        $http.get('server.php/api/v1/getUserTeam').
            success(function(data, status, headers, config) {
                if (!angular.isUndefined(data.result) && !angular.isUndefined(data.result.team_name)) {
                    $scope.team.teamName = data.result.team_name;

                    angular.forEach(data.result.team_players, function(playerValue, playerIndex){
                        if(!angular.isUndefined(playerValue.playerPosition)){
                            $scope.team.teamPlayers.push({
                                playerPosition  :   playerValue.playerPosition,
                                playerId        :   playerValue.playerId
                            });
                        }
                    });

                    console.log($scope.team.teamPlayers);
                }
            }).
            error(function(data, status, headers, config) {
                console.log('API failed');
            }).then(function(){

                $scope.playerData = [];
                $http.get('server.php/api/v1/getAllPlayers').
                    success(function(data, status, headers, config) {
                        angular.forEach(data.result, function(playerValue, playerIndex){
                            $scope.playerData.push({id: playerValue.id, firstName: playerValue.first_name, lastName: playerValue.last_name, teamId: playerValue.team_id});
                        });
                    }).
                    error(function(data, status, headers, config) {
                        console.log('API failed');
                    }).then(function(){

                        $scope.modal = '';

                        $scope.openModal = function() {
                            $ionicModal.fromTemplateUrl('my-modal.html', {
                                scope: $scope,
                                animation: 'slide-in-up'
                            }).then(function(modal) {
                                $scope.modal = modal;
                                //console.log(teamService.selectedPlayerId);
                                $scope.modal.show();
                            });
                        };
                        $scope.closeModal = function() {
                            $scope.modal.hide();
                        };
                        //Cleanup the modal when we're done with it!
                        $scope.$on('$destroy', function() {
                            $scope.modal.remove();
                        });
                        // Execute action on hide modal
                        $scope.$on('modal.hidden', function() {
                            // Execute action
                        });
                        // Execute action on remove modal
                        $scope.$on('modal.removed', function() {
                            // Execute action
                        });

                        $scope.chooseTeamPlayer = function(index)
                        {
                            teamService.chooseTeamPlayer($scope.playerData[index]);

                            //console.log('PPPP' + $scope.team.selectedPlayerPosition);

                            $scope.team.teamPlayers.push({
                                playerPosition  :   $scope.team.selectedPlayerPosition,
                                playerId        :   $scope.playerData[index].id
                            });

                            $scope.modal.hide();
                        };

                        $scope.saveTeam = function()
                        {
                            console.log(JSON.stringify($scope.team.teamPlayers));

                            var dataObj = {
                                userId      :   1,
                                teamName    :   $scope.team.teamName,
                                teamPlayers :   $scope.team.teamPlayers
                            };

                            $http.post('server.php/api/v1/saveTeam', dataObj).
                                success(function(data, status, headers, config) {
                                    var alertPopup = $ionicPopup.alert({
                                        title: 'Success',
                                        template: 'Team info saved!'
                                    });
                                    console.log(data);
                                });
                        };

                        $timeout(teamService.loadPitch($scope), 3000);
                    });
            });
    })