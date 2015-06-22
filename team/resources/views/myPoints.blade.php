@extends('app')
@section('title', 'My Points')
@section('content')
<div id="app" ng-app="PickTeam">
    <div id="controller" ng-controller="MainController">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                My Points
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
                <div class="box-body"><h4>My Games</h4></div>
                <div class="box-body no-padding">
                    <table id="tbl-gameweek" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Team Name</th>
                            <th>Rank</th>
                            <th>Value</th>
                            <th>Price</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--*/ $arr = [1000, 1500, 2000, 2500, 3000] /*--}}
                        {{--*/ $arrVal = [5, 10, 15, 20, 25, 50] /*--}}
                        @foreach ($userAllTeams as $allTeam)
                        <tr>
                            <td><a href="{{ Config::get('app.url') . Config::get('url.pick_team') . '/' . $allTeam->id }}">{{ $allTeam->team_name }}</a></td>
                            <td>{{ $allTeam->team_rank }}</td>
                            <td>{{ $arrVal[array_rand($arrVal)] }}</td>
                            <td>{{ $arr[array_rand($arr)] }}</td>
                            <td>{{ $allTeam->team_points }}</td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div><!-- /.box-body-->
            </div>
            <!-- /.box -->

            <div class="box box-success">
                <div class="box-header">
                    <h4>Current Games</h4>
                </div>
                <div class="box-body no-padding">

                    <table id="tbl-gameweek" class="table table-striped">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Contest</th>
                            <th>Rank</th>
                            <th>Team</th>
                            <th>Current Points</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($currentGames as $currentGame)
                            <tr>
                                <td>{{$currentGame['userName']}}</td>
                                <td>{{$currentGame['contest']}}</td>
                                <td>{{$currentGame['rank']}}</td>
                                <td>{{$currentGame['team']}}</td>
                                <td>{{$currentGame['points']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.box-body-->
        </section><!-- right col -->
        </div><!-- /.row (main row) -->

        <!-- player info model -->
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
        <!-- player info model -->
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
<script src="{{Config::get('app.url')}}/public/js/pickTeam.js" type="text/javascript"></script>
<script src="{{Config::get('app.url')}}/public/js/pickTeamAnJs.js" type="text/javascript"></script>
@endif
@endsection