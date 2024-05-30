<header class="header">   
  <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
              <div class="close-btn">Close <i class="fa fa-close"></i></div>
              <form id="searchForm" action="#">
                  <div class="form-group">
                      <input type="search" name="search" placeholder="What are you searching for...">
                      <button type="submit" class="submit">Search</button>
                  </div>
              </form>
          </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
              <!-- Navbar Header-->
              <a href="/admin/dashboard" class="navbar-brand">
                  <div class="brand-text brand-big visible text-uppercase">
                      <strong class="text-primary">Richdjoe</strong><strong>Admin</strong>
                  </div>
                  <div class="brand-text brand-sm"><strong class="text-primary">R</strong><strong>A</strong></div>
              </a>
              <!-- Sidebar Toggle Btn-->
              <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <!-- Navbar Toggler Button for Mobile View -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Collapsible Navbar -->
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                  
                  <li class="nav-item">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <input type="submit" value="Logout" class="nav-link btn btn-link">
                      </form>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
</header>