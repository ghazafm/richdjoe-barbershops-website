<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richdjoe Barbershops</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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

        .profil-capster {
            padding-bottom: 100px;
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

        .rating-section {
            background-color: rgb(246, 220, 172);
            color: black;
            border-radius: 15px;
            padding: 20px;
        }

        .rating-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .rating-header h4 {
            margin: 0;
        }

        .stars i {
            color: #e6e6e6;
            font-size: 35px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .stars span {
            font-size: 2rem;
            color: rgb(0, 0, 0);
            margin-right: 5px;
        }

        .reviews-section {
            text-align: left;
            background-color: rgb(255, 250, 230);
            padding: 15px;
            border-radius: 10px;
            color: black;
        }

        .review {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .review:last-child {
            border-bottom: none;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .review-header span {
            font-weight: bold;
        }

        .review p {
            margin: 5px 0 0;
        }

        .review-stars {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 5px;
        }

        .review-stars span {
            font-size: 1rem;
            color: rgb(0, 0, 0);
            margin-right: 2px;
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
    <main class="container profil-capster" id="profil-capster">
        <h1 class="text-center mb-4">Hair Artist Profile</h1>
        <div class="row justify-content-center text-center text-light">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/kapster/' . strtolower(str_replace(' ', '', $kapster->id)) . '.jpg') }}" alt="{{ $kapster->name }}">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">{{ $kapster->name }}</h4>
                        <a href="/book/service/kapster/schedule/{{ $place }}/{{ $service }}/{{ $kapster->id }}">
                            <button class="btn-pilih">SELECT</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card rating-section">
                    <div class="card-body">
                        <div class="rating-header">
                            <h4>Service by {{ $kapster->name }}</h4>
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++) <i class="fa-solid fa-star" data-star="{{ $i }}" style="color: {{ $i <= $rating ? 'gold' : 'gray' }}"></i>
                                    @endfor
                                    <span>{{ number_format($rating, 1) }}</span>
                            </div>
                        </div>
                        <h2>Reviews</h2>
                        <div class="reviews-section">
                            @foreach ($comments as $comment)
                            <div class="review">
                                <div class="review-header">
                                    <span>{{ $comment['name'] }}</span>
                                </div>
                                <div class="review-stars">
                                    <div class="stars-review">
                                        @for ($i = 1; $i <= 5; $i++) <i class="fa-solid fa-star" data-star="{{ $i }}" style="color: {{ $i <= $comment['rating'] ? 'gold' : 'gray' }}"></i>
                                            @endfor
                                    </div>
                                    <span>{{ $comment['date'] }}</span>
                                </div>
                                <p>{{ $comment['comment'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
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