<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
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
                <form action="/admin/search" method="GET">
                    <input type="text" name="search" placeholder="Hair Artist ID" value="{{ old('search') }}">
                    <input type="submit" value="Search">
                </form>

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Hair Artist Name</th>
                        <th>Place</th>
                        <th>Schedule</th>
                        <th>Option</th>
                    </tr>
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