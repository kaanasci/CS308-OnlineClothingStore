
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shop Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
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
                    <span class="badge badge-dark badge-pill pull-right">14</span>
                </a>
                <a href="{{route('refund')}}" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Refunds
                    <span class="badge badge-dark badge-pill pull-right">14</span>
                </a>

            </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
            <h1 class="page-header">Product List</h1>
            <h2 class="sub-header">

                Products
            </h2>
            <div class="table-responsive">

                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">

                    <tr>

                        <th>Product Name</th>
                        <th>Total</th>

                        <th>Discounts</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $product)


                        <tr>

                            <td>{{$product->name}}</td>



                            <td width="50px">

                                <form action ="{{route('product.price',$product->id)}}" method="get">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="number" name="price" value="{{$product->price}}">
                                    <button type="submit" class="btn btn-outline-info btn-sm">Update</button>
                                </form>

                            </td>




                            <td style="width: 100px">
                                <form action ="{{route('product.discount',$product->id)}}" method="get">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="price" value="{{$product->price}}">
                                    <input type="number" name="rate" value="">
                                    <button type="submit" class="btn btn-outline-info btn-sm">Update</button>
                                </form>




                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

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