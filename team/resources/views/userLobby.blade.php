@extends('app')
@section('title', 'Lobby')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lobby
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success" style="min-height: 800px;">
                <div class="box-header">
                    <h3 class="box-title">&nbsp;</h3>

                    <div class="box-tools pull-right">
                        <a data-toggle="control-sidebar" style="font-size: 32px; color: #3F8313;  line-height: 46px;" class="button button-icon icon ion-search" href></a>
                    </div>

                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table id="tbl-lobby" class="table table-striped">
                        <thead>
                        <tr>
                            <th class="no-sort"></th>
                            <th>Contest</th>
                            <th class="no-sort">&nbsp;</th>
                            <th>Entries</th>
                            <th>Size</th>
                            <th>Entry</th>
                            <th>Prizes</th>
                            <th class="no-sort">Start (ET)</th>
                            <th class="no-sort">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>

                        {{--*/ $var = 0 /*--}}

                        @foreach ($contests as $contest)

                        {{--*/ $var++ /*--}}

                        <tr>
                            <td style="width: 10px;">{{ $var }}</td>
                            <td>
                                <img class="grid-icon" src="{{Config::get('app.url')}}/public/images/icon_ball.png" style="margin-right: 4px;"><a href="javascript:void(0);" class="lnk-blue">{{ $contest->contest }}</a></td>
                            <td>
                                @if($contest->multi_entry == '1')
                                <img class="grid-icon" src="{{Config::get('app.url')}}/public/images/icon_multi_entry.png">
                                @endif
                                @if($contest->prize_guaranteed == '1')
                                <img class="grid-icon" src="{{Config::get('app.url')}}/public/images/icon_prize_guranteed.png">
                                @endif
                            </td>
                            <td><a href="javascript:void(0);" class="lnk-blue">{{ $contest->entries }}</a></td>
                            <td>{{ $contest->size }}</td>
                            <td>{{ $contest->entry_fee }}</td>
                            <td><a href="javascript:void(0);" class="lnk-blue">{{ $contest->prize }}</a></td>
                            <td>{{ $contest->f_start_time }}</td>
                            <td>
                                <button class="btn btn-default btn-green btn-enter btn-black" type="button">Enter</button>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.Left col -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">

<div class="row" style="margin: 10px;">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search all contests..." id="search-keyword" value="@if(!empty($input['keyword'])){{$input['keyword']}}@endif">
                <span class="input-group-btn">
                    <button class="btn-filter btn btn-medium" type="button" id="btn-search">Go!</button>
                </span>
    </div><!-- /input-group -->
</div><!-- /.row -->


<div class="row" style="margin: 10px; margin-top: 30px;">

    <div aria-label="Toolbar with button groups" role="toolbar" class="btn-toolbar">

        <div aria-label="First group" role="group" class="btn-group" style="width: 98%;">
            <a href="{{ Config::get('app.url') }}/server.php/lobby/?allarea=true{{ $url_string['area'] }}">
                <button class="btn-filter btn btn-medium

                            @if(empty($input['area']))
                                active
                            @endif

                        " type="button" style="width: 100%;">Supported Leagues</button>
            </a>
        </div>

        <div aria-label="First group" role="group" class="btn-group" style="width: 48%; margin-top: 10px;">
            <a href="{{ Config::get('app.url') }}/server.php/lobby/?area=spain{{ $url_string['area'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['area']))
                                @if($input['area'] == 'spain')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">La Liga</button>
            </a>
        </div>
        <div aria-label="Second group" role="group" class="btn-group" style="width: 47%; margin-top: 10px;">
            <a href="{{ Config::get('app.url') }}/server.php/lobby/?area=uk{{ $url_string['area'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['area']))
                                @if($input['area'] == 'uk')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">EPL</button>
            </a>
        </div>

        <!--
        <div aria-label="First group" role="group" class="btn-group" style="width: 48%; margin-top: 10px;">
            <a href="{{ Config::get('app.url') }}/server.php/lobby/?area=italy{{ $url_string['area'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['area']))
                                @if($input['area'] == 'italy')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">Serie A</button>
            </a>
        </div>
        -->
        <div aria-label="Second group" role="group" class="btn-group" style="width: 47%; margin-top: 10px;">
            <a href="{{ Config::get('app.url') }}/server.php/lobby/?area=mls{{ $url_string['area'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['area']))
                                @if($input['area'] == 'mls')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">MLS</button>
            </a>
        </div>


        <div aria-label="First group" role="group" class="btn-group" style="width: 48%; margin-top: 10px;">
            <a href="{{ Config::get('app.url') }}/server.php/lobby/?area=cl{{ $url_string['area'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['area']))
                                @if($input['area'] == 'cl')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">CL</button>
            </a>
        </div>
        <!--
        <div aria-label="Second group" role="group" class="btn-group" style="width: 47%; margin-top: 10px;">
            <a href="{{ Config::get('app.url') }}/server.php/lobby/?area=germany{{ $url_string['area'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['area']))
                                @if($input['area'] == 'germany')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">GFL</button>
            </a>
        </div>
        -->

    </div>

</div>


<div class="row" style="margin: 10px; margin-top: 30px;">

    <div aria-label="Toolbar with button groups" role="toolbar" class="btn-toolbar">

        <div aria-label="First group" role="group" class="btn-group" style="width: 98%; margin-top: 10px;">

            <a href="{{ Config::get('app.url') }}/server.php/lobby/?allcontest_type=true{{ $url_string['contest_type'] }}">
                <button class="btn-filter btn btn-medium

                            @if(empty($input['contest_type']))
                                active
                            @endif

                        " type="button" style="width: 100%;">All contest types</button>
            </a>

        </div>

        <div aria-label="First group" role="group" class="btn-group" style="width: 98%; margin-top: 10px;">

            <a href="{{ Config::get('app.url') }}/server.php/lobby/?contest_type=1{{ $url_string['contest_type'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['contest_type']))
                                @if($input['contest_type'] == '1')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">Head-to-head</button>
            </a>

        </div>

        <div aria-label="First group" role="group" class="btn-group" style="width: 98%; margin-top: 10px;">

            <a href="{{ Config::get('app.url') }}/server.php/lobby/?contest_type=2{{ $url_string['contest_type'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['contest_type']))
                                @if($input['contest_type'] == '2')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">Leagues</button>
            </a>

        </div>

        <div aria-label="First group" role="group" class="btn-group" style="width: 98%; margin-top: 10px;">

            <a href="{{ Config::get('app.url') }}/server.php/lobby/?contest_type=3{{ $url_string['contest_type'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['contest_type']))
                                @if($input['contest_type'] == '3')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">50/50s</button>
            </a>

        </div>

        <div aria-label="First group" role="group" class="btn-group" style="width: 98%; margin-top: 10px;">
            <a href="{{ Config::get('app.url') }}/server.php/lobby/?contest_type=4{{ $url_string['contest_type'] }}">
                <button class="btn-filter btn btn-medium

                            @if(!empty($input['contest_type']))
                                @if($input['contest_type'] == '4')
                                    active
                                @endif
                            @endif

                        " type="button" style="width: 100%;">Tournaments</button>
            </a>
        </div>
    </div>
</div>
<div style="margin-top: 10px;"><a data-toggle="control-sidebar" href="#"><button class="pull-left btn btn-medium" style="margin-left: 90px;">Hide <i class="fa fa-arrow-circle-right"></i></button></a></div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->

<!-- Modal -->
<div class="modal fade" id="confirm-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Success</h4>
            </div>
            <div class="modal-body">
                Team information saved.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-medium" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    var lobbyUrl = "{{ url(Config::get('url.lobby')) }}";
</script>
<script type="text/javascript"src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script src="{{Config::get('app.url')}}/public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="http://cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.js"></script>
<script src="{{Config::get('app.url')}}/public/js/lobby.js" type="text/javascript"></script>
@endsection