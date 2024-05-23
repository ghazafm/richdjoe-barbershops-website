<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Booking Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('/admincss/css/custom.css')}}">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-4">Add Booking Data</h2>
        <form action="/admin/add" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="service">Service:</label>
                <input type="text" class="form-control" id="service" name="service" placeholder="Enter service">
            </div>
            <div class="form-group">
                <label for="hair_artist">Hair Artist:</label>
                <input type="text" class="form-control" id="hair_artist" name="hair_artist" placeholder="Enter hair artist">
            </div>
            <div class="form-group">
                <label for="schedule">Schedule:</label>
                <input type="text" class="form-control" id="schedule" name="schedule" placeholder="Enter schedule">
            </div>
            <div class="form-group">
                <label for="total_price">Total Price:</label>
                <input type="text" class="form-control" id="total_price" name="total_price" placeholder="Enter total price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
