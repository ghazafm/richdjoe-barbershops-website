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
                    <input type="text" name="search"class="form-control mr-2" placeholder="Hair Artist ID" value="{{ old('search') }}">
                    <input type="submit" class="btn btn-primary" value="Search">
                </form>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Hair Artist Name</th>
                            <th>Place</th>
                            <th>Schedule</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    
                    @foreach ($kapsters as $kap)
                        <tr>
                            <td>{{ $kap->id }}</td>
                            <td>{{ $kap->name }}</td>
                            <td>{{ $kap->place }}</td>
                            <td>{{ $kap->schedule }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                </table>

                <br>
                Halaman : {{$kapsters->currentPage()}} <br>
                    Jumlah Data : {{$kapsters->total()}} <br>
                    Data Per Halaman : {{$kapsters->perPage()}} <br>
                    {{$kapsters->links('pagination::bootstrap-5')}}
                   
            </div>
        </div>
    </div>
    </div>
</body>
</html>