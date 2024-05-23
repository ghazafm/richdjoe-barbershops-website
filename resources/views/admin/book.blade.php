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
                    <h3>Data Booking</h3>
                    <a href="/admin/add">+ Tambah Data Booking</a>
                    <br/>
                    <br/>
                    <p>Cari ID Transaksi:</p>
                    <form action="/admin/search" method="GET">
                        <input type="text" name="search" placeholder="ID Transaksi...." value="{{ old('search') }}">
                        <input type="submit" value="search">
                    </form>

                    <table class="table table-bordered">
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Nama User</th>
                            <th>Jenis Service</th>
                            <th>Jadwal</th>
                            <th>Total Harga</th>
                            <th>Opsi</th>
                        </tr>
                        {{-- EDIT INI GHAZA --}}
                        {{-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
                        {{-- @foreach($transactions as $trn)
                        <tr>
                            <td>{{ $trn->id }}</td>
                            <td>{{ $trn->nama }}</td>
                            <td>{{ $trn->alamat }}</td>
                            <td>{{ $trn->notelp }}</td>
                            <td>{{ $trn->ipk }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="/admin/detail/{{ $mhs->nim }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach --}}
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
