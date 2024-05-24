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
            margin-bottom: 1rem;
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
    <div class="container mt-5">
        <h1 class="text-center">Booking Confirmation</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form class="form-inline">
                            <div class="form-group w-100 bg-transparent">
                                <label for="name">Name</label>
                                <span>:</span>
                                <input type="text" class="form-control" id="name" value="Azril Januar" style="background-color: transparent; border-color: black;">
                            </div>
                            <div class="form-group w-100">
                                <label for="email">Email</label>
                                <span>:</span>
                                <input type="email" class="form-control" id="email" value="azriljanuar661@gmail.com" style="background-color: transparent; border-color: black;">
                            </div>
                            <div class="form-group w-100">
                                <label for="phone">No Hp</label>
                                <span>:</span>
                                <input type="text" class="form-control" id="phone" value="082342636663" style="background-color: transparent; border-color: black;">
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
                                <input type="text" class="form-control" id="tanggal" value="29 May 2024" readonly style="background-color: transparent; border-color: transparent;">
                            </div>
                            <div class="form-group w-100">
                                <label for="jam">Time</label>
                                <span>:</span>
                                <input type="text" class="form-control" id="jam" value="13:00" readonly style="background-color: transparent; border-color: transparent;">
                            </div>
                            <div class="form-group w-100">
                                <label for="service">Service</label>
                                <span>:</span>
                                <input type="text" class="form-control" id="service" value="Haircut" readonly style="background-color: transparent; border-color: transparent;">
                            </div>
                            <div class="form-group w-100">
                                <label for="artist">Hair Artist</label>
                                <span>:</span>
                                <input type="text" class="form-control" id="artist" value="Patrick" readonly style="background-color: transparent; border-color: transparent;">
                            </div>
                            <div class="form-group w-100">
                                <label for="price">Price</label>
                                <span>:</span>
                                <input type="text" class="form-control" id="price" value="Start From IDR 185,000.00" readonly style="background-color: transparent; border-color: transparent;">
                            </div>
                            <div class="form-group w-100">
                                <label for="store">Store</label>
                                <span>:</span>
                                <input type="text" class="form-control" id="store" value="Kebayoran Baru" readonly style="background-color: transparent; border-color: transparent;">
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-confirm">Confirm Booking</button>
            </div>
        </div>
    </div>
    
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
