// Ionic Starter App, v0.9.20

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
var app = angular.module('starter', ['ionic', 'starter.controllers'])

.run(function($ionicPlatform) {
    $ionicPlatform.ready(function() {
        if(window.StatusBar) {
            StatusBar.styleDefault();
        }
    });

    //teamSelect.loadPitch();






})

.config(function($stateProvider, $urlRouterProvider) {
    $stateProvider

        .state('app', {
            url: "/app",
            templateUrl: "public/templates/menu.html"
            //controller: 'AppCtrl'
        })

        .state('app.home', {
            url: "/home",
            views: {
                'menuContent' :{
                    templateUrl: "public/templates/home.html",
                    controller: 'TeamController'
                }
            }
        })

        .state('app.auction', {
            url: "/auction",
            views: {
                'menuContent' :{
                    templateUrl: "public/templates/auction.html"
                }
            }
        })

        .state('app.ecommerce', {
            url: "/ecommerce",
            views: {
                'menuContent' :{
                    templateUrl: "public/templates/ecommerce.html"
                }
            }
        })

        .state('app.community', {
            url: "/community",
            views: {
                'menuContent' :{
                    templateUrl: "public/templates/community.html"
                }
            }
        })

        .state('app.appstore', {
            url: "/appstore",
            views: {
                'menuContent' :{
                    templateUrl: "public/templates/appstore.html"
                }
            }
        });
    // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/app/home');
});