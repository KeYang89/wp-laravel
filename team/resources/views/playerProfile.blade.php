@extends('app')
@section('title', 'Player Profile')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Player Profile
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
                <div class="tab-content no-padding box box-success">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="field-view" style="position: relative;">
                        <div class="box-header"><h4>{{ $playerData->first_name }} {{ $playerData->last_name }}</h4></div>
                        <div  class="row" style="margin: 0px 10px 10px 10px;">
                            <img src="{{Config::get('app.url')}}/public/images/player_{{ $playerData->id }}.jpg" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div><!-- /.nav-tabs-custom -->

        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-7 connectedSortable">

            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                </ul>
                <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="overview" style="position: relative;">
                        <div class="box-body no-padding">
                            <div class="player-profile-summary">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Date of birth:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">07/01/1991</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Height:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">1.73 m</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Age:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">24</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Weight:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">74 kg</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Country of birth:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">-</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">National team:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">-</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Appearances:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">107</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Titles won:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">-</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Goals:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">37</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">25-man squad member:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">SQUAD</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Yellow cards:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">6</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Home grown player:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">-</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">Red cards:</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">0</div>
                            </div>
                        </div><!-- /.box-body-->
                    </div>
                </div>
            </div><!-- /.nav-tabs-custom -->
        </section><!-- right col -->
    </div><!-- /.row (main row) -->
</section><!-- /.content -->
@endsection
