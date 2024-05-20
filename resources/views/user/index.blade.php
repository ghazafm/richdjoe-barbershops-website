<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richdjoe Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <style>
        body {
            background-color: #FFEAEA;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
        }
        .navbar {
            background-color: #30475E;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: bold;
            color: #FFF;
        }
        .navbar-nav {
            margin-right: 100px; /* Adjust this value to move the menu to the left */
        }
        .navbar-nav .nav-link {
            color: #FFF !important;
        }
        .navbar-nav .nav-link:hover {
            color: #FFD700 !important;
        }
        .btn-custom {
            background-color: #FF6F6F;
            color: #FFF;
            border-radius: 25px;
        }
        .btn-custom:hover {
            background-color: #FF4C4C;
            color: #FFF;
        }
        .book {
            background-color: #FF6F6F;
            color: #FFF;
            border-radius: 25px;
            text-align: center;
            align-items: center;
            width: 200px;
            height: 50px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-decoration: none; /* Remove underline */
            margin-top: 40px; /* Add space above the button */
        }
        .book:hover {
            background-color: #FF4C4C;
            color: #FFF;
        }
        .main-content {
            text-align: center;
            padding: 150px 0 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .main-content h1 {
            font-size: 4em;
            font-weight: bold;
            color: #000;
        }
        .main-content img {
            width: 80%; /* Adjust this value as needed */
            max-width: 1200px;
            height: auto;
        }
        .footer {
            background-color: #30475E;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }
        .footer .socials {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .footer .socials img {
            width: 40px;
            height: 40px;
        }
        .services, .capster {
            text-align: center;
            padding: 50px 0;
        }
        .services h2, .capster h2 {
            font-size: 3em;
            margin-bottom: 30px;
        }
        .capster{
            padding: 0 0px;
        }
        .service-card, .capster-card {
            display: inline-block;
            width: 500px;
            margin: 20px;
            text-align: center;
            border: 2px solid #FF6F6F;
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }
        .service-card img, .capster-card img {
            width: 100%;
            height: auto;
        }
        .service-card h3, .capster-card h3 {
            font-size: 1.2em;
            margin: 10px 0;
            color: #000;
        }
        .swiper-container {
            width: 100%;
            height: 100%;
            position: relative; /* Ensures the navigation buttons are positioned correctly */
        }
        .swiper-button-next,
        .swiper-button-prev {
            color: #FF6F6F; /* Customize the color as needed */
        }
        /* Updated CSS */
.swiper-slide {
    width: 530px !important; /* Adjust the width as needed */
    margin-right: 10px !important; /* Adjust the margin as needed */
}

 

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/home/logo.png') }}" alt="Logo" style="height: 80px;">
                RICHDJOE BARBERSHOP
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/book">BOOK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#capster">HAIR ARTIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PRODUCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>
                    <!-- Authentication Links -->
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                                                Log Out
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link btn btn-custom ms-2" href="{{ route('register') }}">SIGN UP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-custom ms-2" href="{{ route('login') }}">SIGN IN</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <!-- Content here -->
        <h1>Welcome to Richdjoe Barbershop</h1>
        <img class="barber" src="{{ asset('images/home/barber.jpg') }}" alt="Barbershop">
        <a class="book" href="#">Book Now</a>
    </div>

    <div class="services" id="services">
        <h2>SERVICES</h2>
        <p>Richdjoe menyediakan beberapa layanan servis</p>
        <div class="service-card">
            <img src="{{ asset('images/services/service1.jpg') }}" alt="Haircut">
            <h3>HAIRCUT</h3>
        </div>
        <div class="service-card">
            <img src="{{ asset('images/services/service2.jpg') }}" alt="Treatment">
            <h3>TREATMENT</h3>
        </div>
        <div class="service-card">
            <img src="{{ asset('images/services/service3.jpg') }}" alt="Bleaching">
            <h3>BLEACHING</h3>
        </div>
        <div class="service-card">
            <img src="{{ asset('images/services/service4.jpeg') }}" alt="Toning">
            <h3>TONING</h3>
        </div>
        <div class="service-card">
            <img src="{{ asset('images/services/service5.jpg') }}" alt="Fashion Color">
            <h3>FASHION COLOR</h3>
        </div>
    </div>

    <div class="capster" id="capster">
        <h2>HAIR ARTIST</h2>
        <p>Richdjoe memiliki beberapa hair artist</p>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide capster-card">
                    <img src="{{ asset('images/services/service1.jpg') }}" alt="Haircut">
                    <h3>PONERI</h3>
                </div>
                <div class="swiper-slide capster-card">
                    <img src="{{ asset('images/services/service2.jpg') }}" alt="Treatment">
                    <h3>ANANG</h3>
                </div>
                <div class="swiper-slide capster-card">
                    <img src="{{ asset('images/services/service3.jpg') }}" alt="Bleaching">
                    <h3>BRIAN</h3>
                </div>
                <div class="swiper-slide capster-card">
                    <img src="{{ asset('images/services/service3.jpg') }}" alt="Bleaching">
                    <h3>JODI</h3>
                </div>
                <div class="swiper-slide capster-card">
                    <img src="{{ asset('images/services/service3.jpg') }}" alt="Bleaching">
                    <h3>DHEA</h3>
                </div>
                <div class="swiper-slide capster-card">
                    <img src="{{ asset('images/services/service3.jpg') }}" alt="Bleaching">
                    <h3>BAHRUL</h3>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <footer class="footer">
        <h2>Our Socials</h2>
        <div class="socials">
            <a href="https://www.instagram.com/richdjoebarbershops/"><img src="{{ asset('images/home/instagram.png') }}" alt="Instagram"></a>
            <a href="#"><img src="{{ asset('images/home/wa.png') }}" alt="Whats App"></a>
            <a href="#"><img src="{{ asset('images/home/tt.png') }}" alt="TikTok"></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>  
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>