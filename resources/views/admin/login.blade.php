
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
</head>
<body>

    <header>

        <h1>Welcome to the Admin Panel</h1>
        
    </header>

    <main>
        <form class="loginForm" action="/adminsignin" method="post">
            @csrf
            <input class="input" type="text" name="email" placeholder="Email:"/>
            <input class="input" type="password" name="password" placeholder="Password:"/>
            <input class='btn' type="submit" value="Login">
            <a class="nav-link" href="/registration">Register</a>
        </form>
    </main>

    <footer>
        <p id="copyright"></p>
    </footer>

    <script src="{{asset('js/admin.js')}}"></script>
</body>
</html>