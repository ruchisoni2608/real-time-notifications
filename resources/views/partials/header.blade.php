<!DOCTYPE html>
<html>
<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var pusher = new Pusher('d527e3393ee94aa487e7', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            var notificationArea = document.getElementById('notification-area');

// Create a unique identifier for each notification
var notificationId = 'notification-' + Date.now();
console.log(data);
// var notification = document.createElement('div');
// notification.id = notificationId;
// notification.className = 'notification';
// notification.innerHTML = '<p>' + JSON.stringify(data.message) + '</p>';
// notificationArea.appendChild(notification);

// Calculate time difference in milliseconds
var followUpTime = new Date(data.follow_up_at).getTime();
var currentTime = new Date().getTime();
var timeDifference = followUpTime - currentTime;
console.log('Follow-Up Time:', followUpTime);
            console.log('Current Time:', currentTime);
            console.log('Time Difference:', timeDifference);
console.log(Date.now());

 //alert(followUpTime,currentTime);
setTimeout(function() {
                // Create a unique identifier for each notification
                var notificationId = 'notification-' + Date.now();

                var notification = document.createElement('div');
                notification.id = notificationId;
                notification.className = 'notification';
                notification.innerHTML = '<p>' + (data.message) + '</p>';
                notificationArea.appendChild(notification);

                // Automatically remove notification after a certain period
                setTimeout(function() {
                    var notificationToRemove = document.getElementById(notificationId);
                    if (notificationToRemove) {
                        notificationToRemove.remove();
                    }
                }, 90000); // Adjust as needed for how long you want the notification to display
            }, timeDifference);
// Automatically remove notification after 5 seconds
// setTimeout(function() {
//     var notificationToRemove = document.getElementById(notificationId);
//     if (notificationToRemove) {
//         notificationToRemove.remove();
//     }
// }, 30000);
            // Display notification in the notification area
            // var notificationArea = document.getElementById('notification-area');
            // var notification = document.createElement('div');
            // notification.className = 'notification';
            // notification.innerHTML = '<p>' + JSON.stringify(data.message) + '</p>';
            // notificationArea.appendChild(notification);
        });
    </script>
    <style>
        .notification-area {
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            z-index: 1000;
        }
        /* .notification {
            background-color: #ffc107;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        } */
        .notification {
            background-color: #ffc107;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            animation: fadeInOut 0.5s ease-in-out;
        }
        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body>
    <header>
<div class="container">

    <div id="notification-area" class="notification-area">notification</div>
</div>
    </header>
</body>
</html>
