<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Profileuserpage.css">
    <title>Chat With Admin</title>
</head>

<body>
    <div class="body">
        <div class="leftbody">

            <a href="{{ route('user.page') }}"><img src="/images/logo.png"></a>
            <a class="linkus" href="{{ route('user.page') }}">
                <i class="bi bi-arrow-90deg-left"></i>
                <p class="fixtxt">Back to shop</p>
            </a>
            <hr style="border:1px solid #FFFFFF; width:100%">

            @foreach($useradmin as $useradmin)
            <div class="linkus" href="#" style="height:5em">
                <input type="hidden" value="{{ $useradmin->id }}">
                <img src="{{ $useradmin->avatar }}" style="width:50px; height:50px;border-radius:50%">
                <p class="fixtxt">{{ $useradmin->name }}</p>
            </div>

            @endforeach


        </div>
        <div style="display:flex; flex-direction: column; width:80%">

        </div>

    </div>
    @extends('layouts.Foot')
    <script>
    </script>
</body>

</html>