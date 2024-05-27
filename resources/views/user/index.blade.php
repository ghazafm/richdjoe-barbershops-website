<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richdjoe Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <style>
        body {
            background: url("{{ asset('images/home/bg2.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
        }

        .navbar {
            background-color: transparent;
        }

        .navbar-brand {
            color: #fff;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 75px;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .main-content {
            margin-bottom: 100px;
            padding-left: 150px;
            min-height: 80vh;
            display: flex;
        }

        .main-content h1 {
            font-size: 3rem;
        }

        .about-us {
            padding: 200px;
            background-position: center;
            background-size: 100%;
        }

        .about-us h1 {
            font-size: 3rem;
            color: white;
            padding-bottom: 20px;
        }

        .about-us span {
            color: white;
        }

        .about-us img {
            height: 100%;
            max-height: 1000px;
            border: 10px solid rgb(246, 220, 172);

        }

        .btn-book {
            background-color: rgb(246, 220, 172);
            color: black;
            border: none;
            padding: 10px 25px;
            font-size: 1.25rem;
            border-radius: 15px;
            margin-top: 20px;
        }

        .btn-book:hover {
            background-color: rgb(254, 174, 111);
        }

        .navbar-center {
            flex: 1;
            display: flex;
            justify-content: center;
            font-size: 18px;
        }

        .navbar-right {
            display: flex;
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

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: rgb(246, 220, 172);
            max-width: 100%;
            position: relative;
        }

        .card img {
            object-fit: cover;
            max-width: 100%;
        }

        .btn-buy {
            background-color: rgb(255, 250, 230);
            border-radius: 15px;
            border: none;
            width: 100%;
            padding: 5px 0;
            margin-top: auto;
        }

        .btn-buy:hover {
            background-color: black;
            color: white;
        }

        .btn-contact {
            background-color: rgb(246, 220, 172);
            color: black;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 15px;
        }

        .btn-contact:hover {
            background-color: rgb(254, 174, 111);
            color: black;
        }

        .logo {
            height: 50px;
        }

        .services,
        .capster,
        .about-us,
        .produk,
        .contact-us {
            background-color: rgba(0, 19, 33, 255);
            padding-inline: 200px;
            padding-top: 50px;
            padding-bottom: 200px;
        }

        .footer-main {
            background-color: rgba(34, 40, 49, 1);
            color: #fff;
            padding: 50px 0 150px;
        }

        .footer-main h2 {
            margin: 50px 0;
            font-weight: bold;
            text-align: center;
        }

        .footer-main p {
            margin-bottom: 10px;
        }

        .footer-main .iframe-container {
            position: relative;
            width: 100%;
            padding-bottom: 80%;
            height: 0;
            overflow: hidden;
        }

        .footer-main .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
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

        .navbar-right .dropdown-menu {
            min-width: auto;
            right: 0;
        }

        .navbar-right .dropdown-menu a {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-darker">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/home/logo.png') }}" alt="Logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/book">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#capster">Hair Artist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#produk">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-us">Contact Us</a>
                    </li>

                </ul>
            </div>
            <div class="navbar-right">
                @if (Route::has('login'))
                @auth
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><a class="dropdown-item"href="/mybook">My Booking</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a class="nav-link btn btn-sign ms-2" href="{{ route('register') }}">SIGN UP</a>
                <a class="nav-link btn btn-sign ms-2" href="{{ route('login') }}">SIGN IN</a>
                @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>RICDHJOE BARBERSHOP</h1>
                <a href="/book">
                    <button class="btn-book fw-bold">BOOK</button>
                </a>
            </div>
        </div>
    </div>

    <main class="services" id="services">
        <h1 class="text-center mb-2">SERVICES</h1>
        <p class="text-center mb-4">Richdjoe Provides Several Services</p>
        <div class="row justify-content-center text-center text-light">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service1.jpg') }}" alt="HAIRCUT">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold ">HAIRCUT</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service2.jpg') }}" alt="TREATMENT">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">TREATMENT</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service3.jpg') }}" alt="BLEACHING">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">BLEACHING</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">TONING</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service5.jpg') }}" alt="FASHION COLOR">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">FASHION COLOR</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <main class="capster" id="capster">
        <h1 class="text-center mb-2">HAIR ARTIST</h1>
        <p class="text-center mb-4">Richdjoe Has Several Hair Artists</p>
        {{-- saran ku di for loop sejumlah kapster pake php jadi jangan pure html --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row justify-content-center text-center text-light">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row justify-content-center text-center text-light">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row justify-content-center text-center text-light">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row justify-content-center text-center text-light">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">TONING</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">AHMAD</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan lebih banyak carousel-item sesuai kebutuhan -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </main>


    <main class="produk" id="produk">
        <h1 class="text-center mb-2">OUR PRODUCTS</h1>
        <p class="text-center mb-4">Richdjoe Provides Several Products</p>
        <div class="row justify-content-center text-center text-light ">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/product/clay.jpeg') }}" alt="HAIRCUT">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">POMADE CLAY HAIRSTYLING</h5>
                        <div class="mt-auto">
                            <a href="https://shorturl.at/l1RtX">
                                <button class="btn-buy">BUY NOW</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/product/kids.jpeg') }}" alt="TREATMENT">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">POMADE ANAK WATERBASED KIDS (JUNIOR)</h5>
                        <div class="mt-auto">
                            <a href="https://shorturl.at/bDamx">
                                <button class="btn-buy">BUY NOW</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/product/stronghold.jpeg') }}" alt="TREATMENT">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">POMADE WATERBASED STRONGHOLD</h5>
                        <div class="mt-auto">
                            <a href="https://shorturl.at/VZJIR">
                                <button class="btn-buy">BUY NOW</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="about-us" id="about-us">
        <div class="row align-items-center">
            <div class="history col-md-6">
                <h1>OUR HISTORY</h1>
                <span>Richdjoe Barbershops is one of the businesses that utilizes the development of the lifestyle of the
                    Indonesian people as a new business, especially in Malang City. Richdjoe Barbershops was established on
                    February 15, 2015. This business began with the move of the owner, Mr. Djoko Prihatin, from Jakarta and
                    settled in Malang.</span>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/home/barber.jpg') }}" alt="Barbershop Image" class="img-fluid">
            </div>
        </div>
    </div>

    <main class="contact-us" id="contact-us">
        <h1 class="text-center mb-4">CONTACT US</h1>
        <form method="post" action="/send-message">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button class="btn-contact fw-bold">SEND</button>
        </form>
    </main>

    <footer class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-4 addresses">
                    <h2>ADDRESSES</h2>
                    <p>Jl. Bunga Coklat No.1, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</p>
                    <p>Telephone: 0817-9003-008</p>
                    <p>Email: richdjoebarbershops@gmail.com</p>
                    <div class="iframe-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5228942764197!2d112.61796064145639!3d-7.944791597199651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827586f74b97%3A0x39ae6dbddda679a9!2sRichdjoe%20Barbershops%20Suhat!5e0!3m2!1sid!2sid!4v1716433031058!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <hr>
                    <p>Jl. Sigura - Gura No.2 Kavling 4, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145</p>
                    <p>Telephone: 0817-9003-008</p>
                    <p>Email: richdjoebarbershops@gmail.com</p>
                    <div class="iframe-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.3944349565863!2d112.60879497505397!3d-7.958126992066504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827c7b67e545%3A0xc568a219fd100f64!2sRichdjoe%20Barbershops%20Sigura-gura!5e0!3m2!1sid!2sid!4v1716433092293!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-4 addresses">
                    <h2>&nbsp;</h2>
                    <p>Jl. Besar Ijen No.86, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119</p>
                    <p>Telephone: 0817-9003-008</p>
                    <p>Email: richdjoebarbershops@gmail.com</p>
                    <div class="iframe-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.337411592298!2d112.622781775054!3d-7.964039492060745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629c7cb2b5327%3A0x75d50f62a3f888d6!2sRichdjoe%20Premium%20Barber%20and%20Coffee!5e0!3m2!1sid!2sid!4v1716433113007!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-4 hours text-center">
                    <h2>OPENING HOURS</h2>
                    <p>Monday 09.00am - 21.00pm</p>
                    <p>Tuesday 09.00am - 21.00pm</p>
                    <p>Wednesday 09.00am - 21.00pm</p>
                    <p>Thursday 09.00am - 21.00pm</p>
                    <p>Friday 09.00am - 21.00pm</p>
                    <p>Saturday 09.00am - 21.00pm</p>
                    <p>Sunday 09.00am - 21.00pm</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Socials Section -->
    <footer class="footer-socials">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Our Socials</h2>
                    <div class="socials">
                        <a href="#"><img src="{{ asset('images/home/instagram.png') }}" alt="Instagram"></a>
                        <a href="#"><img src="{{ asset('images/home/wa.png') }}" alt="Whatsapp"></a>
                        <a href="#"><img src="{{ asset('images/home/tt.png') }}" alt="TikTok"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>