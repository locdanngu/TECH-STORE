<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Loginpage.css">
    <title>Change Your Password</title>
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

    <p class="tieudebox1" style="margin-top:1em !important">Change Your Password</p>

    <form method="POST" action="{{ route('findemailchangepassword.user') }}" class="box1" style="margin-top: 1em">
        @csrf
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
        @error('code')
        <p class="error">{{ $message }}</p>
        @enderror
        <label>Enter Code(*): </label>
        <input type="hidden" value="{{ $useremail }}" name="email">
        <input type="text" required class="inputbox1" max-length="6" name="code" placeholder="Code">
        <label>Password(*): </label>
        <input type="password" required class="inputbox1" min-length="6" max-length="18" name="password"
            placeholder="New password">
        <label>Re-enter Password(*): </label>
        <input type="password" required class="inputbox1" min-length="6" max-length="18" name="password2"
            placeholder="Re-enter new password">
        <div class="btnfix" style="margin-top: 1em">
            <button class="btnlogin">Change</button>
        </div>
    </form>
    @extends('layouts.Foot')
</body>

</html>