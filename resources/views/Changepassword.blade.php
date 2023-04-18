<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Changepassword.css">
    <title>Change password</title>
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
            <a class="linkus">
                <i class="bi bi-cart"></i>
                <p class="fixtxt">My Cart</p>
            </a>
            <a class="linkus">
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
        <form action="" method="POST" class="rightbody">
            @csrf
            <p class="contentform">CHANGE PASSWORD</p>
            <div class="phantuuser">
                <p class="namephantu">Password: </p>
                <input type="password" class="nhapttuser" name="oldpassword" required>
            </div>
            <div class="phantuuser">
                <p class="namephantu">New Password: </p>
                <input type="password" class="nhapttuser" name="newpassword" required>
            </div>
            <div class="phantuuser">
                <p class="namephantu">Re-Enter Password: </p>
                <input type="password" class="nhapttuser" name="newpassword2" required>
            </div>
            @error('oldpassword')
            <p class="error">{{ $message }}</p>
            @enderror
            @error('oldnewpassword')
            <p class="error">{{ $message }}</p>
            @enderror
            @error('newpassword')
            <p class="error">{{ $message }}</p>
            @enderror
            @error('success')
            <p class="error">{{ $message }}</p>
            @enderror
            @error('unsuccess')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="phantuuser">
                <p class="namephantu fix">Name: </p>
                <input class="savebtn" type="submit" value="Save">
            </div>
        </form>
    </div>
    @extends('layouts.Foot')
    <script>

    </script>
</body>

</html>