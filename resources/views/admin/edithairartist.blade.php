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
    <link rel="stylesheet" href="{{ asset('/admincss/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('/admincss/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('/admincss/css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/admincss/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/admincss/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/admincss/img/favicon.ico') }}">
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
                        <h3 class="text-center">Change Data</h3>
                    </div>
                    <div class="card-body">
                        <a href="/admin/hairartist" class="btn btn-secondary mb-3">Back</a>
                        <form action="/admin/hairartist/editsave" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $kapster->id }}">
                            <div class="mb-3">
                                <label for="kapsterId" class="form-label">ID:</label>
                                <input type="text" id="kapsterId" value="{{ $kapster->id }}" class="form-control"
                                    disabled>
                            </div>
                            <div class="mb-3">
                                <label for="kapsterName" class="form-label">Hair Artist Name:</label>
                                <input type="text" id="kapsterName" name="name" value="{{ $kapster->name }}"
                                    class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="place" class="form-label">Place:</label>
                                <select id="place" name="place" class="form-control" required>
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}"
                                            {{ $place->id == $kapster->place_id ? 'selected' : '' }}>
                                            {{ $place->name }}
                                        </option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="mb-3">
                                <label for="schedule" class="form-label">Schedule:</label>
                                <input type="text" id="schedule" name="schedule" value="{{ $kapster->schedule }}"
                                    class="form-control" required>
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
