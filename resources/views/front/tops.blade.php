<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tops</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/temp.css">
    <link rel="stylesheet" href="/css/style.css">
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
                <li><a href="{{url('category/1')}}" class="nav-link">Top</a></li>
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

                <li class="nav-item"><a class="nav-link px-2" href= "shoppingcard.html"><i class="fas fa-shopping-cart"></i></a></li>
                <li class="nav-item"><a class="nav-link px-2" href="{{route('home')}}"><i class="fas fa-user"></i></a></li>

            </ul>
        </div>
    </nav>
</div>

<div class="container pt-5">
    <div class="row">


        <div class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
            <h3 class="mt-0 mb-5">Showing <span class="text-primary">12</span> Products</h3>
            <h6 class="text-uppercase font-weight-bold mb-3">Categories</h6>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-1">
                    <label class="custom-control-label" for="category-1">Accessories</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-2">
                    <label class="custom-control-label" for="category-2">Coats &amp; Jackets</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-3">
                    <label class="custom-control-label" for="category-3">Hoodies &amp; Sweatshirts</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-4">
                    <label class="custom-control-label" for="category-4">Jeans</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-5">
                    <label class="custom-control-label" for="category-5">Shirts</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-6">
                    <label class="custom-control-label" for="category-6">Underwear</label>
                </div>
            </div>
            <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
            <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Size</h6>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filter-size-1">
                    <label class="custom-control-label" for="filter-size-1">X-Small</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filter-size-2">
                    <label class="custom-control-label" for="filter-size-2">Small</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filter-size-3">
                    <label class="custom-control-label" for="filter-size-3">Medium</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filter-size-4">
                    <label class="custom-control-label" for="filter-size-4">Large</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filter-size-5">
                    <label class="custom-control-label" for="filter-size-5">X-Large</label>
                </div>
            </div>
            <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
            <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Price</h6>
            <div class="price-filter-control">
                <input type="number" class="form-control w-50 pull-left mb-2" value="50" id="price-min-control">
                <input type="number" class="form-control w-50 pull-right" value="150" id="price-max-control">
            </div>
            <input id="ex2" type="text" class="slider " value="50,150" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[50,150]" data-value="50,150" style="display: none;">
            <div class="align divider mt-5 mb-5 border-bottom border-secondary"></div>
            <a href="#" class="btn btn-lg btn btn-secondary mt-3">Update Results</a>
        </div>

        <div class="container-fluid col-sm-8">
            <div class="container d-flex justify-content-center mt-100">

                <div class="row">
                    @forelse($products as $top)
                    <div class="col-md-4">
                        <div class="product-wrapper mb-45 text-center">

                            <div class="product-img"> <a href="{{url('product',$top->id)}}" data-abc="true">

                                    <p>{{$top->name}}</p>
                                    <img src="{{url($top->image)}}" alt="" height="235" width="220"> </a>
                                <span class="text-center"><i class="fa fa-rupee"></i> ${{$top->price}}</span>
                                <div class="product-action">
                                    <div class="product-action-style"> <a href="{{url('product',$top->id)}}"> <i class="fa fa-plus"></i> </a> <a href=""> <i class="fa fa-heart"></i> </a> 
                                        <form action="{{route('cart.ekle',$top->id)}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$top->id}}">
                                            <input type="submit" class="btn btn-theme" value="ADD">
                                        </form> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h3>No tops avalaible</h3>
                    @endforelse


                </div>
            </div>
        </div>

    </div>
</div>




<!-- End -->












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

</body>

</html>
