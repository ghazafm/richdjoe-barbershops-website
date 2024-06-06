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
                        <h3 class="text-center">Ubah data mahasiswa</h3>
                    </div>
                    <div class="card-body">
                        <a href="/admin/service" class="btn btn-secondary mb-3">Kembali</a>
                        <form action="/admin/service/editsave" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $service->id }}">
                            <div class="mb-3">
                                <label for="serviceId" class="form-label">ID:</label>
                                <input type="text" id="serviceId" value="{{ $service->id }}" class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="serviceName" class="form-label">Service Name:</label>
                                <input type="text" id="serviceName" name="name" value="{{ $service->name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea name="description" id="description" class="form-control" required>{{ $service->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type:</label>
                                <select id="type" name="type" class="form-control" required>
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}"
                                            {{ $type == $service->type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input type="text" id="price" name="price" value="{{ number_format($service->price, 0, ',', '') }}" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
