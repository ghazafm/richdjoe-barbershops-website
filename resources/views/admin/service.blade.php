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
                <h3>Data Services</h3>
                <a href="/admin/add">+ Add Service</a>
                <br />
                <br />
                <p>Search ID Services:</p>
                <form action="/admin/search" method="GET" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-2" placeholder="ID Service...." value="{{ old('search') }}">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>

                <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Service</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    @foreach ($services as $svc)
                        <tr>
                            <td>{{ $svc->id }}</td>
                            <td>{{ $svc->name }}</td>
                            <td>{{ $svc->description }}</td>
                            <td>{{ $svc->price }}</td>
            
                            <td>
                                <a class="btn btn-warning btn-sm" href="/admin/detail/{{ $svc->id }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                </table>

                <br>
                {{-- Halaman : {{$mahasiswa->currentPage()}} <br>
                    Jumlah Data : {{$mahasiswa->total()}} <br>
                    Data Per Halaman : {{$mahasiswa->perPage()}} <br>
                    {{$mahasiswa->links('pagination::bootstrap-5')}}
                    --}}
            </div>
        </div>
    </div>
    </div>
</body>

</html>
