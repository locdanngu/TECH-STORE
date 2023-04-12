<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Forgotpage.css">
    <title>Forgot Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.page') }}"><img src="/images/logo.png" width='100'></a>
            <a class="navbar-brand" href="{{ route('home.page') }}"><img src="/images/logo2.png" height='45'></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a href="{{ url('/Login.blade.php') }}" class="btn-login">Login</a>
                <a href="{{ url('/Signup.blade.php') }}" class="btn-signup">Sign up</a>
            </div>
        </div>
    </nav>


    @extends('layouts.Foot')
</body>

</html>