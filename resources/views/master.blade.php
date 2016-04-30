<!DOCTYPE html>
<html>
    <head>
        <title>
            Nasctec Commerce - @yield('title')
        </title>

        <link href="{{elixir('css/all.css')}}" rel="stylesheet" type="text/css">

    </head>
    <body>


        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('categories')}}">Categories</a></li>
                <li><a href="{{route('products')}}">Products</a></li>
            </ul>
        </div><!--/.nav-collapse -->


        <div class="container">
            <div class="content">
                <h1>Nasctec Commerce - @yield('title')</h1>
                @yield('content')
            </div>
        </div>
    </body>
</html>