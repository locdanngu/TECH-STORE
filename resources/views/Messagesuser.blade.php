<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Profileuserpage.css">
    <title>Chat With Admin</title>

    <style>
    .sendbtn {
        padding: .5em;
        border-radius: 5px;
        font-weight: bold;
        height: 3em;
    }

    .sendbtn:hover {
        background-color:
    }

    .textarea {
        width: 90%;
        padding-left: 0.5em;
        resize: none;
        border-radius: 5px;
        height: 3em;
    }

    .hr {
        width: 100%;
        border: .5px solid white;
        margin: 0 !important;
    }

    .img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
    </style>
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
            <div class="linkus boxchat" href="#" style="height:5em">
                <input type="hidden" value="{{ $useradmin->id }}" name="sender_id">
                <img src="{{ $useradmin->avatar }}" style="width:50px; height:50px;border-radius:50%">
                <p class="fixtxt">{{ $useradmin->name }}</p>
            </div>

            @endforeach


        </div>
        <div style="display:flex; flex-direction: column; width:80%;padding:2em" id="boxchat">
            <!-- <span style="font-size:3em;color:white">Choice 1 admin your want to chat!</span> -->
            
        </div>

    </div>
    @extends('layouts.Foot')
    <script>
    $(document).ready(function() {
        function choiceboxchat() {
            $(".linkus.boxchat").removeClass("active");
            $(this).addClass("active");
            var inputVal = $(this).find('input').val();
            $.ajax({
                type: 'POST',
                url: '{{ route("user.boxmessage") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    sender_id: inputVal
                },
                success: function(response) {
                    var html = response.html;
                    $('#boxchat').html(html);
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu cần
                }
            });
        }

        $('.linkus.boxchat').on("click", choiceboxchat);
    });
    </script>
</body>

</html>