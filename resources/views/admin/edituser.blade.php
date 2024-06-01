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
                        <a href="/admin/user" class="btn btn-secondary mb-3">Kembali</a>
                        <form action="/admin/user/editsave" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="mb-3">
                                <label for="userId" class="form-label">ID:</label>
                                <input type="text" id="userId" value="{{ $user->id }}" class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="userName" class="form-label">Username:</label>
                                <input type="text" id="userName" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <textarea name="email" id="email" class="form-control" required>{{ $user->email }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="usertype" class="form-label">Usertype:</label>
                                <select id="usertype" name="usertype" class="form-control" required>
                                    @foreach ($usertype as $type)
                                        <option value="{{ $type }}" {{ $type == $user->usertype ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Adress:</label>
                                <input type="text" id="adress" name="address" value="{{ $user->address }}" class="form-control" required>
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
