@guest
    <p>Must Be logged in to see this page</p>
@else



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
</head>
<body>

    <header>
        <a href="/admin">Home</a>
        <a href="/add_to_tour">Tour Dates</a>
        <a href="/tour_manager">Tour Manager</a>
        <a href="/add_products">Add Products</a>
        <a href="/product_manager">Product Manager</a>
        <a href="/mail">Mail</a>
        <a href="/orders">Orders</a>
        <form action="/logout" method="POST">
            @csrf
            <input type="submit" class="btn" value="Log Out">
        </form>
        
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <a href="/problemreporting" class="btn" style="color: black;">Have a problem?</a>
        <p id="copyright"></p>
    </footer>

    <script src="{{asset('js/admin.js')}}"></script>
</body>
</html>

@endguest