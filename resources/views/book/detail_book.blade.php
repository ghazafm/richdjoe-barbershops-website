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
            margin-bottom: 5px;
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
            background-color: rgb(254, 174, 111);;
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
            width: 47%;
        }

        .btn-custom,
        .btn-cancel {
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
            <button class="btn btn-sign">Sign Out</button>
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
                            <span>@Soekarno Hatta</span>
                        </div>
                        <form class="form-inline">
                            <div class="form-group w-100">
                                <label for="date">Date</label>
                                <span>:</span>
                                <p>{{ $transaction->schedule }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="time">Time</label>
                                <span>:</span>
                                <p>{{ $transaction->schedule }}</p>
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
                                <p>{{ $transaction->total_price }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="store">Store</label>
                                <span>:</span>
                                <p>{{ $place }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="code">Code</label>
                                <span>:</span>
                                <p>{{ $place }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="status">Status</label>
                                <span>:</span>
                                <p>{{ $place }}</p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-reschedule btn-custom">Reschedule</button>
                    <button class="btn btn-cancel btn-custom">Cancel</button>
                </div>
                <div>
                    <button class="btn btn-order btn-custom">Order More</button>
                </div>
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