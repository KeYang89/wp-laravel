<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>Team</title>

    <link href="http://code.ionicframework.com/1.0.0/css/ionic.min.css" rel="stylesheet">
    <link href="{{Config::get('app.url')}}/public/css/style.css" rel="stylesheet">

    <!-- IF using Sass (run gulp sass first), then uncomment below and remove the CSS includes above
    <link href="css/ionic.app.css" rel="stylesheet">
    -->

    <!-- ionic/angularjs js -->
    <script src="http://code.ionicframework.com/1.0.0-rc.5/js/ionic.bundle.js"></script>
    

    

    <!-- cordova script (this will be a 404 during development) -->
    <!--<script src="cordova.js"></script>-->

    <!-- your app's js -->
    <script src="https://code.createjs.com/preloadjs-0.6.0.min.js"></script>
    <script src="https://code.createjs.com/easeljs-0.8.0.min.js"></script>
    <script src="{{Config::get('app.url')}}/public/js/app.js"></script>
    <script src="{{Config::get('app.url')}}/public/js/teamController.js"></script>
    

</head>
<body ng-app="starter">
<ion-nav-view></ion-nav-view>

</body>
</html>