<header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
      <div class="container">
        <div class="navbar-brand-wrapper d-flex w-100">
          <img src="images/gtani1.png" alt="">
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="mdi mdi-menu navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
            <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
              <div class="navbar-collapse-logo">
                <img src="images/gtani1.png" alt="">
              </div>
              <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
              </button>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#features-section">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#digital-marketing-section">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#feedback-section">Testimonials</a>
            </li>
            <li class="nav-item btn-contact-us pl-4 pl-lg-0">
              <?php
              if (!isset($_SESSION['email'])) {
              ?>
                <a href="sign-in"><button class="btn btn-success">Login / Register</button></a>
              <?php
              } else if ($us['level'] == 'admin') {
              ?>
                <a href="home"><button class="btn btn-warning"><?= "Halaman Admin" ?></button></a>
              <?php
              } else {
              ?>
                <a href="user/home"><button class="btn btn-success"><?= "Halaman User" ?></button></a>
                <a href="proses/proses_signout.php"><button class="btn btn-success"><?= "Log Out" ?></button></a>
              <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>