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
            background-image: url("{{ asset('images/home/bg1.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
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

        .navbar {
            background-color: rgba(32, 78, 124, 1);
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
            margin-top: 30px;
            margin-bottom: 200px;
            margin-inline: 50px;
            padding: 20px;
            border-radius: 10px;
        }

        .main-content h1 {
            font-size: 3rem;
            color: #343a40;
        }

        .main-content img {
            height: 100%;
            max-height: 1000px;
        }

        .btn-book {
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1.25rem;
            border-radius: 25px;
            margin-top: 20px;
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
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            margin-left: 10px;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: rgba(240, 84, 84, 1);
            padding: 10px;
            max-width: 100%;
            position: relative;
        }

        .card img {
            object-fit: cover;
            max-width: 100%;
            border-radius: 20px;
        }

        .btn-warning {
            background-color: white;
            border-color: black;
            border-radius: 15px;
        }

        .btn-warning:hover {
            background-color: black;
            color: white;
            border-color: white;
        }

        .logo {
            height: 50px;
        }

        .footer .social-icon {
            width: 30px;
            height: 30px;
        }

        .d-flex img {
            width: 50px;
        }

        .services,
        .capster {
            margin-bottom: 350px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-darker">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/home/logo.png') }}" alt="Logo" class="logo">
            Ricdhjoe Barbershop
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Book</a>
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
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-right">
                <button class="btn btn-sign">Sign Up</button>
                <button class="btn btn-sign">Sign In</button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>RICDHJOE BARBERSHOP</h1>
                <button class="btn-book">BOOK</button>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/home/transformed.png') }}" alt="Barbershop Image" class="img-fluid">
            </div>
        </div>
    </div>

    <main class="container services" id="services">
        <h1 class="text-center mb-2">SERVICES</h1>
        <p class="text-center mb-4">Richdjoe menyediakan beberapa layanan servis</p>
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

    <main class="container capster" id="capster">
        <h1 class="text-center mb-2">HAIR ARTIST</h1>
        <p class="text-center mb-4">Richdjoe memiliki beberapa Hair Artist</p>
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

    <main class="container my-4" id="produk">
        <h1 class="text-center mb-2">OUR PRODUCTS</h1>
        <p class="text-center mb-4">Richdjoe menyediakan beberapa produk</p>
        <div class="row justify-content-center text-center text-light">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/product/clay.jpeg') }}" alt="HAIRCUT">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">POMADE CLAY HAIRSTYLING</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/product/kids.jpeg') }}" alt="TREATMENT">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">POMADE ANAK WATERBASED KIDS (JUNIOR)</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/product/stronghold.jpeg') }}" alt="TREATMENT">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">POMADE WATERBASED STRONGHOLD</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <button class="btn btn-warning btn-block">BUY NOW</button>
            </div>
        </div>
    </main>



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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>