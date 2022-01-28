<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel Ecommerce</title>
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
            <a class="navbar-brand" href="{{route('admin')}}">Shop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('admin')}}">Home</a>
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
                <a href="{{route('admin')}}" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Dashboard</a>
                <a href="{{route('adminproduct')}}" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Products
                    <span class="badge badge-dark badge-pill pull-right">14</span>
                </a>
                <a href="{{route('deliveries')}}" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Orders
                    <span class="badge badge-dark badge-pill pull-right">14</span>
                </a>
                <a href="{{route('reviews')}}" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Reviews
                    <span class="badge badge-dark badge-pill pull-right">14</span>
                </a>
            </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">

            <h1 class="sub-header">Add Product</h1>

            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}


                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name= "name" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Model</label>
                            <input type="text"  class="form-control" id="exampleInputPassword1" name= "model"  placeholder="Model">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Number</label>
                            <input type="text"  class="form-control" id="exampleInputPassword1" name= "number" placeholder="Number">
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input type="text"  class="form-control" id="exampleInputPassword1" name= "description" placeholder="Description">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity in stocks</label>
                                <input type="text"  class="form-control" id="exampleInputPassword1" name= "quantity_in_stocks" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input type="text"  class="form-control" id="exampleInputPassword1" name= "price" placeholder="Price">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Warranty Status</label>
                                <input type="text"  class="form-control" id="exampleInputPassword1" name= "warranty_status" placeholder="Warranty">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Distributor Info</label>
                                <input type="text"  class="form-control" id="exampleInputPassword1" name= "distributor_info" placeholder="Distributor">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Image</label>
                                <input type="text"  class="form-control" id="exampleInputPassword1" name= "image" placeholder="Image Url">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category Id</label>
                                <input type="text"  class="form-control" id="exampleInputPassword1" name= "category_id" placeholder="Category Id">
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>


            </form>

        </div>
    </div>
</div>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="js/admin-app.js"></script>
</body>
</html>


