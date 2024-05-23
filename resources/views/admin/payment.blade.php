<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- Link to Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <h3>Payment</h3>
                <br />
                <p>Search Payments:</p>
                
                <form action="/admin/search" method="GET" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Search Payment ID" value="{{ old('search') }}">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Kapster Name</th>
                            <th>Service Name</th>
                            <th>Service Price</th>  
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->kapster->name }}</td>
                            <td>{{ $transaction->service->name }}</td>
                            <td>{{ $transaction->service->price }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="/admin/detail/{{ $transaction->id }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginasi -->
                <div class="pagination justify-content-center">
                    {{ $transactions->links('pagination::bootstrap-5') }}
                </div>
                <br>
            </div>
        </div>
    </div>
</body>

</html>
