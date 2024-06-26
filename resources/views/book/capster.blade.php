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

        .btn-danger {
            background-color: rgb(254, 174, 111);
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
                <a href="" class="text-white">Awan, </a>
                <span class="text-muted">17 May 2024, 11:11</span>
            </div>
            <button class="btn btn-danger">Sign Out</button>
        </div>
    </header>

    <main class="container services" id="services">
        <h1 class="text-center mb-4">Please Select Hair Artist</h1>
        <div class="row justify-content-center text-center text-light">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service1.jpg') }}" alt="HAIRCUT">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">HAIRCUT</h4>
                        <a href="">
                            <button class="btn-pilih">SELECT</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service2.jpg') }}" alt="TREATMENT">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">TREATMENT</h4>
                        <a href="">
                            <button class="btn-pilih">SELECT</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service3.jpg') }}" alt="BLEACHING">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">BLEACHING</h4>
                        <a href="">
                            <button class="btn-pilih">SELECT</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service4.jpeg') }}" alt="TONING">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">TONING</h4>
                        <a href="">
                            <button class="btn-pilih">SELECT</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/services/service5.jpg') }}" alt="FASHION COLOR">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">FASHION COLOR</h4>
                        <a href="">
                            <button class="btn-pilih">SELECT</button>
                        </a>
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
                        <a href="#"><img src="{{ asset('images/home/instagram.png') }}" alt="Instagram"></a>
                        <a href="#"><img src="{{ asset('images/home/wa.png') }}" alt="Whatsapp"></a>
                        <a href="#"><img src="{{ asset('images/home/tt.png') }}" alt="TikTok"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>