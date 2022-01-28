<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ram pa pa pam - Category</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/temp.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">




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
                <li><a href="{{url('/tops')}}" class="nav-link">Top</a></li>
                <li><a href="#" class="nav-link">Trousers</a></li>
                <li><a href="#" class="nav-link">Shoes</a></li>
            </ul>


        </div>
        <div class="d-flex flex row order-2 order-sm-3">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                               aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                                  <i class="fas fa-search"></i>
                                </span>
                    </div>

                <li class="nav-item"><a class="nav-link px-2" href= "shoppingcard.html"><i class="fas fa-shopping-cart"></i></a></li>
                <li class="nav-item"><a class="nav-link px-2" href="{{route('home')}}"><i class="fas fa-user"></i></a></li>

            </ul>
        </div>
    </nav>
</div>

<section class="checkout-section spad">
    <div class="container">
        <form method="post" action="{{ route('checkout') }}" enctype="multipart/form-data" class="checkout-form">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="#" class="content-btn">Click Here To Login</a>
                    </div>
                    <h4>Biling Details</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="fir">Name<span>*</span></label>
                            <input type="text" id="fir" value="{{auth()->user()->name}}">
                        </div>

                        <div class="col-lg-6">
                            <label for="email">Email Address<span>*</span></label>
                            <input type="text" id="email" value="{{auth()->user()->email}}">
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Tax Id<span>*</span></label>
                            <input type="text" id="email" value="{{auth()->user()->taxID}}">
                        </div>

                        <div class="col-lg-12">
                            <label for="cun">Address<span>*</span></label>
                            <input type="text" id="cun" name="address" value="{{auth()->user()->address}}">
                        </div>
                        <h4>Payment</h4>
                        <div class="col-lg-12">
                            <label for="street">Cardholder's Name<span>*</span></label>
                            <input type="text" id="name" class="street-first">
                            <label for="street">Card Number<span>*</span></label>
                            <input type="text">
                            <div class="row">
                                <div class="col-4"><label for="street">Expiry Date<span></span></label><input placeholder="YY/MM"> </div>
                                <div class="col-4"><label for="street">CVV<span></span></label> <input id="cvv"> </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="create-item">
                                <label for="acc-create">
                                    Create an account?
                                    <input type="checkbox" id="acc-create">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <input type="text" placeholder="Enter Your Coupon Code">
                    </div>
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li><span>Total</span></li>
                                <li class="fw-normal">Subtotal <span>${{Cart::subtotal()}}</span></li>
                                <li class="total-price">Total <span>${{Cart::total()}}</span></li>
                            </ul>
                            <div class="payment-check">
                                <div class="pc-item">
                                    <label for="pc-check">
                                        Cheque Payment
                                        <input type="checkbox" id="pc-check">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Paypal
                                        <input type="checkbox" id="pc-paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="order-btn">
                                <button type="submit" class="btn btn-dark">Place Order</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<script src="js/single_custom.js"></script>

</body>

</html>
