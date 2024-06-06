<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richdjoe Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFEAEA;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        .main-content {
            text-align: center;
            padding: 150px 0 100px; /* Adjust padding to account for the fixed navbar */
        }
        .main-content h1 {
            font-size: 4em;
            font-weight: bold;
            color: #000;
        }
        .main-content .btn {
            padding: 10px 20px;
            font-size: 1.5em;
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/home/logo.png') }}" alt="Logo" style="height: 40px;">
                RICHDJOE BARBERSHOP
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/book">BOOK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">HAIR ARTIST</a>
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
                    <li class="nav-item">
                        <a class="nav-link btn btn-custom ms-2" href="register">SIGN UP</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-custom ms-2" href="login">SIGN IN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    

    <footer class="footer">
        <h2>Our Socials</h2>
        <div class="socials">
            <a href="#"><img src="{{ asset('images/socials/instagram.png') }}" alt="Instagram"></a>
            <a href="#"><img src="{{ asset('images/socials/youtube.png') }}" alt="YouTube"></a>
            <a href="#"><img src="{{ asset('images/socials/tiktok.png') }}" alt="TikTok"></a>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
