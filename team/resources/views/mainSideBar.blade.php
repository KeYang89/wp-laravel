<?php
/**
 * Created by SiD 
 * Date: 01/06/15
 * Time: 11:21 PM
 */
?>

{{--*/ $arrRoutePath = explode('/', Request::path()) /*--}}
{{--*/ $routePath = $arrRoutePath[0] /*--}}
{{--*/ $routePath = '/' . $routePath /*--}}

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li
            @if ($routePath == Config::get('url.points'))
                 class="active"
            @endif
            >
                <a href="{{ Config::get('app.url') . Config::get('url.points') }}"><span>My Points</span></a>
            </li>
            <li
            @if ($routePath == Config::get('url.lobby'))
                 class="active"
            @endif
            >
                <a href="{{ Config::get('app.url') . Config::get('url.lobby') }}"><span>Lobby</span></a>
            </li>
            <li
            @if ($routePath == Config::get('url.pick_team'))
                 class="active"
            @endif
            >
                <a href="{{ Config::get('app.url') . Config::get('url.pick_team') }}"><span>Pick Team</span></a>
            </li>
            <li
            @if ($routePath == Config::get('url.create_team'))
                 class="active"
            @endif
            >
                <a href="{{ Config::get('app.url') . Config::get('url.create_team') }}"><span>Create Team</span></a>
            </li>
            <!--
            <li
            @if ($routePath == Config::get('url.players') || $routePath == Config::get('url.player_profile'))
                 class="active"
            @endif
            >
                <a href="{{ url(Config::get('url.players')) }}"><span>Players</span></a>
            </li>
            <li
            @if ($routePath == Config::get('url.fixtures'))
            class="active"
            @endif
            >
            <a href="{{ url(Config::get('url.fixtures')) }}"><span>Fixtures</span></a>
            </li>
            -->
            <li
            @if ($routePath == Config::get('url.statistics'))
                 class="active"
            @endif
            >
                <a href="{{ Config::get('app.url') . Config::get('url.statistics') }}"><span>Statistics</span></a>
            </li>
            <li
            @if ($routePath == Config::get('url.scouts'))
                 class="active"
            @endif
            >
                <a href="{{ Config::get('app.url') . Config::get('url.scouts') }}"><span>Scouts</span></a>
            </li>
            <li
            @if ($routePath == Config::get('url.player-stats'))
            class="active"
            @endif
            >
            <a href="{{ Config::get('app.url') . Config::get('url.player-stats') }}"><span>Comparison Matrix</span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
    <section class="left-counter">
        <div class="league">
            <h3>EPL</h3>
            <div id="left-epl-match-counter" class="left-match-counter"></div>
        </div>
        <div class="league">
            <h3>La Liga</h3>
            <div id="left-spl-match-counter" class="left-match-counter"></div>
        </div>
        <div class="league">
            <h3>MLS</h3>
            <div id="left-mls-match-counter" class="left-match-counter"></div>
        </div>
        <div class="league">
            <h3>CL</h3>
            <div id="left-cl-match-counter" class="left-match-counter"></div>
        </div>
    </section>
</aside>
