<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Cartpage.css">
    <title>My Cart</title>
</head>

<body>
    <div class="body">
        <div class="leftbody">
            <a href="{{ route('user.page') }}"><img src="/images/logo.png"></a>
            <p class="content">USER</p>
            <a class="linkus" href="{{ route('profileuser.page') }}">
                <i class="bi bi-person"></i>
                <p class="fixtxt">Profile</p>
            </a>
            <a class="linkus" href="{{ route('changepassword.page') }}">
                <i class="bi bi-lock"></i>
                <p class="fixtxt">Change Password</p>
            </a>
            <a class="linkus active" href="{{ route('cart.page') }}">
                <i class="bi bi-cart"></i>
                <p class="fixtxt">My Cart</p>
            </a>
            <a class="linkus" href="{{ route('order.page') }}">
                <i class="bi bi-list-ul"></i>
                <p class="fixtxt">My Purchase order</p>
            </a>
            <a class="linkus" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-in-left"></i>
                <p class="fixtxt">Logout</p>
            </a>
            <a class="linkus" href="{{ route('user.page') }}">
                <i class="bi bi-arrow-90deg-left"></i>
                <p class="fixtxt">Back to shop</p>
            </a>
        </div>
        <div class="rightbody">
            <div class="headright">
                <div class="sotien">
                    <p class="txtblc">Account balance: <span id="balance" style="font-weight:bold">******</span></p>
                    <i class="bi bi-eye-slash" id="eye1"></i>
                    <i class="bi bi-eye" id="eye2"></i>
                </div>
                <button class="naptien">Recharge</button>
            </div>


        </div>
    </div>
    @extends('layouts.Foot')
    <script>
    $(document).ready(function() {
        var isHidden = true;
        var balance = '10000.00$';

        $('#eye1, #eye2').click(function() {
            if (isHidden) {
                $("#eye2").hide();
                $("#eye1").show();
                $('#balance').text(balance);
                isHidden = false;
            } else {
                $("#eye1").hide();
                $("#eye2").show();
                $('#balance').text('******');
                isHidden = true;
            }
        });
    });
    </script>
</body>

</html>