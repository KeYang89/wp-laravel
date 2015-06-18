@extends('app')
@section('title', 'Pick Team')
@section('content')
<div id="app" ng-app="PickTeam">
    <div id="controller" ng-controller="MainController">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pick Team
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

        @if (isset($userAllTeams))

        <!-- Main row -->
        <div class="row">
        <!-- Left col -->
        <section class="col-lg-5 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li style="float: left; padding: 6px; font-size: 18px;">{{ $team->team_name }}</li>
                    <li class="active"><a href="#field-view" data-toggle="tab">Pitch View</a></li>
                    <li><a href="#sales-chart" data-toggle="tab">Data View</a></li>
                </ul>
                <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="field-view" style="position: relative;">
                        <div class="row" style="margin-left: 20px;margin-top: 20px; font-size: 16px;">Gameweek Points</div>
                        <div class="row" style="margin-left: 20px;margin-right: 20px;margin-bottom: 20px;">
                            <div class="col-md-3 col-sm-4 col-xs-12 bg-aqua">
                                <span style="font-size: 32px;">{{ $team->team_points }}</span><span style="font-size: 18px;">PTS</span>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-4 col-xs-12 bg-green" style="line-height: 21px;">
                                <div>AVERAGE</div>
                                <span style="font-size: 26px;">37</span><span style="font-size: 14px;">PTS</span>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-4 col-xs-12 bg-yellow" style="line-height: 21px;">
                                <div>HIGHEST</div>
                                <span style="font-size: 26px;">102</span><span style="font-size: 14px;">PTS</span>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div>Rank: {{ $team->team_rank }}</div>
                                <div>Transfers: 0</div>
                            </div><!-- /.col -->
                        </div>

                        <div  class="row" style="margin: 20px;">
                            <canvas id="team-field" width="490" height="480" style="display: table; margin: 0 auto;"></canvas>
                        </div>

                        <div  class="row" style="margin: 20px;">
                            <canvas id="bench-field" width="492" height="102" style="display: table; margin: 0 auto;"></canvas>
                        </div>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative;">

                        <div class="row" style="margin-left: 20px;margin-top: 20px; font-size: 16px;">Gameweek Points</div>
                        <div class="row" style="margin-left: 20px;margin-right: 20px;margin-bottom: 20px;">
                            <div class="col-md-3 col-sm-4 col-xs-12 bg-aqua">
                                <span style="font-size: 32px;">{{ $team->team_points }}</span><span style="font-size: 18px;">PTS</span>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-4 col-xs-12 bg-green" style="line-height: 21px;">
                                <div>AVERAGE</div>
                                <span style="font-size: 26px;">37</span><span style="font-size: 14px;">PTS</span>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-4 col-xs-12 bg-yellow" style="line-height: 21px;">
                                <div>HIGHEST</div>
                                <span style="font-size: 26px;">102</span><span style="font-size: 14px;">PTS</span>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div>Rank: {{ $team->team_rank }}</div>
                                <div>Transfers: 0</div>
                            </div><!-- /.col -->
                        </div>

                        <div class="box-body no-padding">
                            <table id="tbl-gameweek" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Player</th>
                                    <th>Position</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($teamPlayerData as $teamPlayer)
                                <tr>
                                    <td style="width: 20px;"><img src="{{ $teamPlayer['tshirt'] }}" style="width: 20px;" /></td>
                                    <td>{{ $teamPlayer['fullName'] }}</td>
                                    <td>{{ $teamPlayer['position'] }}</td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div><!-- /.box-body-->

                    </div>
                </div>
            </div><!-- /.nav-tabs-custom -->

        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-7 connectedSortable">

            <!-- Map box -->
            <div class="box box-success">
                <div class="box-body"><h4>Saved Teams</h4></div>
                <div class="box-body no-padding">
                    <table id="tbl-gameweek" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Team Name</th>
                            <th>Rank</th>
                            <th>Points</th>
                            <th>Transfers</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($userAllTeams as $allTeam)
                        <tr>
                            <td><a href="{{ url(Config::get('url.pick_team')) . '/' . $allTeam->id }}">{{ $allTeam->team_name }}</a></td>
                            <td>{{ $allTeam->team_rank }}</td>
                            <td>{{ $allTeam->team_points }}</td>
                            <td>0</td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div><!-- /.box-body-->
            </div>
            <!-- /.box -->

            <div class="box box-success">
                <div class="box-header">
                    <h4>Gameweek 38 - 24 May 11:30</h4>
                </div>
                <div class="box-body no-padding">
                    <table id="tbl-gameweek" class="table table-striped">
                        <tbody>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Arsenal</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_1.png" alt="Arsenal"></td>
                            <td>4 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_19.png" alt="West Brom"></td>
                            <td class="mobile-hidden">West Brom</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Aston Villa</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_2.png" alt="Aston Villa"></td>
                            <td>0 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_3.png" alt="Burnley"></td>
                            <td class="mobile-hidden">Burnley</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Crystal Palace</td>
                            <td><img  class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_5.png" alt="Crystal Palace"></td>
                            <td>1 - 0</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_18.png" alt="Swansea"></td>
                            <td class="mobile-hidden">Swansea</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Chelsea</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_4.png" alt="Chelsea"></td>
                            <td>3 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_17.png" alt="Sunderland"></td>
                            <td class="mobile-hidden">Sunderland</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Everton</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_6.png" alt="Everton"></td>
                            <td>0 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_15.png" alt="Spurs"></td>
                            <td class="mobile-hidden">Spurs</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Hull</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_7.png" alt="Hull"></td>
                            <td>0 - 0</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_11.png" alt="Man Utd"></td>
                            <td class="mobile-hidden">Man Utd</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Leicester</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_8.png" alt="Leicester"></td>
                            <td>5 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_13.png" alt="QPR"></td>
                            <td class="mobile-hidden">QPR</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Man City</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_10.png" alt="Man City"></td>
                            <td>2 - 0</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_14.png" alt="Southampton"></td>
                            <td class="mobile-hidden">Southampton</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Newcastle</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_12.png" alt="Newcastle"></td>
                            <td>2 - 0</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_20.png" alt="West Ham"></td>
                            <td class="mobile-hidden">West Ham</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td class="mobile-hidden">Stoke</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_16.png" alt="Stoke"></td>
                            <td>6 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_9.png" alt="Liverpool"></td>
                            <td class="mobile-hidden">Liverpool</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div><!-- /.box-body-->

        </section><!-- right col -->
        </div><!-- /.row (main row) -->

        <div class="modal fade" id="player-info-model" tabindex="-1" role="dialog" aria-labelledby="pinfoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" ng-if="model.playerInfo.loaded == 1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-title"><% model.playerInfo.name %></h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <img src="{{Config::get('app.url')}}/public/images/player_<% model.playerInfo.playerId %>.jpg" style="width: 100%;">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>Date of birth:</td>
                                        <td>07/01/1991</td>
                                    </tr>
                                    <tr>
                                        <td>Height:</td>
                                        <td>1.73 m</td>
                                    </tr>
                                    <tr>
                                        <td>Age:</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td>Weight:</td>
                                        <td>74 kg</td>
                                    </tr>
                                    <tr>
                                        <td>Country of birth:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>National team:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Appearances</td>
                                        <td>107</td>
                                    </tr>
                                    <tr>
                                        <td>Titles won:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Goals:</td>
                                        <td>37</td>
                                    </tr>
                                    <tr>
                                        <td>25-man squad member:</td>
                                        <td>SQUAD</td>
                                    </tr>
                                    <tr>
                                        <td>Yellow cards:</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>Home grown player:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Red cards:</td>
                                        <td>0</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-medium" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <div class="modal-content" ng-if="model.playerInfo.loaded == 0">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-title">Player Info</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="msg-info" style="text-align: center;">Loading..</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-medium" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        @else
        <div class="box" style="text-align: center; padding: 20px;">No teams created yet.</div>
        @endif

        </section><!-- /.content -->
    </div>
</div>
@endsection

@section('javascript')
    @if (isset($userAllTeams))
        <script>
            var selectedUserTeamId = "{{$team->id}}";
        </script>
    <script src="https://code.createjs.com/easeljs-0.8.1.min.js" type="text/javascript"></script>
    <script src="https://code.createjs.com/preloadjs-0.6.1.min.js" type="text/javascript"></script>
    <script src="{{ asset('public/js/preloader.js') }}" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="{{Config::get('app.url')}}/public/js/pickTeam.js" type="text/javascript"></script>
    <script src="{{Config::get('app.url')}}/public/js/pickTeamAnJs.js" type="text/javascript"></script>
    @endif
@endsection
