<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Loginpage.css">
    <title>Forgot Password</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.page') }}"><img src="/images/logo.png" width='100'></a>
            <a class="navbar-brand" href="{{ route('home.page') }}"><img src="/images/logo2.png" height='45'></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a href="{{ route('login.page') }}" class="btn-login">Login</a>
                <a href="{{ route('signup.page') }}" class="btn-signup">Sign up</a>
            </div>
        </div>
    </nav>

    <p class="tieudebox1" style="margin-top:2em !important">Send Code to email</p>
    <div style="display:flex">

    </div>
    <form method="POST" action="" class="box1">
        @csrf
        <label>Enter Email(*): </label>
        <div>
            <input type="email" required class="inputbox1" name="email" placeholder="Email" style="width:75%;margin-right:2%">
            <button class="btnlogin" style="height:2.5em;width:20%">Submit</button>
        </div>
    </form>
    @extends('layouts.Foot')
</body>

</html>