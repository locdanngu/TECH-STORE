<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Profileuserpage.css">
    <title>Profile User Page</title>
</head>

<body>
    <div class="body">
        <div class="leftbody">
            <a href="{{ route('user.page') }}"><img src="/images/logo.png"></a>
            <p class="content">USER</p>
            <a class="linkus active">
                <i class="bi bi-person"></i>
                <p class="fixtxt">Profile</p>
            </a>
            <a class="linkus">
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
            <a class="linkus">
                <i class="bi bi-box-arrow-in-left"></i>
                <p class="fixtxt">Logout</p>
            </a>
            <a class="linkus" href="{{ route('user.page') }}">
                <i class="bi bi-arrow-90deg-left"></i>
                <p class="fixtxt">Back to shop</p>
            </a>
        </div>
        <form class="rightbody" action="" method="POST">
            <img src="/images/sample2.png" class="avataruser">
            <div class="file-input-container">
                <input type="file" id="myFileInput" class="file-input" accept="image/*">
                <label for="myFileInput" class="file-input-label">Change image</label>
            </div>

            <div class="phantuuser">
                <p class="namephantu">Email: </p>
                <p class="namephantu">19T1021119@husc.edu.vn</p>
            </div>
            <div class="phantuuser">
                <p class="namephantu">Phone: </p>
                <input type="text" class="nhapttuser" value="+84977481545" name="phone">
            </div>
            <div class="phantuuser">
                <p class="namephantu">Name: </p>
                <input type="text" class="nhapttuser" value="Trần Văn Lộc" name="name">
            </div>
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