@extends('app')
@section('title', 'Create Team')
@section('content')
<!-- Content Header (Page header) -->

<div id="app" ng-app="CreateTeam">
    <div id="controller" ng-controller="MainController">
        <section class="content-header">
            <h1>Create New Team</h1>
        </section>
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
        <!-- Left col -->
        <section class="col-lg-5 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#field-view" data-toggle="tab">Pitch View</a></li>
                </ul>
                <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="field-view" style="position: relative;">
                        <div class="row" style="margin-left: 20px;margin-right: 20px;margin-bottom: 20px;">
                            <div class="col-md-6 col-sm-6 col-xs-6 bg-aqua" style="line-height: 21px;">
                                <div>Team Budget</div>
                                <span style="font-size: 26px;">$<span ng-bind="team.teamBudget"><% team.teamBudget %></span></span>
                            </div><!-- /.col -->
                            <div class="col-md-6 col-sm-6 col-xs-6 bg-yellow" style="line-height: 21px;">
                                <div>Coach Budget</div>
                                <span style="font-size: 26px;">$<span ng-model="team.coachBudget"><% team.coachBudget %></span></span>
                            </div><!-- /.col -->
                        </div>
                        <div class="row" style="margin: 20px;">
                            <div class="col-sm-12 col-md-6">
                                <div class="row" style="padding: 3px;">Team Name:</div>
                                <div class="row form-group" style="padding: 3px;">
                                    <input class="form-control" type="text" placeholder="Team name:" name="team_name" id="team-name" value="" style="font-size: 16px; font-weight: bold;">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row" style="padding: 3px;">Coach:</div>
                                <div class="row form-group" style="padding: 3px;">
                                    <select class="form-control" id="team-coach">
                                        <option value="">Select Coach</option>
                                        @foreach ($allCoaches as $coach)
                                            <option value="{{ $coach->id }}">{{ $coach->first_name . ' ' . $coach->last_name . ' (' . $coach->price . ')'  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div  class="row" style="margin: 20px;">
                            <canvas id="team-field" width="490" height="480" style="display: table; margin: 0 auto;"></canvas>
                        </div>


                        <div  class="row" style="margin: 20px;">
                            <canvas id="bench-field" width="492" height="102" style="display: table; margin: 0 auto;"></canvas>
                        </div>

                        <div class="row text-center" style="margin: 20px;">
                            <button class="btn btn-primary btn-sm btn-flat btn-black" id="save-team">Save Team</button>
                        </div>

                    </div>
                </div>
            </div><!-- /.nav-tabs-custom -->

        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-7 connectedSortable">

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

            <div class="box box-success">
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                        <tr><th>Club</th><th>Played</th><th>Points</th></tr>
                        </thead>
                        <tbody>
                        <tr class="accent1"><td>
                                Chelsea
                            </td><td>38</td><td>87</td></tr><tr><td>
                                Man City
                            </td><td>38</td><td>79</td></tr><tr><td>
                                Arsenal
                            </td><td>38</td><td>75</td></tr><tr><td>
                                Man Utd
                            </td><td>38</td><td>70</td></tr><tr><td>
                                Spurs
                            </td><td>38</td><td>64</td></tr><tr><td>
                                Liverpool
                            </td><td>38</td><td>62</td></tr><tr><td>
                                Southampton
                            </td><td>38</td><td>60</td></tr><tr><td>
                                Swansea
                            </td><td>38</td><td>56</td></tr><tr><td>
                                Stoke
                            </td><td>38</td><td>54</td></tr><tr><td>
                                Crystal Palace
                            </td><td>38</td><td>48</td></tr><tr><td>
                                Everton
                            </td><td>38</td><td>47</td></tr><tr><td>
                                West Ham
                            </td><td>38</td><td>47</td></tr><tr><td>
                                West Brom
                            </td><td>38</td><td>44</td></tr><tr><td>
                                Leicester
                            </td><td>38</td><td>41</td></tr><tr><td>
                                Newcastle
                            </td><td>38</td><td>39</td></tr><tr><td>
                                Sunderland
                            </td><td>38</td><td>38</td></tr><tr><td>
                                Aston Villa
                            </td><td>38</td><td>38</td></tr><tr><td>
                                Hull
                            </td><td>38</td><td>35</td></tr><tr><td>
                                Burnley
                            </td><td>38</td><td>33</td></tr><tr><td>
                                QPR
                            </td><td>38</td><td>30</td></tr></tbody></table>

                </div><!-- /.box-body-->
            </div>
            <!-- /.box -->

        </section><!-- right col -->
        </div><!-- /.row (main row) -->

        </section><!-- /.content -->


        <!-- Control Sidebar -->
        <aside id="tsf" class="control-sidebar control-sidebar-dark">

            <div class="cteam-player-ftr">
                <div class="title">Player Filters</div>
                <form id="frm-cteam-plr-ftr">
                    <div class="form-group">
                        <label>View</label>
                        <select class="form-control rgt-sldr-frm-ipt" ng-model="rightSlider.selectedPosition" data-role="listview" ng-change="getPlayers()">
                            <option value="">All Players</option>
                            @foreach ($allPositions as $singlePosition)
                                <option value="{{ $singlePosition->id }}">{{ $singlePosition->position }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sorted by</label>
                        <select class="form-control rgt-sldr-frm-ipt" ng-model="rightSlider.selectedOrder" data-role="listview" ng-change="getPlayers()">
                            <option value="first_name">Player Name</option>
                            <option value="price">Price</option>
                            <option value="score">Total Score</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>With a maximum price of</label>
                        <select class="form-control rgt-sldr-frm-ipt" ng-model="rightSlider.selectedPriceLimit" data-role="listview" ng-change="getPlayers()">
                            <option value="">Unlimited</option>
                            <option value="6">6</option>
                            <option value="8">8</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="cteam-player-msg msg-info" ng-if="rightSlider.playerSearch == 1">
                Searching...
            </div>
            <div ng-if="rightSlider.playerSearch == 0">
                <div class="cteam-player-msg msg-error" ng-if="rightSlider.playerList.length <= 0">
                    No players found
                </div>
                <div ng-if="rightSlider.playerList.length > 0">
                    <table class="cteam-player-list">
                        <thead ng-if="rightSlider.goalkeepers.length > 0">
                            <tr>
                                <th>Goalkeepers</th>
                                <th>$</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="player in rightSlider.goalkeepers" ng-if="rightSlider.goalkeepers.length > 0">
                                <td><a href="javascript:void(0);" data-id="<% player.id %>" class="lnk-blue view-player"><% player.name %></a></td>
                                <td><% player.price %></td>
                                <td><% player.score %></td>
                                <td><a href="javascript:void(0);" data-id="<% player.id %>" class="add-player"><button class="btn btn-black pull-right btn-player-select"><i class="fa fa-plus"></i></button></a></td>
                            </tr>
                        </tbody>
                        <thead ng-if="rightSlider.diffenders.length > 0">
                            <tr>
                                <th>Diffenders</th>
                                <th>$</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="player in rightSlider.diffenders" ng-if="rightSlider.diffenders.length > 0">
                                <td><a href="javascript:void(0);" data-id="<% player.id %>" class="lnk-blue view-player"><% player.name %></a></td>
                                <td><% player.price %></td>
                                <td><% player.score %></td>
                                <td><a href="javascript:void(0);" data-id="<% player.id %>" class="add-player"><button class="btn btn-black pull-right btn-player-select"><i class="fa fa-plus"></i></button></a></td>
                            </tr>
                        </tbody>
                        <thead ng-if="rightSlider.midfielders.length > 0">
                            <tr>
                                <th>Midfielders</th>
                                <th>$</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="player in rightSlider.midfielders" ng-if="rightSlider.midfielders.length > 0">
                                <td><a href="javascript:void(0);" data-id="<% player.id %>" class="lnk-blue view-player"><% player.name %></a></td>
                                <td><% player.price %></td>
                                <td><% player.score %></td>
                                <td><a href="javascript:void(0);" data-id="<% player.id %>" class="add-player"><button class="btn btn-black pull-right btn-player-select"><i class="fa fa-plus"></i></button></a></td>
                            </tr>
                        </tbody>
                        <thead ng-if="rightSlider.forward.length > 0">
                            <tr>
                                <th>Forwards</th>
                                <th>$</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="player in rightSlider.forward" ng-if="rightSlider.forward.length > 0">
                                <td><a href="javascript:void(0);" data-id="<% player.id %>" class="lnk-blue view-player"><% player.name %></a></td>
                                <td><% player.price %></td>
                                <td><% player.score %></td>
                                <td><a href="javascript:void(0);" data-id="<% player.id %>" class="add-player"><button class="btn btn-black pull-right btn-player-select"><i class="fa fa-plus"></i></button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="margin-top: 10px;"><a data-toggle="control-sidebar" href="#"><button class="pull-left btn btn-medium" style="margin-left: 90px;">Hide <i class="fa fa-arrow-circle-right"></i></button></a></div>

        </aside><!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class='control-sidebar-bg'></div>
        <!-- Modal -->
        <div class="modal fade" id="create-team-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-title">Alert</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        Please select players for all positions before save.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-medium" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmation-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-title">Confirm</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        Remove this player?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-medium" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-medium" id="confirmed">Yes</button>
                    </div>
                </div>
            </div>
        </div>
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

    </div>
</div>
@endsection

@section('javascript')
<script src="https://code.createjs.com/easeljs-0.8.1.min.js" type="text/javascript"></script>
<script src="https://code.createjs.com/preloadjs-0.6.1.min.js" type="text/javascript"></script>
<script src="{{ asset('public/js/preloader.js') }}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="{{Config::get('app.url')}}/public/js/createTeam.js" type="text/javascript"></script>
<script src="{{Config::get('app.url')}}/public/js/createTeamAnJs.js" type="text/javascript"></script>
@endsection