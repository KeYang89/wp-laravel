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
var playerInfoIcon = new Array();
var selectedPlayerPosition = '';

var teamName = '';
var teamPlayers = [];
var playerData = [];

/* for bench */
var bnhStage;
var bnhBgSrc = new Image();
var bnhBg;

var subInfoContainer = new Array();
var subInfoName = new Array();
var selectedPlayerData = '';


var loadPitch = function()
{
    var canvas = document.getElementById('team-field');

    //canvas = document.getElementById('HelloWorld');
    stage = new createjs.Stage(canvas);
    stage.mouseEventsEnabled = true;

    bgSrc.src = appUrl + '/public/images/pitch.png';
    bgSrc.name = 'bg';
    bgSrc.onload = createjs.loadGfx;
    bg = new createjs.Bitmap(bgSrc);

    bg.image.onload = function() { stage.update(); }

    bg.y += 10;

    stage.addChild(bg);

    var rowStart = 0;
    var player = 1;

    var container = new createjs.Container();
    container.x = 10;
    container.y = 10;
    container.setBounds(0, 0, 100, 100);

    $.getJSON('/team/api/v1/getUserTeam/' + selectedUserTeamId, function(data){

        //console.log(JSON.stringify(data.result.team_players));

        if(data.result.team_name != '')
        {
            teamName = data.result.team_name;
        }
        if(data.result.team_players != '')
        {
            $.each(data.result.team_players, function(key, value){
                teamPlayers.push({
                    playerPosition  :   value.playerPosition,
                    playerId        :   value.playerId
                });
                //console.log(value.playerPosition);
            });
        }

        $.getJSON('/team/api/v1/getAllPlayers', function(data){
            if(data.result != '')
            {
                console.log('got');
                $.each(data.result, function(playerIndex, playerValue){
                    playerData.push({id: playerValue.id, firstName: playerValue.first_name, lastName: playerValue.last_name, teamId: playerValue.team_id});
                    console.log(playerValue.id);
                });
            }

            $.each(teamPositions, function(teamRowIndex, teamRowValue){
                var numPlayers = teamPositions[rowStart];
                var topMargin = rowPostions[rowStart];
                rowStart++;
                $.each(columnPostions[teamRowValue], function(teamColumnIndex, teamColumnValue){

                    var playerSelected = 0;
                    var showAddPlayer = 1;
                    $.each(teamPlayers, function(selecyedPlayerIndex, selecyedPlayer){
                        if(selecyedPlayer.playerPosition == player){
                            playerSelected = selecyedPlayer.playerId;
                            //console.log('PlayerSelected ' + player);
                        }
                    });

                    if(playerSelected != 0)
                    {
                        $.each(playerData, function(singlePlayerIndex, singlePlayer)
                        {
                            if(singlePlayer.id == playerSelected)
                            {
                                var btnSrcSel = new Image();
                                btnSrcSel.src = appUrl + '/public/images/shirt_'+singlePlayer.teamId+'.png';

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
                                btn[player].image.onload = function(){
                                    stage.update();
                                }
                                stage.addChild(btn[player]);

                                playerInfoContainer[player] = new createjs.Container();
                                playerInfoContainer[player].x = btn[player].x - 16;
                                playerInfoContainer[player].y = btn[player].y + 70;
                                playerInfoContainer[player].setBounds(0, 0, 80, 22);


                                var rect = new createjs.Shape();
                                //rect.graphics.beginFill('#6e7e8e').drawRect(0, 0, 80, 22);
                                rect.graphics.drawRect(0, 0, 80, 22);
                                playerInfoContainer[player].addChild(rect);


                                /* info box */
                                var infoIconSrc = new Image();
                                infoIconSrc.src = '/team/public/images/info.png';
                                console.log(infoIconSrc.src);
                                infoIconSrc.name = 'button';
                                infoIconSrc.onload = createjs.loadGfx;
                                playerInfoIcon[player] = new createjs.Bitmap(infoIconSrc);
                                playerInfoIcon[player].image.onload = function(){
                                    bnhStage.update();
                                }

                                playerInfoIcon[player].x = (80 - 12) / 2;
                                playerInfoIcon[player].y = 0;
                                playerInfoIcon[player].scaleX = 0.7;
                                playerInfoIcon[player].scaleY = 0.7;
                                playerInfoIcon[player].on("click", function()
                                {
                                    angular.element('#controller').scope().loadPlayerInfo(player);

                                }, null, false, {count:3});

                                playerInfoContainer[player].addChild(playerInfoIcon[player]);
                                /* info box */


                                playerInfoName[player] = new createjs.Text();
                                playerInfoName[player].set({
                                    text: singlePlayer.lastName,
                                    color: '#ffffff'
                                });

                                var playerInfoNameBound = playerInfoName[player].getBounds();

                                playerInfoName[player].x = (80 - playerInfoNameBound.width) / 2;
                                playerInfoName[player].y = 12;
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
                        var btnSrc = new Image();
                        btnSrc.src = appUrl + '/public/images/shirt_0.png';
                        btnSrc.name = 'button';
                        btnSrc.onload = createjs.loadGfx;
                        btn[player] = new createjs.Bitmap(btnSrc);
                        btn[player].shadow = new createjs.Shadow("#303131", 3, 3, 8);
                        btn[player].image.onload = function() { stage.update(); }

                        var xpos = (stage.canvas.width / 100) * teamColumnValue;
                        var ypos = (stage.canvas.height / 100) * topMargin;

                        btn[player].x = xpos;
                        btn[player].y = ypos;
                        btn[player].scaleX = 0.5;
                        btn[player].scaleY = 0.5;
                        btn[player].id = player;
                        btn[player].image.onload = function(){
                            stage.update();
                        }

                        btn[player].on("click", function(){
                            selectedPlayerPosition = this.id;
                            //$('.control-sidebar-bg').collapse('toggle');

                            $('#tsf').addClass('control-sidebar-open');
                            //$('#tsf').collapse('toggle');

                        }, null, false, {count:3});

                        stage.addChild(btn[player]);
                        player++;
                    }

                });
            });
            stage.update();

            /* bench section */

            var canvas = document.getElementById('bench-field');
            bnhStage = new createjs.Stage(canvas);
            bnhStage.mouseEventsEnabled = true;

            bnhBgSrc.src = appUrl + '/public/images/bench.png';
            bnhBgSrc.name = 'bg';
            bnhBgSrc.onload = createjs.loadGfx;
            bnhBg = new createjs.Bitmap(bnhBgSrc);

            bnhBg.image.onload = function(){
                bnhStage.update();
            }
            bnhBg.y = 40;
            bnhStage.addChild(bnhBg);

            for(var i = 12; i <= 15; i++)
            {
                var showAddPlayer = 1;
                $.each(teamPlayers, function(selecyedPlayerIndex, selecyedPlayer)
                {
                    if(selecyedPlayer.playerPosition == i)
                    {
                        $.each(playerData, function(singlePlayerIndex, singlePlayer)
                        {
                            if(singlePlayer.id == selecyedPlayer.playerId)
                            {
                                showAddPlayer = 0;
                                selectedPlayerData = singlePlayer;
                            }
                        });
                    }
                });

                var subPlayer = i;
                var positionIndex = i - 11;
                if(subPlayer > 12)
                {
                    positionIndex++;
                }

                if(showAddPlayer == 1)
                {
                    var btnSrc = new Image();
                    btnSrc.src = appUrl + '/public/images/shirt_0.png';
                    btnSrc.name = 'button';
                    btnSrc.onload = createjs.loadGfx;
                    btn[subPlayer] = new createjs.Bitmap(btnSrc);
                    btn[subPlayer].on("click", function()
                    {
                        selectedPlayerPosition = this.id;
                        $('#tsf').addClass('control-sidebar-open');

                    }, null, false, {count:3});
                    btn[subPlayer].shadow = new createjs.Shadow("#303131", 3, 3, 8);
                    btn[subPlayer].image.onload = function(){
                        bnhStage.update();
                    }
                    var xpos = ((bnhStage.canvas.width / 5) * positionIndex) - 70;
                    console.log(xpos);
                    var ypos = 0;
                    btn[subPlayer].x = xpos;
                    btn[subPlayer].y = ypos;
                    btn[subPlayer].scaleX = 0.5;
                    btn[subPlayer].scaleY = 0.5;
                    btn[subPlayer].id = subPlayer;
                    btn[subPlayer].image.onload = function(){
                        bnhStage.update();
                    }
                    bnhStage.addChild(btn[subPlayer]);
                    //bnhStage.update();
                    console.log('image for ' + subPlayer);

                }
                else
                {
                    var btnSrc = new Image();
                    btnSrc.src = appUrl + '/public/images/shirt_' + selectedPlayerData.teamId + '.png';
                    console.log(btnSrc.src);
                    btnSrc.name = 'button';
                    btnSrc.onload = createjs.loadGfx;
                    btn[subPlayer] = new createjs.Bitmap(btnSrc);
                    btn[subPlayer].shadow = new createjs.Shadow("#303131", 3, 3, 8);
                    btn[subPlayer].image.onload = function(){
                        bnhStage.update();
                    }
                    var xpos = ((bnhStage.canvas.width / 5) * positionIndex) - 70;
                    var ypos = 0;
                    btn[subPlayer].x = xpos;
                    btn[subPlayer].y = ypos;
                    btn[subPlayer].scaleX = 0.5;
                    btn[subPlayer].scaleY = 0.5;
                    btn[subPlayer].id = subPlayer;
                    btn[subPlayer].image.onload = function(){
                        bnhStage.update();
                    }
                    bnhStage.addChild(btn[subPlayer]);

                    subInfoContainer[subPlayer] = new createjs.Container();
                    subInfoContainer[subPlayer].x = btn[subPlayer].x - 16;
                    subInfoContainer[subPlayer].y = btn[subPlayer].y + 70;
                    subInfoContainer[subPlayer].setBounds(0, 0, 80, 22);

                    var rect = new createjs.Shape();
                    //rect.graphics.beginFill('#6e7e8e').drawRect(0, 0, 80, 22);
                    rect.graphics.drawRect(0, 0, 80, 22);
                    subInfoContainer[subPlayer].addChild(rect);

                    /* info box */
                    var infoIconSrc = new Image();
                    infoIconSrc.src = '/team/public/images/info.png';
                    console.log(infoIconSrc.src);
                    infoIconSrc.name = 'button';
                    infoIconSrc.onload = createjs.loadGfx;
                    playerInfoIcon[subPlayer] = new createjs.Bitmap(infoIconSrc);
                    playerInfoIcon[subPlayer].image.onload = function(){
                        bnhStage.update();
                    }

                    playerInfoIcon[subPlayer].x = (80 - 12) / 2;
                    playerInfoIcon[subPlayer].y = 0;
                    playerInfoIcon[subPlayer].scaleX = 0.7;
                    playerInfoIcon[subPlayer].scaleY = 0.7;
                    playerInfoIcon[subPlayer].on("click", function()
                    {
                        angular.element('#controller').scope().loadPlayerInfo(subPlayer);

                    }, null, false, {count:3});

                    subInfoContainer[subPlayer].addChild(playerInfoIcon[subPlayer]);
                    /* info box */

                    subInfoName[subPlayer] = new createjs.Text();
                    subInfoName[subPlayer].set({
                        text: selectedPlayerData.lastName,
                        color: '#ffffff'
                    });

                    var subInfoNameBound = subInfoName[subPlayer].getBounds();

                    subInfoName[subPlayer].x = (80 - subInfoNameBound.width) / 2;
                    subInfoName[subPlayer].y = 12;
                    subInfoContainer[subPlayer].addChild(subInfoName[subPlayer]);
                    bnhStage.addChild(subInfoContainer[subPlayer]);
                    //bnhStage.update();
                }
            }
            bnhStage.update();
        });
    });
};

var chooseTeamPlayer = function(index){
    console.log(selectedPlayerPosition);

    var playerInfo = playerData[index];

    teamPlayers.push({
                        playerPosition  :   selectedPlayerPosition,
                        playerId        :   playerData[index].id
                    });


    playerInfoContainer[selectedPlayerPosition] = new createjs.Container();
    playerInfoContainer[selectedPlayerPosition].x = btn[selectedPlayerPosition].x - 16;
    playerInfoContainer[selectedPlayerPosition].y = btn[selectedPlayerPosition].y + 70;
    playerInfoContainer[selectedPlayerPosition].setBounds(0, 0, 80, 22);


    var rect = new createjs.Shape();
    //rect.graphics.beginFill('#6e7e8e').drawRect(0, 0, 80, 22);
    rect.graphics.drawRect(0, 0, 80, 22);
    playerInfoContainer[selectedPlayerPosition].addChild(rect);

    playerInfoName[selectedPlayerPosition] = new createjs.Text();
    playerInfoName[selectedPlayerPosition].set({
        text: playerInfo.lastName,
        color: '#ffffff'
    });

    var playerInfoNameBound = playerInfoName[selectedPlayerPosition].getBounds();

    playerInfoName[selectedPlayerPosition].x = (80 - playerInfoNameBound.width) / 2;
    playerInfoContainer[selectedPlayerPosition].addChild(playerInfoName[selectedPlayerPosition]);

    if(selectedPlayerPosition <= 11)
    {
        stage.addChild(playerInfoContainer[selectedPlayerPosition]);
        var tempPlayerConfig = btn[selectedPlayerPosition];
        stage.removeChild(btn[selectedPlayerPosition]);
    }
    else
    {
        bnhStage.addChild(playerInfoContainer[selectedPlayerPosition]);
        var tempPlayerConfig = btn[selectedPlayerPosition];
        bnhStage.removeChild(btn[selectedPlayerPosition]);
    }

    var newSrc = new Image();
    newSrc.src = '/team/public/images/shirt_' + playerInfo.teamId + '.png';
    newSrc.name = 'button';
    newSrc.onload = createjs.loadGfx;
    btn[selectedPlayerPosition] = new createjs.Bitmap(newSrc);
    if(selectedPlayerPosition <= 11)
    {
        btn[selectedPlayerPosition].image.onload = function() { stage.update(); }
    }
    else
    {
        btn[selectedPlayerPosition].image.onload = function() { bnhStage.update(); }
    }
    btn[selectedPlayerPosition].shadow = new createjs.Shadow("#303131", 3, 3, 8);
    btn[selectedPlayerPosition].x = tempPlayerConfig.x;
    btn[selectedPlayerPosition].y = tempPlayerConfig.y;
    btn[selectedPlayerPosition].scaleX = tempPlayerConfig.scaleX;
    btn[selectedPlayerPosition].scaleY = tempPlayerConfig.scaleY;
    btn[selectedPlayerPosition].id = tempPlayerConfig.id;

    if(selectedPlayerPosition <= 11)
    {
        stage.addChild(btn[selectedPlayerPosition]);
        stage.update();
    }
    else
    {
        bnhStage.addChild(btn[selectedPlayerPosition]);
        bnhStage.update();
    }



    $('#tsf').removeClass('control-sidebar-open');
    selectedPlayerPosition = '';

};

var saveTeamBasic = function (){
    var dataObj = {
        teamName    :   $('#team-name').val(),
        teamPlayers :   teamPlayers
    };

    $.post('/team/api/v1/saveTeam', dataObj, function(r){
        //console.log(r.result);
        $("#confirm-model").modal('show');
    });
};

$(document).ready(function(){
    loadPitch();
})