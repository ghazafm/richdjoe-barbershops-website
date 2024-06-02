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

        .btn-sign {
            background-color: rgb(254, 174, 111);
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
            width: 210px;
            margin-bottom: 1px;
        }

        .btn-review {
            background-color: #dc830f;
            color: white;
        }

        .btn-review:hover {
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

        .review {
            padding-bottom: 100px;
        }

        .review-section {
            margin-top: 20px;
        }

        .review-section h2 {
            font-weight: bold;
        }

        .stars i {
            color: #e6e6e6;
            font-size: 35px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .stars i.active {
            color: #ff9c1a;
        }

        .review-textarea {
            width: 100%;
            height: 100px;
            border-radius: 10px;
            padding: 10px;
        }

        .review-buttons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
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
                <a href="/mybook" class="d-block text-white">My Booking</a>
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
    <div class="container review">
        <h1 class="text-center">Review Booking</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 border-bottom border-dark font-weight-bold">
                            <span>Proof of Booking</span>
                            <span>@ {{ $transaction->kapster->place->name }}</span>
                        </div>
                        <form class="form-inline">
                            <div class="form-group w-100">
                                <label for="date">Date</label>
                                <span>:</span>
                                <p>{{ $transaction->schedule->format('Y-m-d') }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="time">Time</label>
                                <span>:</span>
                                <p>{{ $transaction->schedule->format('H:i') }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="service">Service</label>
                                <span>:</span>
                                <p>{{ $transaction->service->name }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="artist">Hair Artist</label>
                                <span>:</span>
                                <p>{{ $transaction->kapster->name }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="price">Price</label>
                                <span>:</span>
                                <p>{{ $transaction->total_price }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="code">Code</label>
                                <span>:</span>
                                <p>{{ $transaction->id }}</p>
                            </div>
                            <div class="form-group w-100">
                                <label for="status">Status</label>
                                <span>:</span>
                                <p>{{ $transaction->service_status }}</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8 mb-5">
                <div class="review-section card mt-4">
                    <div class="card-body text-center">
                        <div class="stars">
                            <i class="fa-solid fa-star" data-star="1"></i>
                            <i class="fa-solid fa-star" data-star="2"></i>
                            <i class="fa-solid fa-star" data-star="3"></i>
                            <i class="fa-solid fa-star" data-star="4"></i>
                            <i class="fa-solid fa-star" data-star="5"></i>
                        </div>
                        <textarea class="review-textarea" placeholder="Write your review here..."></textarea>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="transactionId" value="{{ $transaction->id }}">
                        <div class="review-buttons">
                            <button type="button" class="btn-review btn-custom">Submit</button>
                            <a href="/mybook">
                                <button type="button" class="btn-cancel btn-custom">Cancel</button>
                            </a>
                            
                        </div>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        $(document).ready(function() {
            const stars = document.querySelectorAll(".stars i");
            stars.forEach((star, index1) => {
                star.addEventListener("click", () => {
                    stars.forEach((star, index2) => {
                        index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
                    });
                });
            });

            $('.btn-review').click(function() {
                var rating = $('.stars i.active').length;
                var reviewText = $('.review-textarea').val();
                var token = $('input[name="_token"]').val();
                var transactionId = $('input[name="transactionId"]').val();

                $.ajax({
                    type: 'POST',
                    url: '/submit-review',
                    data: {
                        _token: token,
                        transactionId: transactionId,
                        rating: rating,
                        comment: reviewText
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Thank you for your review!',
                            text: 'Your feedback is highly appreciated.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/mybook";
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while submitting your review. Please try again later.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>