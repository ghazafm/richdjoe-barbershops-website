<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        /* Custom CSS to reduce the thickness of the top border in the table */
        .table-bordered thead th {
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;

        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')


    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Hair Artist Data</h3>
                <a href="/admin/add">+ Add Hair Artist Data</a>
                <br />
                <br />
                <p>Search Hair Artist ID:</p>
                <form action="/admin/search"class="form-inline mb-3" method="GET">
                    <input type="text" name="search"class="form-control mr-2" placeholder="Hair Artist ID"
                        value="{{ old('search') }}">
                    <input type="submit" class="btn btn-primary" value="Search">
                </form>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Hair Artist ID</th>
                            <th>Hair Artist</th>
                            <th>Service ID</th>
                            <th>Service</th>
                            <th>Schedule</th>
                            <th>Total Price</th>
                            <th>Service Status</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>

                    @foreach ($transactions as $tlog)
                        <tr>
                            <td>{{ $tlog->id }}</td>
                            <td>{{ $tlog->user_id }}</td>
                            <td>{{ $tlog->user_name }}</td>
                            <td>{{ $tlog->user_email }}</td>
                            <td>{{ $tlog->kapster_id }}</td>
                            <td>{{ $tlog->kapster_name }}</td>
                            <td>{{ $tlog->service_id }}</td>
                            <td>{{ $tlog->service_name }}</td>
                            <td>{{ $tlog->schedule }}</td>
                            <td>{{ $tlog->total_price }}</td>
                            <td>{{ $tlog->service_status }}</td>
                            <td>{{ $tlog->payment_status }}</td>
                        </tr>
                    @endforeach
                </table>

                <br>
                {{-- Jumlah Data : {{ $kapsters->total() }} <br> --}}

            </div>
        </div>
    </div>
    </div>
</body>

</html>
