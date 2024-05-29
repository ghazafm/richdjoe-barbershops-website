<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richdjoe Barbershops</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(0, 19, 33, 255);
            color: white;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: rgb(246, 220, 172);
            position: relative;
            color: black;
        }

        .card img {
            object-fit: cover;
            width: 100%;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .footer-socials {
            background-color: rgba(33, 37, 41, 255);
            color: #fff;
            padding: 50px 0 50px;
            text-align: center;
        }

        .footer-socials h2 {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .footer-socials .socials img {
            width: 40px;
            margin: 10px;
        }

        .logo {
            height: 65px;
        }

        .form-inline .form-group {
            margin-bottom: 1rem;
        }

        .form-inline label {
            display: inline-block;
        }

        .form-inline .form-control {
            width: calc(100% - 150px);
        }

        .card-body p {
            margin-bottom: 1px;
        }

        .form-group {
            display: flex;
            align-items: center;
        }

        .form-group label {
            width: 120px;
        }

        .form-group span {
            margin: 5px;
        }

        .btn-sign {
            background-color: rgb(254, 174, 111);
            ;
            color: #fff;
            border: none;
            margin-left: 10px;
        }

        .btn-sign:hover {
            background-color: rgb(246, 220, 172);
        }

        .btn-custom {
            border-radius: 15px;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin: 10px 5px;
            width: 210px;
            margin-bottom: 1px;
        }

        .btn-order {
            background-color: rgb(255, 255, 255);
            color: black;
        }

        .btn-order:hover {
            background-color: lightgray;
            color: black;
        }

        .btn-reschedule {
            background-color: #dc830f;
            color: white;
        }

        .btn-reschedule:hover {
            background-color: rgb(201, 104, 30);
            color: white;
        }

        .btn-cancel {
            background-color: #b61d1d;
            color: white;
        }

        .btn-cancel:hover {
            background-color: darkred;
            color: white;
        }

        .detail {
            padding-bottom: 100px;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            color: black;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            width: 500px;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <header class="py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex flex-column align-items-center">
                <a href="/">
                    <img src="{{ asset('images/home/logo.png') }}" alt="Logo" class="logo mb-2">
                </a>
                <button class="btn btn-outline-secondary text-white" onclick="goBack()">⬅️ Back</button>
            </div>
            <div class="text-right ml-auto mr-3">
                <a href="/mybook" class="d-block text-white">My Booking</a>
                <a href="{{ route('profile.edit') }}" class="text-white">{{ Auth::user()->name }}, </a>
                <span id="current-time" class="text-muted"></span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <button class="btn btn-sign">Sign Out</button>
                </a>
            </form>
        </div>
    </header>
    <div class="container detail">
        <h1 class="text-center">Booking Detail</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 border-bottom border-dark font-weight-bold">
                            <span>Proof of Booking</span>
                            <span>@ {{ $transaction->kapster->place }}</span>
                        </div>
                        <form class="form-inline">
                            <div class="form-group w-100">
                                <label for="date">Date</label>
                                <span>:</span>
                                <p>{{ $transaction->schedule->format('Y-m-d') }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="time">Time</label>
                                <span>:</span>
                                <p>{{ $transaction->schedule->format('H:i') }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="service">Service</label>
                                <span>:</span>
                                <p>{{ $transaction->service->name }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="artist">Hair Artist</label>
                                <span>:</span>
                                <p>{{ $transaction->kapster->name }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="price">Price</label>
                                <span>:</span>
                                <p>{{ $transaction->total_price }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="code">Code</label>
                                <span>:</span>
                                <p>{{ $transaction->id }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="status">Status</label>
                                <span>:</span>
                                <p>{{ $transaction->service_status }}</p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-reschedule btn-custom" onclick="showReschedulePopup()">Reschedule</button>
                    <button class="btn btn-cancel btn-custom" onclick="showCancelPopup()">Cancel</button>
                </div>
                <div>
                    <a href="/book">
                        <button class="btn btn-order btn-custom">Order More</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="hidePopup()">&times;</span>
            <h2 id="popup-title"></h2>
            <p id="popup-message"></p>
            <p>Whatsapp : +62 817-9003-008</p>
            <p>Email : richdjoe@gmail.com</p>
        </div>
    </div>

    <footer class="footer-socials">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Our Socials</h2>
                    <div class="socials">
                        <a href="https://www.instagram.com/richdjoebarbershops/" target="_blank"><img src="{{ asset('images/home/instagram.png') }}" alt="Instagram"></a>
                        <a href="https://shorturl.at/Swdzg" target="_blank"><img src="{{ asset('images/home/wa.png') }}" alt="Whatsapp"></a>
                        <a href="https://www.tiktok.com/@richdjoebarbershops?_t=8mfes20zxib&_r=1" target="_blank"><img src="{{ asset('images/home/tt.png') }}" alt="TikTok"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateTime() {
            const currentTimeElement = document.getElementById('current-time');
            const now = new Date();
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            const formattedTime = now.toLocaleDateString('en-GB', options).replace(/,/g, '');
            currentTimeElement.textContent = formattedTime;
        }

        // Update time every second
        setInterval(updateTime, 1000);

        // Set initial time
        updateTime();

        function goBack() {
            window.history.back();
        }
    </script>
    <script>
        function showReschedulePopup() {
            document.getElementById('popup-title').innerText = 'Reschedule Booking';
            document.getElementById('popup-message').innerText = 'Please contact the admin to make changes to the booking schedule';
            document.getElementById('popup').style.display = 'flex';
        }

        function showCancelPopup() {
            document.getElementById('popup-title').innerText = 'Cancel Booking';
            document.getElementById('popup-message').innerText = 'Please contact the admin to cancel the booking.';
            document.getElementById('popup').style.display = 'flex';
        }

        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>

</body>

</html>