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

        console.log(JSON.stringify(data.result.team_players));

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
        });
    });
};

$(document).ready(function(){
    loadPitch();
});