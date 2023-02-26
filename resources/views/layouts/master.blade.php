<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') || Slumdweller</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
    <header>
        <a href="/"><img class="homeButton" src="{{asset("assets/images/slumdweller-logo-mobile.webp")}}" alt="<h1>Slumdweller</h1>"></a>
        <a href="/media">Media</a>
        <a href="/merch">Merch</a>
        <a href="/about">About</a>
    </header>
    <a href="/cart" class="cart">{{DB::table('carts')->where('UserId', '=', session()->getId())->count()}}<img src="{{asset('assets/icons/cart.svg')}}" alt=""></a>
    <main>
        @yield('content')
    </main>
    <footer id="wrapper">
        <p id="copyright"></p>
        <form action="/contact">
            <button type="submit" class="btn">Contact Us</button>
        </form>
    </footer>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>