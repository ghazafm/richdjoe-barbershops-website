<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('/admincss/img/fadil.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Bimo</h1>
          <p>CEO Richdjoe</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
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
        <li class="{{ Request::is('admin/service') ? 'active' : '' }}">
            <a href="/admin/service">
                <i class="fa fa-scissors"></i>Service
            </a>
        </li>
        <li class="{{ Request::is('admin/hairartist') ? 'active' : '' }}">
            <a href="/admin/hairartist">
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