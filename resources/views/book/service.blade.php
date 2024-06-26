<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richdjoe Barbershops</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tes.css">
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
            max-width: 100%;
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

        .btn-pilih {
            background-color: rgb(255, 250, 230);
            border-radius: 15px;
            border: none;
            margin-top: auto;
            width: 100%;
            padding: 5px 0;
        }

        .btn-pilih:hover {
            background-color: black;
            color: white;
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

        .services {
            padding-bottom: 100px;
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

    <main class="container services" id="services">
        <h1 class="text-center mb-4">Please Choose the Type of Services</h1>
        <div class="row justify-content-center text-center text-light">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/services/1.jpg') }}" alt="haircut">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">HAIRCUT</h4>
                        <h6 class="card-text">IDR 85.000 - 139.000</h6>
                        <a href="/book/service/haircut/{{ $place }}">
                            <button class="btn-pilih">SELECT</button>
                        </a>
                    </div>
                </div>
            </div>
            @foreach($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/services/' . strtolower(str_replace(' ', '', $service->id)) . '.jpg') }}" alt="{{ $service->name }}">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">{{ $service->name }}</h4>
                        <h6 class="card-text">IDR {{ number_format($service->price, 0, ',', '.') }}</h6>
                        <a href="/book/service/kapster/{{ $place }}/{{ $service->id }}">
                            <button class="btn-pilih">SELECT</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

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