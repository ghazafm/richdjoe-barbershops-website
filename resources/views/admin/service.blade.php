<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <!-- Link to Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar">
                    <img src="{{ asset('/admincss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle">
                </div>
                <div class="title">
                    <h1 class="h5">Bimo</h1>
                    <p>CEO Richdjoe</p>
                </div>
            </div>
            <!-- Sidebar Navigation Menus-->
            <span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="icon-home"></i>Home
                    </a>
                </li>
                <li class="{{ Request::is('admin/book') ? 'active' : '' }}">
                    <a href="{{ url('/admin/book') }}">
                        <i class="icon-grid"></i>Book
                    </a>
                </li>
                <li class="{{ Request::is('service.html') ? 'active' : '' }}">
                    <a href="service.html">
                        <i class="fa fa-scissors"></i>Service
                    </a>
                </li>
                <li class="{{ Request::is('hairartist.html') ? 'active' : '' }}">
                    <a href="hairartist.html">
                        <i class="fa fa-user-tie"></i>HairArtist
                    </a>
                </li>
                <li class="{{ Request::is('user.html') ? 'active' : '' }}">
                    <a href="user.html">
                        <i class="fa fa-user"></i>User
                    </a>
                </li>
            </ul>
        </nav>

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
