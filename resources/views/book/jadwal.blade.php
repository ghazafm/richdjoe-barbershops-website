<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richdjoe Barbershops</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet" />
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

        .capster {
            padding-bottom: 100px;
        }

        .btn-danger {
            background-color: rgb(254, 174, 111);
        }

        .card-header {
            font-weight: bold;
            font-size: 18px;
        }

        .list-group-item {
            background-color: #4a5568;
            color: white;
            border: 1px solid #6c757d;
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: #6c757d;
        }

        #calendar {
            max-width: 100%;
            height: 450px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .fc-daygrid-day:hover {
            background-color: #e2e6ea;
            cursor: pointer;
        }

        .fc-daygrid-day.fc-day-today {
            background-color: #ffeb3b !important;
        }

        .fc-daygrid-day-selected {
            background-color: #00b5ad !important;
            color: white;
        }

        .time-slot-button {
            width: 100%;
            margin-bottom: 10px;
            background-color: #00b5ad;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .time-slot-button:hover {
            background-color: #009c95;
        }

        #redirect-button {
            width: 100%;
            margin-top: 20px;
            background-color: #343a40;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        #redirect-button:hover {
            background-color: #6c757d;
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
        <h1 class="text-center">Available Schedule</h1>
        <div class="row mt-4">
            <div class="col-md-8">
                <div id="calendar"></div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Available Time</div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col">Morning</div>
                            <div class="col">Afternoon</div>
                            <div class="col">Evening</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <button class="time-slot-button">9:00</button>
                                <button class="time-slot-button">10:00</button>
                                <button class="time-slot-button">11:00</button>
                            </div>
                            <div class="col-4">
                                <button class="time-slot-button">12:00</button>
                                <button class="time-slot-button">13:00</button>
                                <button class="time-slot-button">14:00</button>
                                <button class="time-slot-button">15:00</button>
                                <button class="time-slot-button">16:00</button>
                                <button class="time-slot-button">17:00</button>
                            </div>
                            <div class="col-4">
                                <button class="time-slot-button">18:00</button>
                                <button class="time-slot-button">19:00</button>
                                <button class="time-slot-button">20:00</button>
                                <button class="time-slot-button">21:00</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="redirect-button">Select Date and Time</button>
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
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let selectedDate = null;
            let selectedTime = null;
            let selectedEl = null;

            // Determine the minimum date for the valid range (today)
            let today = new Date();
            let minDate =
                today.getFullYear() +
                "-" +
                (today.getMonth() + 1).toString().padStart(2, "0") +
                "-" +
                today.getDate().toString().padStart(2, "0");

            // Initialize the calendar with the valid range
            var calendarEl = document.getElementById("calendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: "dayGridMonth",
                selectable: true,
                validRange: {
                    start: minDate,
                },
                dateClick: function(info) {
                    if (selectedEl) {
                        selectedEl.classList.remove("fc-daygrid-day-selected");
                    }
                    selectedDate = info.dateStr;
                    selectedEl = info.dayEl;
                    info.dayEl.classList.add("fc-daygrid-day-selected");
                },
            });
            calendar.render();

            // Add click events to time slot buttons
            const timeSlotButtons = document.querySelectorAll(".time-slot-button");
            timeSlotButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    let selectedDateTime = new Date(
                        selectedDate + " " + button.textContent
                    ); // Gabungkan tanggal dan waktu yang dipilih
                    let now = new Date(); // Ambil waktu saat ini
                    if (selectedDateTime < now) {
                        // Jika waktu yang dipilih lebih kecil dari waktu saat ini
                        alert("You cannot select a past time.");
                    } else {
                        selectedTime = button.textContent;
                    }
                });
            });

            // Add click event to redirect button
            const redirectButton = document.getElementById("redirect-button");
            redirectButton.addEventListener("click", () => {
                if (selectedDate) {
                    if (selectedTime) {
                        redirectToNewPage();
                    } else {
                        alert("Please select a time.");
                    }
                } else {
                    alert("Please select a date.");
                }
            });

            // Function to redirect to new page
            function redirectToNewPage() {
                let queryString = `date=${selectedDate}`;
                if (selectedTime) {
                    queryString += `&time=${selectedTime}`;
                }
                window.location.href = `newpage.html?${queryString}`;
            }
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>