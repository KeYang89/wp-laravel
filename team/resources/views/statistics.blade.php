@extends('app')
@section('title', 'Statistics')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Statistics
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 connectedSortable">
            <div class="box box-success">
                <div class="box-body no-padding">
                    <table id="tbl-gameweek" class="table table-striped">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Player</th>
                            <th class="mobile-hidden">Team</th>
                            <th class="mobile-hidden">Position</th>
                            <th>Selected</th>
                            <th>Price</th>
                            <th class="mobile-hidden">GW</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($playerData as $teamPlayer)
                        <tr>
                            <td style="width: 20px;"><img src="{{ $teamPlayer['tshirt'] }}" style="width: 20px;" /></td>
                            <td><a href="{{ url(Config::get('url.player_profile')) . '/' . $teamPlayer['playerId'] }}">{{ $teamPlayer['name'] }}</a></td>
                            <td class="mobile-hidden">{{ $teamPlayer['team'] }}</td>
                            <td class="mobile-hidden">{{ $teamPlayer['position'] }}</td>
                            <td>{{ $teamPlayer['selected'] }}</td>
                            <td>{{ $teamPlayer['price'] }}</td>
                            <td class="mobile-hidden">{{ $teamPlayer['gw'] }}</td>
                            <td>{{ $teamPlayer['total'] }}</td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div><!-- /.box-body-->

        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-4 connectedSortable">
            <!-- Map box -->
            <div class="box box-success">
                <div class="box-body no-padding">
                    <ul style="margin-top: 10px;">
                        <li>Top points scorers</li>
                        <li>Best value (total points / price)</li>
                        <li>Price rise this Gameweek</li>
                        <li>Price fall this Gameweek</li>
                        <li>Form (30 days average)</li>
                        <li>Transfers in this Gameweek</li>
                        <li>Transfers out this Gameweek</li>
                    </ul>

                </div><!-- /.box-body-->
            </div>
            <!-- /.box -->

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
@endsection
