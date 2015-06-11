@extends('app')
@section('title', 'Create Team')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Create New Team
    </h1>
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

                <div class="row" style="margin: 20px;">
                    <div class="col-xs-10 col-md-6">
                        <div class="row" style="padding: 3px;">Team Name:</div>
                        <div class="row form-group" style="padding: 3px;">
                            <input class="form-control" type="text" placeholder="Team name:" name="team_name" id="team-name" value="" style="font-size: 16px; font-weight: bold;">
                        </div>
                    </div>
                    <div class="col-xs-2 col-md-2">
                        &nbsp;
                    </div>
                    <div class="col-xs-3 col-md-2">
                        <div class="row" style="padding: 3px;">Team Name:</div>
                        <div class="row form-group" style="font-size: 16px; font-weight: bold;padding: 3px;">
                            $100
                        </div>
                    </div>
                    <div class="col-xs-3 col-md-2">
                        <div class="row" style="padding: 3px;">Team Name:</div>
                        <div class="row form-group" style="font-size: 16px; font-weight: bold;padding: 3px;">
                            $50
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
    <table class="table table-striped control-sidebar-striped">
        <tbody>
        {{--*/ $var = 0 /*--}}
        @foreach ($allPlayers as $singlePlayer)
        <tr>
            <td style="width: 18px;"><img src="{{Config::get('app.url')}}/public/images/shirt_{{ $singlePlayer->team_id }}.png" width="18" /></td>
            <td>{{ $singlePlayer->first_name }} {{ $singlePlayer->last_name }}</td>
            <td><a href="javascript:void(0);" onclick="javascript:chooseTeamPlayer('{{ $var }}');" <button class="btn btn-medium pull-right btn-player-select"><i class="fa fa-plus"></i></button></td>
        </tr>
        {{--*/ $var++ /*--}}
        @endforeach
        </tbody>
    </table>

    <div style="margin-top: 10px;"><a data-toggle="control-sidebar" href="#"><button class="pull-left btn btn-medium" style="margin-left: 90px;">Hide <i class="fa fa-arrow-circle-right"></i></button></a></div>

</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->

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
@endsection

@section('javascript')
<script src="https://code.createjs.com/easeljs-0.8.1.min.js" type="text/javascript"></script>
<script src="https://code.createjs.com/preloadjs-0.6.1.min.js" type="text/javascript"></script>
<script src="{{ asset('public/js/preloader.js') }}" type="text/javascript"></script>
<script src="{{Config::get('app.url')}}/public/js/createTeam.js" type="text/javascript"></script>
@endsection