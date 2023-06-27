<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Trade - :</p>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('trades').listen('NewTrade', (e) => {
            console.log(e);
        });
    </script>
</body>
</html>