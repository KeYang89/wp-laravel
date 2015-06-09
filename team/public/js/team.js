/**
 * Created by SiD on 21/05/15.
 */

var canvas;
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
var selectedPlayer = '';

function init(){

    console.log('aaa');

    canvas = document.getElementById('HelloWorld');
    stage = new createjs.Stage(canvas);
    stage.mouseEventsEnabled = true;

    bgSrc.src = '/images/pitch.png';
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

    //player data
    var playerData = new Array();
    for(var j = 1; j <= 11; j++)
    {
        playerData[j] = {name: 'aaa', tshirt: '/images/shirt_0.png'};
    }

    $.each(teamPositions, function(teamRowIndex, teamRowValue){

        var numPlayers = teamPositions[rowStart];
        var topMargin = rowPostions[rowStart];
        rowStart++;
        $.each(columnPostions[teamRowValue], function(teamColumnIndex, teamColumnValue){
            btnSrc.src = playerData[player].tshirt;
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
            //btn[player].addEventListener('click', onPlayerClick);
            btn[player].on("click", onPlayerClick, null, false, {count:3});
            stage.addChild(btn[player]);

            playerInfoContainer[player] = new createjs.Container();
            playerInfoContainer[player].x = xpos - 16;
            playerInfoContainer[player].y = ypos + 70;
            playerInfoContainer[player].setBounds(0, 0, 80, 22);

            if(playerData[player].name != '')
            {
                var rect = new createjs.Shape();
                //rect.graphics.beginFill('#6e7e8e').drawRect(0, 0, 80, 22);
                rect.graphics.drawRect(0, 0, 80, 22);
                playerInfoContainer[player].addChild(rect);

                playerInfoName[player] = new createjs.Text();
                playerInfoName[player].set({
                    text: playerData[player].name,
                    color: '#ffffff'
                });

                var playerInfoNameBound = playerInfoName[player].getBounds();

                playerInfoName[player].x = (80 - playerInfoNameBound.width) / 2;
                playerInfoContainer[player].addChild(playerInfoName[player]);
                stage.addChild(playerInfoContainer[player]);
            }


            player++;
        });

    });

    /*
    while(players <= 2){
        btnSrc.src = 'images/shirt_0.png';
        btnSrc.name = 'button';
        btnSrc.onload = createjs.loadGfx;
        btn = new createjs.Bitmap(btnSrc);
        //var resizedTshirtWidth = (btnSrc.width / 2);

        var xpos = (stage.canvas.width / 100) * 45;
        var ypos = (stage.canvas.height / 100) * 75;

        //console.log(resizedTshirtWidth);
        btn.x = xpos;
        btn.y = ypos;
        btn.scaleX = 0.5;
        btn.scaleY = 0.5;

        players++;

        //console.log(column);

    }
    */




    //var redFilter = new createjs.ColorFilter(10,10,10,110);
    //btn.filters = [redFilter];

    //stage.addChild(bg);
    stage.update();

    //btn.addEventListener('click', onPlayerClick);



    console.log();
}

function onPlayerClick(event){
    /*
    var playerId = this.id;
    var newSrc = new Image();
    newSrc.src = '/images/shirt_14.png';
    newSrc.name = 'button';
    newSrc.onload = createjs.loadGfx;
    btn[playerId] = new createjs.Bitmap(newSrc);
    btn[playerId].shadow = new createjs.Shadow("#303131", 3, 3, 8);
    btn[playerId].x = this.x;
    btn[playerId].y = this.y;
    btn[playerId].scaleX = 0.5;
    btn[playerId].scaleY = 0.5;
    btn[playerId].id = playerId;

    stage.addChild(btn[playerId]);
    stage.removeChild(this);
    stage.update();

    console.log(playerInfoContainer[playerId].x);
    */

    selectedPlayer = this.id;
    console.log(selectedPlayer);

    loadSlider();
}

function selectPlayer(name, tshirtId){
    console.log(name);
}