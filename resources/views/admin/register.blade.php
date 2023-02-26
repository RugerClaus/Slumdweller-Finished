<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="/register" method="post">
        @csrf
        <input type="text" name="username" placeholder="Username:">
        <input type="text" name="email" placeholder="Email:">
        <input type="password" name="password" placeholder="Password:">
        <input type="submit" value="Register">
        <a href="/login">Already a user?</a>
    </form>
</body>
</html>