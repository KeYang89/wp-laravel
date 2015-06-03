<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Team | Pick Team</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{Config::get('app.url')}}/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{Config::get('app.url')}}/public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{Config::get('app.url')}}/public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{Config::get('app.url')}}/public/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{Config::get('app.url')}}/public/css/mytheme.css" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue sidebar-mini" onload="loadPitch();">
<div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="{{Config::get('app.url')}}/server.php/lobby" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>T</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Team</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

        <span class="hidden-xs">{{ Auth::user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-right">
                <a href="{{Config::get('app.url')}}/server.php/auth/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>

</ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="#"><span>My Points</span></a>
            </li>
            <li>
                <a href="{{Config::get('app.url')}}/server.php/lobby"><span>Lobby</span></a>
            </li>
            <li class="active">
                <a href="{{Config::get('app.url')}}/server.php/myTeam"><span>My Teams</span></a>
            </li>
            <li>
                <a href="#"><span>Player Profiles</span></a>
            </li>
            <li>
                <a href="#"><span>Stats</span></a>
            </li>
            <li>
                <a href="#"><span>Scouts</span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
        <li><a href="#sales-chart" data-toggle="tab">Data View</a></li>
    </ul>
    <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="field-view" style="position: relative;">

            <div class="row" style="margin: 20px;">
                <div class="col-xs-10 col-md-6">
                    <div class="row" style="padding: 3px;">Team Name:</div>
                    <div class="row form-group" style="padding: 3px;">
                        <input class="form-control" type="text" placeholder="Team name:" name="team_name" id="team-name" value="{{ $team->team_name }}" style="font-size: 16px; font-weight: bold;">
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

            <div class="pull-right row" style="margin: 20px;">
                <button class="btn btn-primary btn-sm btn-flat btn-black" onclick="javascript:saveTeamBasic();">Save Team Info</button>
            </div>

        </div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
    </div>
</div><!-- /.nav-tabs-custom -->

</section><!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-lg-7 connectedSortable">

    <!-- Map box -->
    <div class="box box-solid">
        <div class="box-body">
            <h4>Gameweek 38 - 24 May 11:30</h4>

            <table id="tbl-gameweek" class="table table-bordered table-hover">

                <tbody>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Arsenel</td>
                        <td>4-1</td>
                        <td>West Brom</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Aston Villa</td>
                        <td>0-1</td>
                        <td>Burnely</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Chelsea</td>
                        <td>0-1</td>
                        <td>Sutherland</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Arsenel</td>
                        <td>4-1</td>
                        <td>West Brom</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Aston Villa</td>
                        <td>0-1</td>
                        <td>Burnely</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Chelsea</td>
                        <td>0-1</td>
                        <td>Sutherland</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Arsenel</td>
                        <td>4-1</td>
                        <td>West Brom</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Aston Villa</td>
                        <td>0-1</td>
                        <td>Burnely</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Chelsea</td>
                        <td>0-1</td>
                        <td>Sutherland</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Arsenel</td>
                        <td>4-1</td>
                        <td>West Brom</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Aston Villa</td>
                        <td>0-1</td>
                        <td>Burnely</td>
                    </tr>
                    <tr>
                        <td>24 May 15:00</td>
                        <td>Chelsea</td>
                        <td>0-1</td>
                        <td>Sutherland</td>
                    </tr>
                </tbody>

            </table>

        </div><!-- /.box-body-->
    </div>
    <!-- /.box -->

</section><!-- right col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        &nbsp;
    </div>
    <strong>Copyright &copy; 2014-2015</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside id="tsf" class="control-sidebar control-sidebar-dark">
    <table class="table table-striped control-sidebar-striped">
        <tbody>
            {{--*/ $var = 0 /*--}}
            @foreach ($allPlayers as $singlePlayer)
                <tr>
                    <td style="width: 18px;"><img src="{{Config::get('app.url')}}/public/images/shirt_{{ $singlePlayer->team_id }}.png" width="18" /></td>
                    <td>{{ $singlePlayer->first_name }} {{ $singlePlayer->last_name }}</td>
                    <td><a href="javascript:void(0);" onclick="javascript:chooseTeamPlayer('{{ $var }}');" <button class="btn btn-default pull-right btn-player-select"><i class="fa fa-plus"></i></button></td>
                </tr>
            {{--*/ $var++ /*--}}
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 10px;"><a data-toggle="control-sidebar" href="#"><button class="pull-left btn btn-default" style="margin-left: 90px;">Hide <i class="fa fa-arrow-circle-right"></i></button></a></div>

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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="ad" style="display: block; z-index: 999;">
    <span id="close-ad"><i class="fa fa-times"></i> Close Ad</span>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <img src="https://s0.2mdn.net/viewad/4516858/Bandanas_728x90.jpg" />
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>

<!-- jQuery 2.1.4 -->
<script src="{{Config::get('app.url')}}/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{Config::get('app.url')}}/public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Slimscroll -->
<script src="{{Config::get('app.url')}}/public/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{Config::get('app.url')}}/public/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="{{Config::get('app.url')}}/public/dist/js/app.min.js" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{Config::get('app.url')}}/public/dist/js/demo.js" type="text/javascript"></script>

<script src="https://code.createjs.com/easeljs-0.8.1.min.js" type="text/javascript"></script>
<script src="{{Config::get('app.url')}}/public/js/userTeamField.js" type="text/javascript"></script>
</body>
</html>