<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('/admincss/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('/admincss/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset('/admincss/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('/admincss/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('/admincss/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('/admincss/img/favicon.ico')}}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Dashboard</h2>
                        <h3 class="text-center">Hair Artist Data</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/admin/hairartist') }}" class="btn btn-secondary mb-3">Back</a>
                        <form action="{{ url('/admin/hairartist/addsave') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Hair Artist Name: </label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo: </label>
                                <input type="text" id="photo" name="photo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="place" class="form-label">Place: </label>
                                <select id="place" name="place" class="form-control" required>
                                    <option value="Ijen">Ijen</option>
                                    <option value="Sigura-gura">Sigura-gura</option>
                                    <option value="Soekarno Hatta">Soekarno Hatta</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="schedule" class="form-label">Schedule: </label>
                                <input type="text" id="schedule" name="schedule" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
