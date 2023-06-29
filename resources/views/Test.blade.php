<!DOCTYPE html>
<html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
</head>

<body>
    <b>Trade:- </b>
    <span id="trade-data"></span>


    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('trades').listen('NewTrade', (e) => {
            console.log(e);
        });
    </script>
</body>

</html>
