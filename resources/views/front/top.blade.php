<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ram pa pa pam - Category</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/temp.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">



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
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                               aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                                  <i class="fas fa-search"></i>
                                </span>
                    </div>

                <li class="nav-item"><a class="nav-link px-2" href= "#"><i class="fas fa-shopping-cart"></i></a></li>
                <li class="nav-item"><a class="nav-link px-2" href="{{route('home')}}"><i class="fas fa-user"></i></a></li>

            </ul>
        </div>
    </nav>
</div>

<div class="single-wrapper">
    <div class="single-product-img">
        <img src="{{ $product->image }}" height="400" width="400">
        <div>
            <p class="pick">choose size</p>
            <div class="sizes">
                <!--
                    Bu kısım database den çekilecek. Productlar için oluşturulan size bilgisinden alınacak.
                -->
                <div class="size">XS</div>
                <div class="size">S</div>
                <div class="size">M</div>
                <div class="size">L</div>
                <div class="size">XL</div>
            </div>
        </div>
    </div>
    <div class="single-product-info">
        <div class="single-product-text">

            <h1>{{ $product->name }}</h1>
            <h2>{{ $product->description }}</h2>
            <form class="form-horizontal poststars" action="{{route('review', $product->id)}}" id="addStar" method="POST">
                {{ csrf_field() }}
                <div class="form-group required">
                    <div class="col-sm-12">
                        <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                        <label class="star star-1" for="star-1"></label>
                    </div>
                </div>
            </form>

        </div>

        <div class="single-product-price-btn">
            <p><span>{{ $product->price }}</span>$</p>
            <form action="{{route('cart.ekle',$product->id)}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$product->id}}">
                <button type="submit" class="btn btn-outline-info btn-sm">ADD</button>
            </form>
        </div>
    </div>


    <div class="tabs_section_container">
        <div id="tab_3" class="tab_container">
            <div class="row">

                <!-- User Reviews -->

                <div class="col-lg-6 reviews_col">
                    <div class="tab_title reviews_title">
                        <h4>Reviews </h4>
                    </div>

                    <!-- User Review -->

                    <div class="user_review_container col-lg-8">
                        <div class="user">

                        </div>
                        @foreach($reviews as $review)
                        <div class="review">

                            <p><span style="font-size: 20px;">Comment: </span>{{$review->comment}}</p>
                            <p><span style="font-size: 20px;">Rating: </span>{{$review->rating}}</p>
                            <br><br>
                        </div>
                            @endforeach
                    </div>

                    <!-- User Review -->


                </div>

                <!-- Add Review -->

                <div class="col-lg-6 add_review_col">

                    <div class="add_review">
                        <form class="form-horizontal poststars" id="review_form" action="{{route('addreview', $product->id)}}" method = "POST">
                            {{ csrf_field() }}
                            <div>
                                <h1>Add Review</h1>
                                <input type= "hidden" name = "product_id" value = "{{$product->id}}" >
                                <!-- value doldurulacak -->
                                <input id="review_name" class="form_input input_name" type="text" name="comment" value = "" placeholder="Your Review" required="required" data-error="Name is required.">
                                <input id="review_email" class="form_input input_name" type="number" name="rating" value = "" placeholder="Rating" required="required" >
                            </div>


                            <div class="text-left text-sm-right">
                                <button type="submit" style= "width: 150px;" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>




</div>











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
