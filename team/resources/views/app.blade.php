<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Team | @yield('title')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="{{Config::get('app.url')}}/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{Config::get('app.url')}}/public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
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
        @yield('css')
    </head>
    <body class="skin-blue sidebar-mini">
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
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="{{ url(Config::get('url.logout')) }}" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
            @include('mainSideBar')
            <div class="content-wrapper">
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    &nbsp;
                </div>
                <strong>Copyright &copy; 2014-2015</strong> All rights reserved.
            </footer>
        </div>
        @include('bottomAds')
        <!-- jQuery 2.1.4 -->
        <script src="{{Config::get('app.url')}}/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
            var appUrl = "{{Config::get('app.url')}}";
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{Config::get('app.url')}}/public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Slimscroll -->
        <script src="{{Config::get('app.url')}}/public/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="{{Config::get('app.url')}}/public/plugins/fastclick/fastclick.min.js"></script>
        <!-- App -->
        <script src="{{Config::get('app.url')}}/public/dist/js/app.min.js" type="text/javascript"></script>
        <script src="{{Config::get('app.url')}}/public/dist/js/demo.js" type="text/javascript"></script>
        <script src="{{Config::get('app.url')}}/public/js/common.js" type="text/javascript"></script>
        @yield('javascript')
    </body>
</html>