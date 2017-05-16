<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>KejuCraft</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('dash')}}/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('dash')}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('dash')}}/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="{{asset('dash')}}/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('dash')}}/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="{{asset('dash')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('dash')}}/css/style-responsive.css" rel="stylesheet">
    <script src="{{url('tinymce')}}/tinymce.min.js"></script>
    <script src="{{asset('dash')}}/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b>KejuCraft User Panel</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-theme">{{count($daftarpesan)}}</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-green"></div>
                        @if(!empty($daftarpesan))
                            <li>
                                <p class="green">Kamu Memiliki {{count($daftarpesan)}} Pesan</p>
                            </li>
                            @foreach($pesan as $m)
                                <li>
                                    <a href="">
                                        <span class="photo"><img alt="avatar" src="{{asset('dash')}}/img/ui-zac.jpg"></span>
                                        <span class="subject">
                                    <span class="from">{{$m->from}}</span>
                                    <span class="time">Just now</span>
                                    </span>
                                        <span class="message">
                                        {{$m->message}}
                                    </span>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <p class="green">Tidak Ada Pesan</p>
                            </li>
                        @endif


                        <li>
                            <a href="index.html#">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle pull-right" href="index.html#">
                        <i class="fa fa-money"></i>
                        <span class="badge bg-theme">{{$money[0]}}</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green">Kamu Memiliki {{$money[0]}} Cheese Coin</p>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="{{ url('logout') }}">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="profile.html"><img src="{{asset('dash')}}/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                <h5 class="centered">
                    {{$user}}<br/>

                        <font color="#7fffd4"> {{$rank}}</font>


                </h5>

                <li class="mt">
                    <a class="" href="{{url('panel')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-desktop"></i>
                        <span>User Data</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="{{url('panel/profile')}}">General</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-money"></i>
                        <span>Coins & Donate</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{url('panel/donate')}}">Buy Rank</a></li>
                        <li><a href="blank.html">Buy Coins</a></li>
                    </ul>
                </li>

                @if($rank == "Owner" or $rank == "Staff")
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-github"></i>
                        <span>Admin Panel</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{url('panel/addpost')}}">Post</a></li>
                        <li><a href="blank.html">User List</a></li>
                    </ul>
                </li>
                @endif


            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
