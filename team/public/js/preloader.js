/**
 * Created by SiD on 03/06/15.
 */

$(document).ready(function(){
    var preload = new createjs.LoadQueue();
    preload.addEventListener("fileload", function(){
        //console.log('images loaded');
    });

    preload.loadFile('/team/public/images/pitch.png');
    preload.loadFile('/team/public/images/shirt_0.png');
    preload.loadFile('/team/public/images/shirt_1.png');
    preload.loadFile('/team/public/images/shirt_2.png');
    preload.loadFile('/team/public/images/shirt_3.png');
    preload.loadFile('/team/public/images/shirt_4.png');
    preload.loadFile('/team/public/images/shirt_5.png');
    preload.loadFile('/team/public/images/shirt_6.png');
    preload.loadFile('/team/public/images/shirt_7.png');
    preload.loadFile('/team/public/images/shirt_8.png');
    preload.loadFile('/team/public/images/shirt_10.png');
    preload.loadFile('/team/public/images/shirt_11.png');
    preload.loadFile('/team/public/images/shirt_12.png');
    preload.loadFile('/team/public/images/shirt_13.png');
    preload.loadFile('/team/public/images/shirt_14.png');
});

