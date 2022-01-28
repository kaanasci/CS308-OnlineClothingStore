<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/card.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>

<body>


<div class="container-fluid menu active ">
    <nav class="navbar navbar-expand-lg container">
        <a href="{{route('welcome')}}" class="navbar-brand">Shop</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#content">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="content">
            <ul class="navbar-nav mr-auto">
                <li><a href="{{route('welcome')}}" class="nav-link">Home</a></li>
                <li><a href="{{url('category/1')}}" class="nav-link">Tops</a></li>
                <li><a href="{{url('category/2')}}" class="nav-link">Trousers</a></li>
                <li><a href="{{url('category/3')}}" class="nav-link">Shoes</a></li>
            </ul>


        </div>
        <div class="d-flex flex row order-2 order-sm-3">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <form class="input-group rounded" action="{{ route('search') }}" method = "GET">
                        <input type="text"  class="form-control rounded" placeholder="Search" name = "search" value ="{{ request()->query('search') }}" />
                        <span class="input-group-text border-0" id="search-addon"><i class="fas fa-search"></i></span>
                    </form>

                <li class="nav-item"><a class="nav-link px-2" href= "{{route('cart')}}"><i class="fas fa-shopping-cart"></i>
                        <span class="badge badge-theme">
                            {{Cart::count()}}
                        </span>

                    </a></li>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
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
                                <li role="separator" class="divider"></li>
                                    <a href="{{ route('history') }}">
                                        Orders
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>

            </ul>
        </div>
    </nav>
</div>



<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    @if (count($orders) == 0)
                        <p>There is no order history</p>
                    @else


                                <table class="table table-hover table-bordered">
                                    <thead class="thead-dark">

                                    <tr>
                                        <th class="p-name">Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>   </th>

                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($orders as $order)
                                        @foreach($order as $product)



                        <tr>
                            <td class="cart-title first-row">
                                <h5>{{$product->name}}</h5>
                            </td>

                            <td class="p-price first-row">{{$product->pivot->qty}}</td>
                            <td class="total-price first-row">{{$product->pivot->total}}</td>
                            <td class="total-price first-row">{{$product->pivot->status}}</td>

                            <td>
                            <form action ="{{route('refund.request',$product->pivot->order_id)}}" method="get">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button style="margin-top: 20px" type="submit" class="btn btn-outline-dark btn-sm">Refund</button>
                            </form>
                            </td>
                        </tr>
                                        @endforeach
                                    @endforeach
                                    @endif
                        </tbody>

                    </table>

                </div>

                        <div class="proceed-checkout">

                            <a href="{{route('welcome')}}" class="proceed-btn">Continue shopping</a>
                        </div>
                    </div>
                </div>
    </div>

</section>





<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
    $('.carousel').carousel({
        interval: 2000,
        pause: 'false'
    })

    $(document).ready(function () {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll > 100) {
                $(".menu").addClass("active");
                $("navbar a").addClass("black");
            } else {
                $("navbar a").removeClass("active");
                $("navbar a").removeClass("black");
            }
        })
    })
</script>

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/jquery.dd.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>