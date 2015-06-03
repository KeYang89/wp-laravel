/**
 * Created by SiD on 22/01/15.
 */

angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, teamSelect) {

        //console.log(teamSelect.loadPitch());

}).controller('TeamCtrl', function($scope, teamSelect) {

        console.log('aaa');


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


        var ele = angular.element(document.querySelector('#HelloWorld'));
        canvas = ele[0];



        //canvas = document.getElementById('HelloWorld');
        stage = new createjs.Stage(canvas);
        //stage.mouseEventsEnabled = true;



        bgSrc.src = 'http://centosserver.com:8000/images/pitch.png';
        bgSrc.name = 'bg';
        bgSrc.onload = createjs.loadGfx;
        bg = new createjs.Bitmap(bgSrc);
        bg.y += 10;

        stage.addChild(bg);


        /*
         var rowStart = 0;
         var player = 1;

         var container = new createjs.Container();
         container.x = 10;
         container.y = 10;
         container.setBounds(0, 0, 100, 100);

         angular.forEach(teamPositions, function(teamRowIndex, teamRowValue){

         var numPlayers = teamPositions[rowStart];
         var topMargin = rowPostions[rowStart];
         rowStart++;
         angular.forEach(columnPostions[teamRowValue], function(teamColumnIndex, teamColumnValue){
         btnSrc.src = 'images/shirt_0.png';
         btnSrc.name = 'button';
         btnSrc.onload = createjs.loadGfx;
         btn[player] = new createjs.Bitmap(btnSrc);
         btn[player].shadow = new createjs.Shadow("#303131", 3, 3, 8);
         //var xpos = (stage.canvas.width / 100) * teamColumnValue;
         //var ypos = (stage.canvas.height / 100) * topMargin;

         var xpos = (stage.canvas.width / 100) * teamColumnValue;
         var ypos = (stage.canvas.height / 100) * topMargin;

         btn[player].x = xpos;
         btn[player].y = ypos;
         btn[player].scaleX = 0.5;
         btn[player].scaleY = 0.5;
         stage.addChild(btn[player]);

         var container = new createjs.Container();
         container.x = xpos - 16;
         container.y = ypos + 70;
         container.setBounds(0, 0, 80, 22);

         var rect = new createjs.Shape();
         //rect.graphics.beginFill('#6e7e8e').drawRect(0, 0, 80, 22);
         rect.graphics.drawRect(0, 0, 80, 22);
         container.addChild(rect);

         var text = new createjs.Text();
         text.set({
         text: 'hello asdasd sasd',
         color: '#ffffff'
         });

         var b = text.getBounds();

         console.log(b.width);

         text.x = (80 - b.width) / 2;
         container.addChild(text);
         stage.addChild(container);

         player++;
         });

         });
         */


        stage.update();


    })