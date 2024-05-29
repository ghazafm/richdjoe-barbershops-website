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
            margin-bottom: 20px;
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

        .btn-sign {
            background-color: rgb(254, 174, 111);
            color: #fff;
            border: none;
            margin-left: 10px;
        }

        .btn-sign:hover {
            background-color: rgb(246, 220, 172);
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

        .btn-confirm {
            background-color: #007bff;
            color: white;
            border-radius: 15px;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-bottom: 100px;
        }

        .btn-confirm:hover {
            background-color: #0056b3;
            color: white;
        }

        .konfirmasi {
            padding-bottom: 100px;
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
                <a href="" class="d-block text-white">My Booking</a>
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
    <div class="container konfirmasi">
        <h1 class="text-center">Booking Confirmation</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form class="form-inline">
                            <div class="form-group w-100 bg-transparent">
                                <label for="name">Name</label>
                                <span>:</span>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="email">Email</label>
                                <span>:</span>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="phone">No Hp</label>
                                <span>:</span>
                                <p>{{ $user->phone }}</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form class="form-inline">
                            <div class="form-group w-100">
                                <label for="tanggal">Date</label>
                                <span>:</span>
                                <p>{{ $schedule->format('Y-m-d') }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="jam">Time</label>
                                <span>:</span>
                                <p>{{ $schedule->format('H:i') }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="service">Service</label>
                                <span>:</span>
                                <p>{{ $service->name }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="artist">Hair Artist</label>
                                <span>:</span>
                                <p>{{ $kapster->name }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="price">Price</label>
                                <span>:</span>
                                <p>{{ $service->price }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="store">Store</label>
                                <span>:</span>
                                <p>{{ $kapster->place->name }}</p>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="/book/service/kapster/schedule/confirmation/{{ $kapster->place }}/{{ $service->id }}/{{ $kapster->id }}/{{ $schedule }}">
                    <button class="btn btn-confirm">Confirm Booking</button>
                </a>
            </div>
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
</body>

</html>