<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- Link to Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <form action="/admin/search" method="GET">
                    <input type="text" name="search" placeholder="ID Service...." value="{{ old('search') }}">
                    <input type="submit" value="search">
                </form>

                <table class="table table-bordered">
                    <tr>
                        <th>ID Service</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Option</th>
                    </tr>
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
