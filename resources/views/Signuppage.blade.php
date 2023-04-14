<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Loginpage.css">
    <title>Signup Page</title>
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


    <form method="POST" action="{{ route('register') }}" class="box1">
        @csrf
        <p class="tieudebox1">SIGN UP</p>
        <label>Email(*): </label>
        <input type="text" required class="inputbox1" name="email">
        <label>Phone(*): </label>
        <input type="text" required class="inputbox1" name="phone">
        <label>Name(*): </label>
        <input type="text" required class="inputbox1" name="name">
        <label>Password(*): </label>
        <input type="password" required class="inputbox1" name="password">
        <label>Re-enter your password(*): </label>
        <input type="password" required class="inputbox1" name="password2">
        <div class="botofinput">
            <div class="rmb">
                <input type="checkbox" class="ckbx" name="agree">
                <p class="rmbtxt">I agree to the terms</p>
            </div>
            <a href="{{ route('login.page') }}">Already have an account?</a>
        </div>
        <div class="btnfix">
            <button class="btnlogin">SIGN UP</button>
        </div>

    </form>

    

    @extends('layouts.Foot')
</body>

</html>