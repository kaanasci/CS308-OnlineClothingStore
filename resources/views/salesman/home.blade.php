
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shop Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed pull-left visible-xs" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Shop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('salesman')}}"> Home</a>
                </li>
                <li>
                    <a href="{{route('welcome')}}">&larr; Back to site</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>


        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-2 sidebar collapse" id="sidebar">
            <div class="list-group">
                <a href="{{route('salesman')}}" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Dashboard</a>
                <a href="{{route('salesproduct')}}" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Sales
                </a>
                <a href="{{route('refund')}}" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Refunds
                </a>
            </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
            <h1 class="page-header">Dashboard</h1>

            <section class="row text-center placeholders">

                <div class="col-6 col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Users</div>
                        <div class="panel-body">
                            <h4>{{\App\Models\User::count()}}</h4>
                            <p>Data</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Products</div>
                        <div class="panel-body">
                            <h4>{{\App\Models\Product::count()}}</h4>
                            <p>Data</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Orders</div>
                        <div class="panel-body">
                            <h4>{{\App\Models\Order::count()}}</h4>
                            <p>Data</p>
                        </div>
                    </div>
                </div>
            </section>



            <div class="flex-wrapper">
                <div class="single-chart">
                    <svg viewBox="0 0 36 36" class="circular-chart orange">
                        <path class="circle-bg"
                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                        <path class="circle"
                              stroke-dasharray="30, 100"
                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                        <text x="18" y="20.35" class="percentage">30%</text>
                    </svg>
                </div>

                <div class="single-chart">
                    <svg viewBox="0 0 36 36" class="circular-chart green">
                        <path class="circle-bg"
                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                        <path class="circle"
                              stroke-dasharray="60, 100"
                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                        <text x="18" y="20.35" class="percentage">60%</text>
                    </svg>
                </div>

                <div class="single-chart">
                    <svg viewBox="0 0 36 36" class="circular-chart blue">
                        <path class="circle-bg"
                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                        <path class="circle"
                              stroke-dasharray="90, 100"
                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                        <text x="18" y="20.35" class="percentage">90%</text>
                    </svg>
                </div>
            </div>





        </div>
    </div>
</div>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="js/admin-app.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
