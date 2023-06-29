<!DOCTYPE html>
<html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>

    <div id="message-container"></div>


    <textarea id="input-textarea"></textarea>
    <button onclick="sendMessage()">Send</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.12.1/echo.min.js"></script>
    <script>
    const echo = new Echo({
        broadcaster: 'pusher',
        key: '{{ env('
        PUSHER_APP_KEY ') }}',
        cluster: '{{ env('
        PUSHER_APP_CLUSTER ') }}',
        // Thêm các cấu hình khác (nếu cần)
    });

    echo.channel('message')
        .listen('.message.sent', (event) => {
            console.log('API message đã được gửi thành công!');
        });
    </script>
</body>

</html>