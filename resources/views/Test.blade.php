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

    <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('ea12aec9241c98d61eef', {
        cluster: 'ap1',
        forceTLS: true
    });

    var messageContainer = document.getElementById('message-container');

    var channel = pusher.subscribe('normal-cow-680');
    channel.bind('my-event', function(data) {
        messageContainer.innerHTML = data;
    });

    channel.bind('pusher:subscription_succeeded', function(data) {
        console.log("Subscription succeeded:", data);
    });


    // function sendMessage() {
    //     var inputTextarea = document.getElementById('input-textarea');
    //     var message = inputTextarea.value;

    //     channel.trigger('client-my-event', {
    //         message: message
    //     });

    //     inputTextarea.value = '';
    // }
    </script>
</body>

</html>