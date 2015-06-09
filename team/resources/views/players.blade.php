@extends('app')
@section('title', 'Players')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Players
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
                <div class="tab-content no-padding box box-success">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="field-view" style="position: relative;">
                        <div class="box-header"><h4>Team of the Week</h4></div>
                        <div class="row" style="padding-left: 30px;">

                            <select class="form-control" style="width: 140px;">
                                <option>2014-2015 : 38</option>
                            </select>

                        </div>
                        <div  class="row" style="margin: 20px;">
                            <canvas id="team-field" width="490" height="480" style="display: table; margin: 0 auto;"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- /.nav-tabs-custom -->
        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-4 connectedSortable">
            <!-- Map box -->
            <div class="box box-success">
                <div class="box-header"><h4>Top 5</h4></div>
                <div class="box-body no-padding">
                    <table id="tbl-gameweek" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Club</th>
                            <th>Score</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--*/ $var = 0 /*--}}
                        @foreach ($playersByScore as $topPlayer)
                        {{--*/ $var++ /*--}}
                        <tr>
                            <td style="width: 20px;">{{ $var }}</td>
                            <td><a href="{{ url(Config::get('url.player_profile')) . '/' . $topPlayer->id }}">{{ $topPlayer->first_name }} {{ $topPlayer->last_name }}</a></td>
                            <td>{{ $topPlayer->clubName }}</td>
                            <td>{{ $topPlayer->score }}</td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div><!-- /.box-body-->
            </div>
            <!-- /.box -->

        </section><!-- right col -->

        <section class="col-lg-4 connectedSortable">

            <!-- Map box -->
            <div class="box box-success">
                <div class="box-header"><h4>Top Scorers</h4></div>
                <div class="box-body no-padding">

                    <table id="tbl-gameweek" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Club</th>
                            <th>Score</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--*/ $var = 0 /*--}}
                        @foreach ($playersByGoal as $topPlayer)
                        {{--*/ $var++ /*--}}
                        <tr>
                            <td style="width: 20px;">{{ $var }}</td>
                            <td><a href="{{ url(Config::get('url.player_profile')) . '/' . $topPlayer->id }}">{{ $topPlayer->first_name }} {{ $topPlayer->last_name }}</a></td>
                            <td>{{ $topPlayer->clubName }}</td>
                            <td>{{ $topPlayer->goals }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body-->
            </div>
            <!-- /.box -->
        </section><!-- right col -->
    </div><!-- /.row (main row) -->
</section><!-- /.content -->
@endsection

@section('javascript')
    <script>
        var selectedUserTeamId = "{{$weekTeam->id}}";
    </script>
    <script src="https://code.createjs.com/easeljs-0.8.1.min.js" type="text/javascript"></script>
    <script src="{{Config::get('app.url')}}/public/js/players.js" type="text/javascript"></script>
@endsection