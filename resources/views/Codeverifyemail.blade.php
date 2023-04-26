<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Profileuserpage.css">
    <title>Verify Your Email</title>
</head>

<body>
    <div class="body">
        <div class="leftbody">
            <a href="{{ route('user.page') }}"><img src="/images/logo.png"></a>
            <p class="content">USER</p>
            <img src=" {{ $user->avatar }}" class="smallavatar">
            <a class="linkus" href="{{ route('profileuser.page') }}">
                <i class="bi bi-person"></i>
                <p class="fixtxt">Profile</p>
            </a>
            <a class="linkus" href="{{ route('changepassword.page') }}">
                <i class="bi bi-lock"></i>
                <p class="fixtxt">Change Password</p>
            </a>
            <a class="linkus" href="{{ route('cart.page') }}">
                <i class="bi bi-cart"></i>
                <p class="fixtxt">My Cart</p>
            </a>
            <a class="linkus" href="{{ route('order.page') }}">
                <i class="bi bi-list-ul"></i>
                <p class="fixtxt">My Purchase order</p>
            </a>
            <a class="linkus" href="{{ route('user.page') }}">
                <i class="bi bi-arrow-90deg-left"></i>
                <p class="fixtxt">Back to shop</p>
            </a>
            <a class="linkus" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-in-left"></i>
                <p class="fixtxt">Logout</p>
            </a>
        </div>
        <div style="display:flex; flex-direction: column; width:80%;justify-content: center;align-items: center;">
            <form method="POST" action="{{ route('verifyemailcode.user') }}">
                @csrf
                <input class="nhapttuser" type="text" maxlength="6" required placeholder="Verify Code" name="code">
                <input class="savebtn" type="submit" value="Submit">
            </form>
            <form method="POST" action="{{ route('verifyemail.user') }}" style="margin:2em 0 2em 0">
                @csrf
                <input type="hidden" value="{{ $useremail }}" name="email">
                <button class="savebtn" id="resend-btn" type="button">Re-Send Code</button>
            </form>
            @error('error')
            <p class="error" style="color:red">{{ $message }}</p>
            @enderror
        </div>

    </div>
    @extends('layouts.Foot')
    <script>
    </script>
</body>

</html>