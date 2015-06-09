@extends('app')
@section('title', 'Fixtures')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Fixtures</h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 connectedSortable">
            <div class="box box-success">
                <div class="box-header">
                    <h4>Gameweek 38 - 24 May 11:30</h4>
                </div>
                <div class="box-body no-padding">
                    <table id="tbl-gameweek" class="table table-striped">
                        <tbody>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Arsenal</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_1.png" alt="Arsenal"></td>
                            <td>4 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_19.png" alt="West Brom"></td>
                            <td>West Brom</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Aston Villa</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_2.png" alt="Aston Villa"></td>
                            <td>0 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_3.png" alt="Burnley"></td>
                            <td>Burnley</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Crystal Palace</td>
                            <td><img  class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_5.png" alt="Crystal Palace"></td>
                            <td>1 - 0</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_18.png" alt="Swansea"></td>
                            <td>Swansea</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Chelsea</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_4.png" alt="Chelsea"></td>
                            <td>3 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_17.png" alt="Sunderland"></td>
                            <td>Sunderland</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Everton</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_6.png" alt="Everton"></td>
                            <td>0 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_15.png" alt="Spurs"></td>
                            <td>Spurs</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Hull</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_7.png" alt="Hull"></td>
                            <td>0 - 0</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_11.png" alt="Man Utd"></td>
                            <td>Man Utd</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Leicester</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_8.png" alt="Leicester"></td>
                            <td>5 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_13.png" alt="QPR"></td>
                            <td>QPR</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Man City</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_10.png" alt="Man City"></td>
                            <td>2 - 0</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_14.png" alt="Southampton"></td>
                            <td>Southampton</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Newcastle</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_12.png" alt="Newcastle"></td>
                            <td>2 - 0</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_20.png" alt="West Ham"></td>
                            <td>West Ham</td>
                        </tr>
                        <tr>
                            <td>24 May 15:00</td>
                            <td>Stoke</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_16.png" alt="Stoke"></td>
                            <td>6 - 1</td>
                            <td><img class="small-icon" src="http://cdn.ismfg.net/static/plfpl/img/badges/badge_9.png" alt="Liverpool"></td>
                            <td>Liverpool</td>
                        </tr>
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
