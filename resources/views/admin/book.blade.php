<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- Link to Font Awesome CSS -->
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
                <form action="/admin/search" method="GET">
                    <input type="text" name="search" placeholder="Transaction ID" value="{{ old('search') }}">
                    <input type="submit" value="Search">
                </form>

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Service</th>
                        <th>Hair Artist</th>
                        <th>Schedule</th>
                        <th>Total Price</th>
                        <th>Option</th>
                    </tr>
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
