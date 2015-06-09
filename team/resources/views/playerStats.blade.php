@extends('app')
@section('title', 'Comparison Matrix')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Comparison Matrix</h1>
</section>
<!-- Main content -->
<section class="content" ng-app="PlayerStatus">
    <div ng-controller="MainController">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div class="box box-success">
                    <div class="box-header">
                        <h4>Choose the players you want to compare.</h4>
                    </div>
                    <div class="box-body">
                        <div>
                            <div ng-repeat="player in compare.players" class="col-lg-3">
                                <div ng-if="player.playerId != null" class="well well-sm ps-player-widget-<% player.widgetId %>">
                                    <div class="cmp-wgt-row cmp-wgt-pname cmp-wgt-pname-<% player.widgetId %>"><% player.playerName %></div>
                                    <div class="cmp-wgt-row cmp-wgt-tname"><% player.teamName %></div>
                                    <div class="cmp-wgt-ph"><img src="<% player.playerPhoto %>" style="width: 100%; height: 100%;"></div>
                                    <div class="cmp-wgt-row cmp-wgt-lname"><% player.leagueName %></div>
                                    <div class="cmp-wgt-row cmp-wgt-sname"><% player.seasonName %></div>
                                    <div class="cmp-wgt-row cmp-wgt-sname">GAMES</div>
                                    <div class="cmp-wgt-row cmp-wgt-svalue"><% player.stat.games %></div>
                                    <div class="cmp-wgt-row cmp-wgt-sname">MINS PLAYED</div>
                                    <div class="cmp-wgt-row cmp-wgt-svalue"><% player.stat.mins_played %></div>
                                </div>
                            </div>

                            <div ng-if="compare.players.length < 4" class="col-lg-3">
                                <div>
                                    <a href ng-click="selectPlayer();"><button id="save-team" class="btn btn-primary btn-sm btn-flat btn-black">Choose a Player</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body" ng-if="compare.players.length > 0">
                        <table id="tbl-gameweek" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Stat</th>
                                    <th ng-repeat="player in compare.players" style="text-transform: uppercase;" class="cmp-grid-player-<% player.widgetId %>"><% player.playerName %></th>
                                </tr>
                            </thead>

                            <tbody>
                                <!--
                                <tr>
                                    <td>
                                        <select onchange="addStat(1)">
                                            <option value="">Add A Stat</option>
                                            <option ng-repeat="stat in player.gridStats" value="<% stat.id %>"><% stat.name %></option>
                                        </select>
                                    </td>
                                    <th ng-repeat="player in compare.players" class="cmp-grid-player-<% player.widgetId %>">&nbsp;</th>
                                </tr>
                                -->
                                <tr>
                                    <td>Total Score</td>
                                    <td ng-repeat="player in compare.players" class="cmp-grid-player-<% player.widgetId %>"><% player.stat.total_score %></td>
                                </tr>
                                <tr>
                                    <td>Total Passes</td>
                                    <td ng-repeat="player in compare.players" class="cmp-grid-player-<% player.widgetId %>"><% player.stat.total_passes %></td>
                                </tr>
                                <tr>
                                    <td>Total Shots</td>
                                    <td ng-repeat="player in compare.players" class="cmp-grid-player-<% player.widgetId %>"><% player.stat.total_shots %></td>
                                </tr>
                                <tr>
                                    <td>Goals Scored</td>
                                    <td ng-repeat="player in compare.players" class="cmp-grid-player-<% player.widgetId %>"><% player.stat.goals_scored %></td>
                                </tr>
                                <tr>
                                    <td>Saves</td>
                                    <td ng-repeat="player in compare.players" class="cmp-grid-player-<% player.widgetId %>"><% player.stat.saves %></td>
                                </tr>
                                <tr>
                                    <td>Red Cards</td>
                                    <td ng-repeat="player in compare.players" class="cmp-grid-player-<% player.widgetId %>"><% player.stat.red_cards %></td>
                                </tr>
                                <tr>
                                    <td>Yellow Cards</td>
                                    <td ng-repeat="player in compare.players" class="cmp-grid-player-<% player.widgetId %>"><% player.stat.yellow_cards %></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div><!-- /.box-body-->
            </section><!-- /.Left col -->
        </div><!-- /.row (main row) -->

        <!-- Control Sidebar -->
        <aside id="tsf" class="control-sidebar control-sidebar-dark">

            <form id="frm-comp-player" role="form" class="frm-right-slider">
                <div class="form-group">
                    <label for="player" class="lbl-right-slider">Player:</label>
                    <select id="cmp-player-id" class="ipt-right-slider">
                        <option value="">Select Player</option>
                        <option ng-repeat="player in player.allPlayers" value="<% player.id %>"><% player.first_name + ' ' + player.last_name %></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="league" class="lbl-right-slider">League:</label>
                    <select class="ipt-right-slider" id="cmp-league-id">
                        <option value="">Select League</option>
                        <option ng-repeat="league in player.allLeagues" value="<% league.id %>"><% league.league_name %></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="season" class="lbl-right-slider">Season:</label>
                    <select class="ipt-right-slider" id="cmp-season-id">
                        <option value="">Select Season</option>
                        <option ng-repeat="season in player.allSeasons" value="<% season.id %>"><% season.season %></option>
                    </select>
                </div>
                <div class="form-group">
                    <ul style="margin: 0; padding: 0; list-style: none;">
                        <li style="float: left;"><a href ng-click="addPlayer(player.widgetId);"><input type="submit" class="btn btn-default" value="Add Player"></a></li>
                        <li style="float: left; margin-left: 4px;"><a data-toggle="control-sidebar" href><button class="pull-left btn btn-default">Hide <i class="fa fa-arrow-circle-right"></i></button></a></li>
                    </ul>
                </div>
            </form>


        </aside><!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class='control-sidebar-bg'></div>
    </div>
</section><!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="compare-player-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Alert</h4>
            </div>
            <div class="modal-body" id="modal-body">
                Please enter all fields
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="{{Config::get('app.url')}}/public/js/playerStats.js" type="text/javascript"></script>
@endsection