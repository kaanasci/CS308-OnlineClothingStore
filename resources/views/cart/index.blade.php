<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
                <li class="nav-item"><a class="nav-link px-2" href="#"><i class="fas fa-search"></i></a></li>
                <li class="nav-item"><a class="nav-link px-2" href="#"><i class="fas fa-shopping-cart"></i></a></li>
                <li class="nav-item"><a class="nav-link px-2" href="#"><i class="fas fa-user"></i></a></li>

            </ul>
        </div>
    </nav>
</div>

<div class= "small-container card-page">

    @if (count(Cart::content()) >0)
    <table>
        <tr>
            <th> Product</th>
            <th> Name</th>
            <th> Price</th>
            <th> Quantity</th>
            <th> Total</th>
        </tr>
        @foreach($cartItems as $cartItem)
        <tr>
            <td> <img src="{{$cartItem->tax}}"></td>

            <td>{{$cartItem->name}}
            <form action="{{route('cart.delete', $cartItem->rowId)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-link"><i class="fas fa-trash-alt"></i></button>
            </form>
            </td>

            <td>${{$cartItem->price}}</td>

            <td width="50px">

                <form action ="{{route('cart.update',$cartItem->rowId)}}" method="get">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <input name="qty" type="number" value="{{$cartItem->qty}}">
                    <button type="submit" class="btn btn-outline-info btn-sm">Edit</button>
                </form>

            </td>

            <td class="text-right">${{$cartItem->subtotal}}</td>
        </tr>
        @endforeach



    </table>

            <form action = "{{route('cart.deleteall')}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                
            </form>
        

    @else
        <p>No Product in your Shopping Bag</p>

    @endif

    <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>${{Cart::subtotal()}}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>{{Cart::tax()}}</td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td>${{Cart::total()}}</td>
            </tr>
        </table>

    </div>
    <br>
        <br>
        <div class = "text-right">
            <a href="{{route('order')}}"class="btn btn-outline-info">Proceed to Payment</a>
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

</body>

</html>