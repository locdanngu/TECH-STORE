<!DOCTYPE html>
<html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>message</code>
        with event name <code>message.sent</code>.
    </p>

    <div id="message-container"></div>


    <textarea id="input-textarea"></textarea>
    <button onclick="sendMessage()">Send</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.12.1/echo.min.js" type="module"></script>
    <script>
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });

        const channel = pusher.subscribe('message');
        channel.bind('message.sent', function(data) {
            const messageContainer = document.getElementById('message-container');
            messageContainer.innerHTML = 'API message đã được gửi thành công!';
        });
    </script>
</body>

</html>
