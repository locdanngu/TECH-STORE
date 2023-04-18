<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Profileuserpage.css">
    <title>Profile User Page</title>
</head>

<body>
    <div class="body">
        <div class="leftbody">
            <a href="{{ route('user.page') }}"><img src="/images/logo.png"></a>
            <p class="content">USER</p>
            <a class="linkus active" href="{{ route('profileuser.page') }}">
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
            <a class="linkus" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-in-left"></i>
                <p class="fixtxt">Logout</p>
            </a>
            <a class="linkus" href="{{ route('user.page') }}">
                <i class="bi bi-arrow-90deg-left"></i>
                <p class="fixtxt">Back to shop</p>
            </a>
        </div>
        <form class="rightbody" action="{{ route('profileuser.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <img id="preview" src="{{ asset($user->avatar) }}" class="avataruser">
            <div class="file-input-container">
                <input type="file" id="myFileInput" class="file-input" accept="image/*" name="avatar">
                <label for="myFileInput" class="file-input-label">Change image</label>
            </div>

            <div class="phantuuser">
                <p class="namephantu">Email: </p>
                <p class="namephantu">{{ $user->email }}</p>
            </div>
            <div class="phantuuser">
                <p class="namephantu">Phone: </p>
                <input type="text" class="nhapttuser" value="{{ $user->phone }}" name="phone">
            </div>
            <div class="phantuuser">
                <p class="namephantu">Name: </p>
                <input type="text" class="nhapttuser" value="{{ $user->name }}" name="name">
            </div>
            <div class="phantuuser">
                <p class="namephantu fix">Name: </p>
                <input class="savebtn" type="submit" value="Save">
            </div>

        </form>
    </div>
    @extends('layouts.Foot')
    <script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $("#preview").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    $("input[type=file]").change(function() {
        previewFile(this);
    });
    </script>
</body>

</html>