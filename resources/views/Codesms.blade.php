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

    <p class="tieudebox1" style="margin-top:2em !important">Verify Your Phone Number</p>
    <div style="display:flex">

    </div>
    <form method="POST" action="" class="box1">
        @csrf
        <label>Enter Code SMS(*): </label>
        <div>
            <input type="hidden" name="random_number" value="{{ $random_number }}">
            <input type="hidden" name="email" value="{{ $input['email'] }}">
            <input type="hidden" name="phone" value="{{ $input['phone'] }}">
            <input type="hidden" name="name" value="{{ $input['name'] }}">
            <input type="hidden" name="password" value="{{ $input['password'] }}">
            <input type="text" required class="inputbox1" name="codesms" placeholder="Code SMS" style="width:75%;margin-right:2%">
            <button class="btnlogin" style="height:2.5em;width:20%">Submit</button>
        </div>
    </form>
    <?php
    // dd($input);
    ?>
    <form class="box1" style="margin-top:0">
        @csrf
        <input type="hidden" value="{{ $input['phone'] }}">
        <input type="submit" value="Re-Send SMS" class="btnlogin">
    </form>
    @extends('layouts.Foot')
</body>

</html>