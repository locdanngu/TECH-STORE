<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Loginpage.css">
    <title>Login Page</title>
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


    <form method="POST" action="{{ route('login') }}" class="box1">
        @csrf
        <p class="tieudebox1">LOGIN TO STORE</p>
        <label>Email or phone(*): </label>
        <input type="text" required class="inputbox1" name="email" value="{{ old('email') }}">
        <label>Password(*): </label>
        <input type="password" required class="inputbox1" name="password">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        @error('error')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="botofinput">
            <div class="rmb">
                <input type="checkbox" class="ckbx">
                <p class="rmbtxt">Remember me</p>
            </div>
            <a href="{{ route('forgot.page') }}">Forgot password?</a>
        </div>
        <div class="btnfix">
            <button class="btnlogin">Login</button>
            <p class="rmbtxt">Don't have account? <a href="{{ route('signup.page') }}">Create one</a></p>
        </div>

    </form>

    @extends('layouts.Foot')
</body>

</html>