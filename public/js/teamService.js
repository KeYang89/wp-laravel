
var teamService = function(){

    var preload = new createjs.LoadQueue();
    preload.addEventListener("fileload", function(){
        console.log('images loaded');
    });

    preload.loadFile('public/images/pitch.png');
    preload.loadFile('public/images/shirt_0.png');
    preload.loadFile('public/images/shirt_1.png');
    preload.loadFile('public/images/shirt_2.png');
    preload.loadFile('public/images/shirt_3.png');
    preload.loadFile('public/images/shirt_4.png');
    preload.loadFile('public/images/shirt_5.png');
    preload.loadFile('public/images/shirt_6.png');
    preload.loadFile('public/images/shirt_7.png');
    preload.loadFile('public/images/shirt_8.png');
    preload.loadFile('public/images/shirt_10.png');
    preload.loadFile('public/images/shirt_11.png');
    preload.loadFile('public/images/shirt_12.png');
    preload.loadFile('public/images/shirt_13.png');
    preload.loadFile('public/images/shirt_14.png');

    var stage;
    var bgSrc = new Image();
    var bg;
    var centerX = 275; //center of stage
    var centerY = 150;
    var gfxLoaded = 0; //will serve as preloader flag

    var btnSrc = new Image();
    var btn = new Array();
    var players = 1;

    var tshirtOffsets = [5, 26, 45, 64, 85];
    var columnPostions = new Array()
    columnPostions[1] = [45];
    columnPostions[2] = [26, 64];
    columnPostions[3] = [26, 45, 64];
    columnPostions[4] = [5, 26, 64, 85];

    var teamPositions = [1, 4, 4, 2];

    var rowPostions = [0, 24, 51, 75];

    var playerInfoContainer = new Array();
    var playerInfoName = new Array();
    var selectedPlayerId = '';

    var loadPitch = function($scope){

        var ele = angular.element(document.querySelector('#HelloWorld'));
        canvas = ele[0];

        //canvas = document.getElementById('HelloWorld');
        stage = new createjs.Stage(canvas);
        stage.mouseEventsEnabled = true;

        bgSrc.src = 'public/images/pitch.png';
        bgSrc.name = 'bg';
        bgSrc.onload = createjs.loadGfx;
        bg = new createjs.Bitmap(bgSrc);
        bg.y += 10;

        stage.addChild(bg);

        var rowStart = 0;
        var player = 1;

        var container = new createjs.Container();
        container.x = 10;
        container.y = 10;
        container.setBounds(0, 0, 100, 100);

        angular.forEach(teamPositions, function(teamRowValue, teamRowIndex){

            var numPlayers = teamPositions[rowStart];
            var topMargin = rowPostions[rowStart];
            rowStart++;
            angular.forEach(columnPostions[teamRowValue], function(teamColumnValue, teamColumnIndex){

                var playerSelected = 0;
                var showAddPlayer = 1;
                angular.forEach($scope.team.teamPlayers, function(selecyedPlayer, selecyedPlayerIndex){
                    if(selecyedPlayer.playerPosition == player){
                        playerSelected = selecyedPlayer.playerId;
                        //console.log('PlayerSelected ' + player);
                    }
                });

                if(playerSelected != 0)
                {
                    angular.forEach($scope.playerData, function(singlePlayer, singlePlayerIndex){
                        if(singlePlayer.id == playerSelected){
                            var btnSrcSel = new Image();
                            btnSrcSel.src = 'public/images/shirt_'+singlePlayer.teamId+'.png';

                            console.log(btnSrcSel.src);

                            btnSrcSel.name = 'button';
                            btnSrcSel.onload = createjs.loadGfx;
                            btn[player] = new createjs.Bitmap(btnSrcSel);
                            btn[player].shadow = new createjs.Shadow("#303131", 3, 3, 8);

                            var xpos = (stage.canvas.width / 100) * teamColumnValue;
                            var ypos = (stage.canvas.height / 100) * topMargin;

                            btn[player].x = xpos;
                            btn[player].y = ypos;
                            btn[player].scaleX = 0.5;
                            btn[player].scaleY = 0.5;
                            btn[player].id = player;
                            stage.addChild(btn[player]);

                            playerInfoContainer[player] = new createjs.Container();
                            playerInfoContainer[player].x = btn[player].x - 16;
                            playerInfoContainer[player].y = btn[player].y + 70;
                            playerInfoContainer[player].setBounds(0, 0, 80, 22);


                            var rect = new createjs.Shape();
                            //rect.graphics.beginFill('#6e7e8e').drawRect(0, 0, 80, 22);
                            rect.graphics.drawRect(0, 0, 80, 22);
                            playerInfoContainer[player].addChild(rect);

                            playerInfoName[player] = new createjs.Text();
                            playerInfoName[player].set({
                                text: singlePlayer.lastName,
                                color: '#ffffff'
                            });

                            var playerInfoNameBound = playerInfoName[player].getBounds();

                            playerInfoName[player].x = (80 - playerInfoNameBound.width) / 2;
                            playerInfoContainer[player].addChild(playerInfoName[player]);
                            stage.addChild(playerInfoContainer[player]);

                            player++;
                            showAddPlayer = 0;
                        }
                    });
                }

                if(showAddPlayer == 1)
                {
                    console.log(player);

                    btnSrc.src = 'public/images/shirt_0.png';
                    btnSrc.name = 'button';
                    btnSrc.onload = createjs.loadGfx;
                    btn[player] = new createjs.Bitmap(btnSrc);
                    btn[player].shadow = new createjs.Shadow("#303131", 3, 3, 8);

                    var xpos = (stage.canvas.width / 100) * teamColumnValue;
                    var ypos = (stage.canvas.height / 100) * topMargin;

                    btn[player].x = xpos;
                    btn[player].y = ypos;
                    btn[player].scaleX = 0.5;
                    btn[player].scaleY = 0.5;
                    btn[player].id = player;

                    btn[player].on("click", function(){
                        selectedPlayerId = this.id;
                        $scope.openModal();
                        $scope.team.selectedPlayerPosition = selectedPlayerId;
                    }, null, false, {count:3});

                    stage.addChild(btn[player]);
                    player++;
                }

            });
        });

        stage.update();
    };

    var chooseTeamPlayer = function(playerInfo){
        console.log(selectedPlayerId);

        playerInfoContainer[selectedPlayerId] = new createjs.Container();
        playerInfoContainer[selectedPlayerId].x = btn[selectedPlayerId].x - 16;
        playerInfoContainer[selectedPlayerId].y = btn[selectedPlayerId].y + 70;
        playerInfoContainer[selectedPlayerId].setBounds(0, 0, 80, 22);


        var rect = new createjs.Shape();
        //rect.graphics.beginFill('#6e7e8e').drawRect(0, 0, 80, 22);
        rect.graphics.drawRect(0, 0, 80, 22);
        playerInfoContainer[selectedPlayerId].addChild(rect);

        playerInfoName[selectedPlayerId] = new createjs.Text();
        playerInfoName[selectedPlayerId].set({
            text: playerInfo.lastName,
            color: '#ffffff'
        });

        var playerInfoNameBound = playerInfoName[selectedPlayerId].getBounds();

        playerInfoName[selectedPlayerId].x = (80 - playerInfoNameBound.width) / 2;
        playerInfoContainer[selectedPlayerId].addChild(playerInfoName[selectedPlayerId]);
        stage.addChild(playerInfoContainer[selectedPlayerId]);

        var tempPlayerConfig = btn[selectedPlayerId];
        stage.removeChild(btn[selectedPlayerId]);

        var newSrc = new Image();
        newSrc.src = 'public/images/shirt_' + playerInfo.teamId + '.png';
        newSrc.name = 'button';
        newSrc.onload = createjs.loadGfx;
        btn[selectedPlayerId] = new createjs.Bitmap(newSrc);
        btn[selectedPlayerId].shadow = new createjs.Shadow("#303131", 3, 3, 8);
        btn[selectedPlayerId].x = tempPlayerConfig.x;
        btn[selectedPlayerId].y = tempPlayerConfig.y;
        btn[selectedPlayerId].scaleX = tempPlayerConfig.scaleX;
        btn[selectedPlayerId].scaleY = tempPlayerConfig.scaleY;
        btn[selectedPlayerId].id = tempPlayerConfig.id;
        stage.addChild(btn[selectedPlayerId]);

        stage.update();

    };

    return {
        loadPitch           :   loadPitch,
        chooseTeamPlayer    :   chooseTeamPlayer
    };

};

var module = angular.module('starter');
module.factory('teamService', teamService);

//$scope.openModal