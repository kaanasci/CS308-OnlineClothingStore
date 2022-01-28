<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">


    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>

<body>
<div class="container-fluid banner p-0">
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/vacay.webp" class="d-block w-100" alt="">
                <div class="carousel-caption">
                    <span class="vacay">Vacation Mode: ON</span> <br>
                    <span class="summer">Kick off summer in new, feel-good styles.</span>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://img.abercrombie.com/is/image/anf/A-APRIL-WK-2-D-HP-BAU-Trend-Edit.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption">
                    <span class="vacay">Trend Edit</span> <br>
                    <span class="summer">Need These Now</span>
                    <br>
                    <a class= "shop" href="{{url('category/5')}}">Shop Men's</a>
                    <a class= "shop" href="{{url('category/4')}}">Shop Women's</a>

                </div>
            </div>
            <div class="carousel-item">
                <img src="img/four.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption">
                    <span>SPRING SUMMER 21'</span>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid menu active">
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

{{--<section class="starting-section container-fluid">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="cover">--}}
{{--                    <div class="content">--}}
{{--                        <img class="woman" src="img/woman.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="hover-efect"><i class="fas fa-shopping-bag"></i></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="cover">--}}
{{--                            <div class="content">--}}
{{--                                <img class="man" src="img/man.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="hover-efect"><i class="fas fa-shopping-bag"></i></div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-5">--}}
{{--                <div class="cover">--}}
{{--                    <div class="content">--}}
{{--                        <img class="sneaker" src="img/sneaker.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="hover-efect"><i class="fas fa-shopping-bag"></i></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-7">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="cover">--}}
{{--                            <div class="content">--}}
{{--                                <img class="bag" src="img/bag.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="hover-efect"><i class="fas fa-shopping-bag"></i></div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="pro-view container-fluid">
    <div class="container">
        <h3>Latest Products</h3>
        <div class="line"></div>
        <div class="row">

            @forelse($products as $top )

            <div class="col-lg-4">
                <div class="content shadow">
                    <div class="thumbnail">
                        <img src="{{url($top->image)}}" alt="...">
                        <div class="caption">
                            <h3>{{$top->name}}</h3>
                            <p>
                                <a href="{{url('product',$top->id)}}" class="btn btn-light" role="button"><i class="far fa-eye"></i></a>
                                <button class="btn btn-light">
                                    ${{$top->price}}
                                </button>
                            </p>
                            <form action="{{route('cart.ekle',$top->id)}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$top->id}}">
                                <input type="submit" class="btn btn-theme" value="ADD">
                            </form>
                        </div>
                    </div>

                </div>
            </div>



            @empty
                <h3>No product avalaible</h3>



            @endforelse



        </div>

    </div>

</section>

<section class="first-section container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="content shadow">
                    <i class="fas fa-shipping-fast"></i>
                    <h6>Free Shipping</h6>
                    <p>Free shipping for purchases of 200 TL or more.</p>

                </div>

            </div>
            <div class="col-lg-3 col-md-6">
                <div class="content shadow">
                    <i class="fas fa-money-bill-wave"></i>
                    <h6>Payment Method</h6>
                    <p>Shop accepts all major credit and debit cards.</p>

                </div>

            </div>
            <div class="col-lg-3 col-md-6">
                <div class="content shadow">
                    <i class="fas fa-store-alt"></i>
                    <h6>Change in Store</h6>
                    <p>If you buy online then you can also change in our stores.</p>

                </div>

            </div>
            <div class="col-lg-3 col-md-6">
                <div class="content shadow">
                    <i class="fas fa-calendar-check"></i>
                    <h6>Returns</h6>
                    <p>We can easily arrange an exchange or a refund for you within 30 days.</p>

                </div>

            </div>
        </div>


    </div>
</section>


<footer class="container-fluid">
    <div class="container uppercontent">
        <div class="row">

            <div class="col-lg-12 contact">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
    <div class="container middlecontent">
        <div class="row info">
            <div class="col-lg-4 col-md-6 ">
                <h5>OPEN TIME</h5>
                <p>Mon -Fri: 10.00 - 18.00</p>
                <p>Closed on weekend</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5>PHONE & EMAIL</h5>
                <p>support@shop.com</p>
                <p>0212-725-9756</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5>ADDRESS</h5>
                <p>Orta, Sabancı Unv.</p>
                <p>Univ St. No: 27</p>
            </div>
        </div>
    </div>
    <div class="container lastcontent">
        <div class="row">
            <div class="col-md-8">
                <p>Copyright @2021 All rights reserved</p>
            </div>
            <div class="col-md-4">
                <p>Terms & Use Privacy Policy</p>
            </div>
        </div>
    </div>

</footer>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
    $('.carousel').carousel({
        interval: 3000,

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

</body>

</html>