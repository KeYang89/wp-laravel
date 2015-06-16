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

        $scope.emptyPlayerPositionList();

        //$scope.rightSlider.playerListPositions = new Array();

        $http.get('/matchday/team/api/v1/getAllPositions').
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

            console.log('PPPP');

            var myEl = angular.element( document.querySelector( '#tsf' ) );
            myEl.addClass('control-sidebar-open');

            $scope.getPlayers();

        }

        $scope.getPlayers = function() {
            $scope.emptyPlayerPositionList();
            $scope.rightSlider.playerSearch = 1;
            $http.get('/matchday/team/api/v1/getAllPlayers?position=' + $scope.rightSlider.selectedPosition + '&order=' + $scope.rightSlider.selectedOrder + '&priceLimit=' + $scope.rightSlider.selectedPriceLimit).
                success(function(data, status, headers, config) {
                    angular.forEach(data.result, function(value, key) {
                        //console.log(value.position_id);

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
                    });


                    $scope.rightSlider.playerList = data.result;
                    ////console.log($scope.rightSlider.playerListPositions);
                    $scope.rightSlider.playerSearch = 0;

                }).
                error(function(data, status, headers, config) {
                    console.log('Error: Teams API');
                });
        }




    });