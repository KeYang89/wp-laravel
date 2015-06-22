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
                        <div class="row" style="margin: 0;">
                            <div class="col-xs-12 col-sm-6 col-md-3" ng-repeat="n in [0, 1, 2, 3]">
                                <button class="btn btn-black btn-player-stat-add" ng-if="compare.players[n] === undefined" ng-click="selectPlayer()"><i class="ion-android-person-add"></i></button>
                                <div class="" ng-if="compare.players[n] !== undefined">
                                    <div ng-if="compare.players[n].playerId != null" class="well well-sm ps-player-widget">
                                        <table class="table table-striped tbl-player-stat">
                                            <tbody style="margin: 0; padding: 0;">
                                                <tr style="margin: 0;">
                                                    <td style="margin: 0;" class="cmp-wgt-pname cmp-wgt-pname-<% compare.players[n].widgetId %>"><% compare.players[n].playerName %></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<% compare.players[n].playerPhoto %>" style="width: 100%; height: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td class="cmp-wgt-svalue"><% compare.players[n].teamName %></td>
                                                </tr>
                                                <tr>
                                                    <td class="cmp-wgt-fvalue"><% compare.players[n].leagueName %></td>
                                                </tr>
                                                <tr>
                                                    <td class="cmp-wgt-fvalue"><% compare.players[n].seasonName %></td>
                                                </tr>
                                                <tr>
                                                    <td class="cmp-wgt-sname">GAMES<br /><span class="cmp-wgt-svalue"><% compare.players[n].stat.games %></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cmp-wgt-sname">MINS PLAYED<br /><span class="cmp-wgt-svalue"><% compare.players[n].stat.mins_played %></span></td>
                                                </tr>
                                                <tr>
                                                    <td><a href ng-click="removePlayer(n)"><i class="ion-android-remove-circle cmp-wgt-remove"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body-->
            </section><!-- /.Left col -->
        </div><!-- /.row (main row) -->

        <!-- Control Sidebar -->
        <aside id="tsf" class="control-sidebar control-sidebar-dark">


            <div class="cteam-player-ftr">
                <div class="title">Add player to compare</div>
                <form id="frm-comp-player">
                    <div class="form-group">
                        <label>Player</label>
                        <select id="cmp-player-id" class="form-control rgt-sldr-frm-ipt" data-role="listview">
                            <option value="">Select Player</option>
                            <option ng-repeat="player in player.allPlayers" value="<% player.id %>"><% player.first_name + ' ' + player.last_name %></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>League</label>
                        <select class="form-control rgt-sldr-frm-ipt" id="cmp-league-id" data-role="listview">
                            <option value="">Select League</option>
                            <option ng-repeat="league in player.allLeagues" value="<% league.id %>"><% league.league_name %></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Season</label>
                        <select class="form-control rgt-sldr-frm-ipt" id="cmp-season-id" data-role="listview">
                            <option value="">Select Season</option>
                            <option ng-repeat="season in player.allSeasons" value="<% season.id %>"><% season.season %></option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="form-group row">

                <div class="col-xs-12 col-sm-6" style="text-align: center; margin-top: 6px;"><a href ng-click="addPlayer(player.widgetId);"><input type="submit" class="btn btn-medium" value="Add Player"></a></div>
                <div class="col-xs-12 col-sm-6" style="text-align: center; margin-top: 6px;"><a data-toggle="control-sidebar" href><button class=" btn btn-medium">Hide <i class="fa fa-arrow-circle-right"></i></button></a></div>
            </div>
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
<script src="{{Config::get('app.url')}}/public/js/playerStats.js" type="text/javascript"></script>
@endsection