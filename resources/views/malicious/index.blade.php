<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warning</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            text-align: center;
        }

        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            max-width: 500px;
        }

        .btn-custom {
            background: #009688;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            color: #fff;
            font-size: 1.2rem;
            transition: background 0.3s;
        }

        .btn-custom:hover {
            background: #00796b;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Warning!</h1>
        <p>Hayoo mau ngapain?</p>
        <p>Your actions have been deemed malicious. You will be redirected to a safe page shortly.</p>
        <div id="countdown" style="margin-top: 20px; font-size: 1.5rem;"></div>
        <button class="btn btn-custom" onclick="redirectNow()">Redirect Now</button>
    </div>

    <!-- Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Countdown timer
        let countdownNumber = 10;
        const countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            countdownElement.textContent = `Redirecting in ${countdownNumber} seconds...`;
            countdownNumber--;
            if (countdownNumber < 0) {
                redirectNow();
            }
        }

        function redirectNow() {
            window.location.href = 'https://github.com/ghazafm'; // Change to your safe page URL
        }

        setInterval(updateCountdown, 1000);
        updateCountdown(); // Initial call
    </script>
</body>

</html>
