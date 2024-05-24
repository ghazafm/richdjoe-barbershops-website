<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- Link to Font Awesome CSS -->
    <style>
        /* Custom CSS to reduce the thickness of the top border in the table */
        .table-bordered thead th {
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;

        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> <!-- Full version of jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')


    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Booking Data</h3>
                <a href="/admin/add">+ Add Booking Data</a>
                <br />
                <br />
                <p>Search Transaction ID:</p>
                <form action="/admin/search" method="GET" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Transaction ID" value="{{ old('search') }}">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Service</th>
                            <th>Hair Artist</th>
                            <th>Schedule</th>
                            <th>Total Price</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    
                    @foreach ($transaction as $trn)
                        <tr>
                            <td>{{ $trn->id }}</td>
                            <td>{{ $trn->user->name }}</td>
                            <td>{{ $trn->service->name }}</td>
                            <td>{{ $trn->kapster->name }}</td>
                            <td>{{ $trn->jadwal }}</td>
                            <td>{{ $trn->total_price }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="/admin/detail/{{ $trn->id }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                </table>

                <br>
                Halaman : {{$transaction->currentPage()}} <br>
                    Jumlah Data : {{$transaction->total()}} <br>
                    Data Per Halaman : {{$transaction->perPage()}} <br>
                    {{$transaction->links('pagination::bootstrap-5')}}
                   
            </div>
        </div>
    </div>
    </div>
</body>

</html>
