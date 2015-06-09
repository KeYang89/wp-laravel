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
                        <div  class="row" style="margin: 0px 10px 10px 10px; height: 400px; background-size: cover; background-image: url('{{Config::get('app.url')}}/public/images/player_{{ $playerData->id }}.jpg');">

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
                            <table id="tbl-gameweek" class="table table-striped">

                                <tr>
                                    <th>Date of birth:</th>
                                    <td>07/01/1991</td>
                                    <th>Height:</th>
                                    <td>1.73 m</td>
                                </tr>

                                <tr>
                                    <th>Age:</th>
                                    <td>24</td>
                                    <th>Weight:</th>
                                    <td>74 kg</td>
                                </tr>

                                <tr>
                                    <th>Country of birth:</th>
                                    <td></td>
                                    <th>National team:</th>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Appearances:</th>
                                    <td>107</td>
                                    <th>Titles won:</th>
                                    <td>-</td>
                                </tr>

                                <tr>
                                    <th>Goals:</th>
                                    <td>37</td>
                                    <th>25-man squad member:</th>
                                    <td>SQUAD</td>
                                </tr>

                                <tr>
                                    <th>Yellow cards:</th>
                                    <td>6</td>
                                    <th>Home grown player:</th>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Red cards:</th>
                                    <td>0</td>
                                    <th></th>
                                    <td></td>
                                </tr>

                            </table>

                        </div><!-- /.box-body-->
                    </div>
                </div>
            </div><!-- /.nav-tabs-custom -->
        </section><!-- right col -->
    </div><!-- /.row (main row) -->
</section><!-- /.content -->
@endsection
