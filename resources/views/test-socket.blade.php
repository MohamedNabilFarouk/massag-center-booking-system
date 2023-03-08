<html>
    <head>
    </head>

    <body>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.2/socket.io.js"></script>
        <script>
		var connectionOptions =  {
            "force new connection" : true,
            "reconnectionAttempts": "Infinity",
            "timeout" : 10000
        };
                var socket = io.connect('http://144.91.100.164:8890',connectionOptions);
                socket.on('providers/27', function(data) {
                    console.log('Got announcement:', data);
                });

				socket.emit('message', '{"message":"Test Message from provider","identifier":"customer-provider","customer_id":20,"provider_id":27,"sent_by":"provider","order_id":280}');
        </script>
    </body>
</html>
