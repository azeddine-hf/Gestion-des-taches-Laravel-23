@extends('master',['body_class' => 'layout-light side-menu overlayScroll'])
@section('title','Accueil')
@section('active','active')
    @section('content')

    <main class="main-content">
        <div class="contents expanded">
            <div class="container-fluid">
                <div class="social-dash-wrap">
                    <div class="row">
                        
                        <div class="col-lg-4 mb-25">
                            <div class="social-overview-wrap">

                                <div class="card border-0">
                                    <div class="card-header">
                                        <h6>Social Media Overview</h6>
                                    </div>
                                    <div class="card-body">
                                        <ul class="social-overview">
                                            <li>
                                                <div class="social-box bg-facebook">
                                                    <span class="la la-facebook"></span>
                                                </div>
                                                <h3>5,461</h3>
                                                <p>Likes</p>
                                            </li>
                                            <li>
                                                <div class="social-box bg-twitter">
                                                    <span class="la la-twitter"></span>
                                                </div>
                                                <h3>5,461</h3>
                                                <p>Followers</p>
                                            </li>
                                            <li>
                                                <div class="social-box gradientInstragram">
                                                    <span class="la la-instagram"></span>
                                                </div>
                                                <h3>5,461</h3>
                                                <p>Followers</p>
                                            </li>
                                            <li>
                                                <div class="social-box bg-youtube">
                                                    <span class="la la-youtube"></span>
                                                </div>
                                                <h3>5,461</h3>
                                                <p>Subscribers</p>
                                            </li>
                                            <li>
                                                <div class="social-box bg-pinterest">
                                                    <span class="la la-pinterest"></span>
                                                </div>
                                                <h3>5,461</h3>
                                                <p>Followers</p>
                                            </li>
                                            <li>
                                                <div class="social-box bg-linkedin">
                                                    <span class="la la-linkedin"></span>
                                                </div>
                                                <h3>5,461</h3>
                                                <p>Followers</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-8 mb-25">

                            <div class="card card-overview border-0">
                                <div class="card-header">
                                    <h6>Facebook Overview</h6>
                                    <div class="card-extra">
                                        <div class="card-tab btn-group nav nav-tabs">
                                            <a class="btn btn-xs btn-white active border-light" id="f_today-tab" data-toggle="tab" href="#f_overview-today" role="tab" area-controls="f_overview" aria-selected="true">Today</a>
                                            <a class="btn btn-xs btn-white border-light" id="f_week-tab" data-toggle="tab" href="#f_overview-week" role="tab" area-controls="f_overview" aria-selected="false">Week</a>
                                            <a class="btn btn-xs btn-white border-light" id="f_month-tab" data-toggle="tab" href="#f_overview-month" role="tab" area-controls="f_overview" aria-selected="false">Month</a>
                                            <a class="btn btn-xs btn-white border-light" id="f_year-tab" data-toggle="tab" href="#f_overview-year" role="tab" area-controls="f_overview" aria-selected="false">Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-0">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="f_overview-today" role="" aria-labelledby="f_overview-tab">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card-overview__left">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-md-6">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>25,845</h1>
                                                                        <p>Engaged Users</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>25%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartOne"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-md-6 br-1">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>2,534</h1>
                                                                        <p>Page Impressions</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>40%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartTwo"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card-overview__right">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-md-6">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>2,142</h1>
                                                                        <p>Total Page Likes</p>
                                                                        <div>
                                                                            <span class="color-danger"><i data-feather="trending-down"></i>
                                                                                <strong>15%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartThree"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-md-6 co-last">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>1,132</h1>
                                                                        <p>New Page LIke</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>13%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartFour"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="f_overview-week" role="" aria-labelledby="f_overview-tab">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card-overview__left">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-md-6">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>25,845</h1>
                                                                        <p>Engaged Users</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>25%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartFive"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-md-6 br-1">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>92,534</h1>
                                                                        <p>Page Impressions</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>26%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartSix"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card-overview__right">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-md-6">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>9,142</h1>
                                                                        <p>Total Page Likes</p>
                                                                        <div>
                                                                            <span class="color-danger"><i data-feather="trending-down"></i>
                                                                                <strong>23%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartSeven"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-md-6 co-last">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>432</h1>
                                                                        <p>New Page LIke</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>44%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartEight"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="f_overview-month" role="" aria-labelledby="f_overview-tab">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card-overview__left">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-md-6">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>25,845</h1>
                                                                        <p>Engaged Users</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>25%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartNine"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-md-6 br-1">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>492,534</h1>
                                                                        <p>Page Impressions</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>36%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartTen"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card-overview__right">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-md-6">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>12,142</h1>
                                                                        <p>Total Page Likes</p>
                                                                        <div>
                                                                            <span class="color-danger"><i data-feather="trending-down"></i>
                                                                                <strong>13%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartEleven"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-md-6 co-last">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>1,432</h1>
                                                                        <p>New Page LIke</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>14%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartTwelve"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="f_overview-year" role="" aria-labelledby="f_overview-tab">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card-overview__left">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-md-6">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>25,845</h1>
                                                                        <p>Engaged Users</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>25%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartThirteen"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-md-6 br-1">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>492,534</h1>
                                                                        <p>Page Impressions</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>36%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartFourteen"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card-overview__right">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 col-md-6">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>12,142</h1>
                                                                        <p>Total Page Likes</p>
                                                                        <div>
                                                                            <span class="color-danger"><i data-feather="trending-down"></i>
                                                                                <strong>13%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartFifteen"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 col-md-6 co-last">
                                                                <div class="overview-single">





                                                                    <div class="overview-content">
                                                                        <h1>1,432</h1>
                                                                        <p>New Page LIke</p>
                                                                        <div>
                                                                            <span class="color-success"><i data-feather="trending-up"></i>
                                                                                <strong>14%</strong></span>
                                                                            <small>20,641 (prev)</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overview-single__chart">
                                                                        <div class="parentContainer">


                                                                            <div>
                                                                                <canvas id="lineChartSixteen"></canvas>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ends: .row -->
                                </div>
                            </div>

                        </div>
                        <div class="col-xxl-4 col-md-6 mb-25">

                            <div class="card border-0">
                                <div class="card-header">
                                    <h6>Youtube Subscribers</h6>
                                    <div class="card-extra">
                                        <ul class="card-tab-links nav-tabs nav">
                                            <li>
                                                <a href="#y_subscriber-week" class="active" data-toggle="tab" id="ys_week-tab" role="tab" area-controls="y_subscriber" aria-selected="true">Week</a>
                                            </li>
                                            <li>
                                                <a href="#y_subscriber-month" data-toggle="tab" id="ys_month-tab" role="tab" area-controls="y_subscriber" aria-selected="false">Month</a>
                                            </li>
                                            <li>
                                                <a href="#y_subscriber-year" id="ys_year-tab" data-toggle="tab" role="tab" area-controls="y_subscriber" aria-selected="false">Year</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="y_subscriber-week" role="tabpanel" aria-labelledby="y_subscriber-week">
                                            <div class="card-chart-bar d-flex justify-content-between">
                                                <div class="card-bar-top">
                                                    <p>Subscribers</p>
                                                    <h3 class="card-bar-info d-flex align-items-end">25,472
                                                        <sub class="color-success">
                                                            <i data-feather="arrow-up"></i> 25%</sub>
                                                    </h3>
                                                </div>
                                                <ul class="legend-static">
                                                    <li class="custom-label">
                                                        <span style="background-color: rgb(95, 99, 242);"></span>Gained
                                                    </li>
                                                    <li class="custom-label">
                                                        <span style="background-color: rgb(255, 77, 79);"></span>Lost
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-chart">
                                                <div class="parentContainer">


                                                    <div>
                                                        <canvas id="ys_barChartOne"></canvas>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="y_subscriber-month" role="tabpanel" aria-labelledby="y_subscriber-week">
                                            <div class="card-chart-bar d-flex justify-content-between">
                                                <div class="card-bar-top">
                                                    <p>Subscribers</p>
                                                    <h3 class="card-bar-info d-flex align-items-end">75,582
                                                        <sub class="color-success">
                                                            <i data-feather="arrow-up"></i> 45%</sub>
                                                    </h3>
                                                </div>
                                                <ul class="legend-static">
                                                    <li class="custom-label">
                                                        <span style="background-color: rgb(95, 99, 242);"></span>Gained
                                                    </li>
                                                    <li class="custom-label">
                                                        <span style="background-color: rgb(255, 77, 79);"></span>Lost
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-chart">
                                                <div class="parentContainer">


                                                    <div>
                                                        <canvas id="ys_barChartTwo"></canvas>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="y_subscriber-year" role="tabpanel" aria-labelledby="y_subscriber-week">
                                            <div class="card-chart-bar d-flex justify-content-between">
                                                <div class="card-bar-top">
                                                    <p>Subscribers</p>
                                                    <h3 class="card-bar-info d-flex align-items-end">124,892
                                                        <sub class="color-success">
                                                            <i data-feather="arrow-up"></i> 65%</sub>
                                                    </h3>
                                                </div>
                                                <ul class="legend-static">
                                                    <li class="custom-label">
                                                        <span style="background-color: rgb(95, 99, 242);"></span>Gained
                                                    </li>
                                                    <li class="custom-label">
                                                        <span style="background-color: rgb(255, 77, 79);"></span>Lost
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-chart">
                                                <div class="parentContainer">


                                                    <div>
                                                        <canvas id="ys_barChartThree"></canvas>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-xxl-4 col-md-6 mb-25">

                            <div class="card border-0">
                                <div class="card-header">
                                    <h6>Twitter Overview</h6>
                                    <div class="card-extra">
                                        <ul class="card-tab-links nav-tabs nav">
                                            <li>
                                                <a class="active" href="#to_week" data-toggle="tab" id="to_week-tab" role="tab" area-controls="to_week" aria-selected="true">Week</a>
                                            </li>
                                            <li>
                                                <a href="#to_month" data-toggle="tab" id="to_month-tab" role="tab" area-controls="to_month" aria-selected="false">Month</a>
                                            </li>
                                            <li>
                                                <a href="#to_year" data-toggle="tab" id="to_year-tab" role="tab" area-controls="to_year" aria-selected="false">Year</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body linechart-overview-wrap">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="to_week" role="tabpanel" aria-labelledby="to_week-tab">
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>Tweets</span>
                                                    <p class="m-0">
                                                        <strong>278</strong>
                                                        <sub class="color-success">
                                                            <i class="la la-arrow-up"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpOne"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>Tweet Impressions</span>
                                                    <p class="m-0">
                                                        <strong>78.8k</strong>
                                                        <sub class="color-success">
                                                            <i class="la la-arrow-up"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpTwo"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>New Followers</span>
                                                    <p class="m-0">
                                                        <strong>3,015</strong>
                                                        <sub class="color-danger">
                                                            <i class="la la-arrow-down"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpThree"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>Engagement Rates</span>
                                                    <p class="m-0">
                                                        <strong>5.2</strong>
                                                        <sub class="color-success">
                                                            <i class="la la-arrow-up"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpFour"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end">
                                                <div class="chart-desc">
                                                    <span>Retweets</span>
                                                    <p class="m-0">
                                                        <strong>8,625</strong>
                                                        <sub class="color-danger">
                                                            <i class="la la-arrow-down"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpFive"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="to_month" role="tabpanel" aria-labelledby="to_month-tab">
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>Tweets</span>
                                                    <p class="m-0">
                                                        <strong>378</strong>
                                                        <sub class="color-success">
                                                            <i class="la la-arrow-up"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpOneM"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>Tweet Impressions</span>
                                                    <p class="m-0">
                                                        <strong>88.8k</strong>
                                                        <sub class="color-success">
                                                            <i class="la la-arrow-up"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpTwoM"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>New Followers</span>
                                                    <p class="m-0">
                                                        <strong>4,417</strong>
                                                        <sub class="color-danger">
                                                            <i class="la la-arrow-down"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpThreeM"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>Engagement Rates</span>
                                                    <p class="m-0">
                                                        <strong>7.2</strong>
                                                        <sub class="color-success">
                                                            <i class="la la-arrow-up"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpFourM"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end">
                                                <div class="chart-desc">
                                                    <span>Retweets</span>
                                                    <p class="m-0">
                                                        <strong>10,625</strong>
                                                        <sub class="color-danger">
                                                            <i class="la la-arrow-down"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpFiveM"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="to_year" role="tabpanel" aria-labelledby="to_year-tab">
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>Tweets</span>
                                                    <p class="m-0">
                                                        <strong>578</strong>
                                                        <sub class="color-success">
                                                            <i class="la la-arrow-up"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpOneY"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>Tweet Impressions</span>
                                                    <p class="m-0">
                                                        <strong>78.8k</strong>
                                                        <sub class="color-success">
                                                            <i class="la la-arrow-up"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpTwoY"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>New Followers</span>
                                                    <p class="m-0">
                                                        <strong>3,015</strong>
                                                        <sub class="color-danger">
                                                            <i class="la la-arrow-down"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpThreeY"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                                                <div class="chart-desc">
                                                    <span>Engagement Rates</span>
                                                    <p class="m-0">
                                                        <strong>5.2</strong>
                                                        <sub class="color-success">
                                                            <i class="la la-arrow-up"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpFourY"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-end">
                                                <div class="chart-desc">
                                                    <span>Retweets</span>
                                                    <p class="m-0">
                                                        <strong>8,625</strong>
                                                        <sub class="color-danger">
                                                            <i class="la la-arrow-down"></i> 14%</sub>
                                                    </p>
                                                </div>
                                                <div class="border-line-chart">
                                                    <div class="parentContainer">


                                                        <div>
                                                            <canvas id="lineChartSharpFiveY"></canvas>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ends: .card-body -->
                            </div>

                        </div>
                        
                       
                      
                    </div>
                </div>
            </div>

        </div>
        
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar show"></div>
    @endsection

