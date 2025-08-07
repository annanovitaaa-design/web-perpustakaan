<!-- sidebar_user.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Logo PusDes -->
  <a href="index_user.php" class="brand-link">
    <img src="assets/dist/img/perpus.png" alt="Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">PusDes</span>
  </a>

  <div class="sidebar">
    <!-- Panel User -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="profil.php" class="d-block"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
      </div>
    </div>

    <!-- Optional: Search box jika ingin -->
    <!--
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button>
        </div>
      </div>
    </div>
    -->

    <!-- Menu User -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
          <a href="index_user.php" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Beranda</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="buku.php" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Data Buku</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="profil.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Profil</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
