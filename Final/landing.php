<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require "proses/koneksi.php";
$headers = mysqli_query($conn, "SELECT * FROM heading WHERE id = 0");
$hd = mysqli_fetch_array($headers);
$abouts = mysqli_query($conn, "SELECT * FROM heading WHERE id = 1");
$ab = mysqli_fetch_array($abouts);
$about1 = mysqli_query($conn, "SELECT * FROM heading WHERE id = 2");
$sejarah = mysqli_fetch_array($about1);
if (!empty($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $user = mysqli_query($conn, "select * from user WHERE email='$email'");
  $us = mysqli_fetch_array($user);
  if ($us['level'] == 'mahasiswa') {
    echo "<script>window.location='user/home'</script>";
  }
}
?>

<head>
  <title>Growtani | Jual & Beli Hasil Tanam | Pinjaman Modal Pertanian</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/aos/css/aos.css">
  <link rel="stylesheet" href="css/styles.min.css">
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <?php 
  require "header.php";
  ?>
  <div class="banner">
    <div class="container">
      <?php
      if (empty($_SESSION['email'])) {
      ?>
        <h1 class="font-weight-semibold"><?= $hd["tittle"]; ?><br></h1>
        <h6 class="font-weight-normal text-muted pb-3"><?= $hd["text"]; ?></h6>
      <?php
      } else {
        $hasil = mysqli_query($conn, "SELECT * FROM user u LEFT JOIN tb_mahasiswa mhs ON u.id = mhs.id_user WHERE email='$_SESSION[email]'");
        $row = mysqli_fetch_array($hasil);
      ?>
        <h3 class="font-weight-semibold">Selamat Datang,<br><?= $row["nama"]; ?></h3>
        <h6 class="font-weight-normal text-muted pb-3"><?= 'welcome text here' ?></h6>
      <?php
      }
      ?>
      <div>
        <button class="btn btn-light mr-1">Get started</button>
        <button class="btn btn-success ml-1">Learn more</button>
      </div>
      <img src="images/petani.png" alt="" class="img-fluid">
    </div>
  </div>
  <div class="content-wrapper">
    <div class="container">
      <section class="features-overview" id="features-section">
        <div class="content-header">
          <h2><?= $ab['tittle']; ?></h2>
          <h6 class="section-subtitle text-muted"><?= $ab['subtittle']; ?></h6>
        </div>
        <div class="d-md-flex justify-content-between">
          <div class="grid-margin d-flex justify-content-start">
            <div class="features-width">
              <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-life-preserver" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm6.43-5.228a7.025 7.025 0 0 1-3.658 3.658l-1.115-2.788a4.015 4.015 0 0 0 1.985-1.985l2.788 1.115zM5.228 14.43a7.025 7.025 0 0 1-3.658-3.658l2.788-1.115a4.015 4.015 0 0 0 1.985 1.985L5.228 14.43zm9.202-9.202-2.788 1.115a4.015 4.015 0 0 0-1.985-1.985l1.115-2.788a7.025 7.025 0 0 1 3.658 3.658zm-8.087-.87a4.015 4.015 0 0 0-1.985 1.985L1.57 5.228A7.025 7.025 0 0 1 5.228 1.57l1.115 2.788zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
              </svg>
              <h5 class="py-3">Sejarah<br>Perusahaan</h5>
              <p class="text-muted"><?= $sejarah['text']; ?></p>
              <button class="btn btn-primary" data-toggle="modal" data-target="#readModal">Read Article</button>
            </div>
          </div>
          <div class="grid-margin d-flex justify-content-center">
            <div class="features-width">
              <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
              </svg>
              <h5 class="py-3">Pimpinan<br>Perusahaan</h5>
              <p class="text-muted"><?= $sejarah['text']; ?></p>
              <button class="btn btn-primary" data-toggle="modal" data-target="#readModal">Read Article</button>
            </div>
          </div>
          <div class="grid-margin d-flex justify-content-end">
            <div class="features-width">
              <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-shuffle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5z" />
                <path d="M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z" />
              </svg>
              <h5 class="py-3">Tujuan<br>Perusahaan</h5>
              <p class="text-muted"><?= $sejarah['text']; ?></p>
              <button class="btn btn-primary" data-toggle="modal" data-target="#readModal">Read Article</button>
            </div>
          </div>
        </div>
      </section>
      <!-- <section class="digital-marketing-service" id="digital-marketing-section">
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
            <h3 class="m-0">We Offer a Full Range<br>of Digital Marketing Services!</h3>
            <div class="col-lg-7 col-xl-6 p-0">
              <p class="py-4 m-0 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
              <p class="font-weight-medium text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer</p>
            </div>
          </div>
          <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
            <img src="images/Group1.png" alt="" class="img-fluid">
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
            <img src="images/Group2.png" alt="" class="img-fluid">
          </div>
          <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
            <h3 class="m-0">Leading Digital Agency<br>for Business Solution.</h3>
            <div class="col-lg-9 col-xl-8 p-0">
              <p class="py-4 m-0 text-muted">Power-packed with impressive features and well-optimized, this template is designed to provide the best performance in all circumstances.</p>
              <p class="pb-2 font-weight-medium text-muted">Its smart features make it a powerful stand-alone website building tool.</p>
            </div>
            <button class="btn btn-info">Readmore</button>
          </div>
        </div>
      </section>
      <section class="case-studies" id="case-studies-section">
        <div class="row grid-margin">
          <div class="col-12 text-center pb-5">
            <h2>Our case studies</h2>
            <h6 class="section-subtitle text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum.</h6>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-primary text-center card-contents">
                  <div class="card-image">
                    <img src="images/Group95.svg" class="case-studies-card-img" alt="">
                  </div>
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Know more about Online marketing</h6>
                      <button class="btn btn-white">Read More</button>
                    </div>
                  </div>
                </div>
                <div class="card-details text-center pt-4">
                  <h6 class="m-0 pb-1">Online Marketing</h6>
                  <p>Seo, Marketing</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-warning text-center card-contents">
                  <div class="card-image">
                    <img src="images/Group108.svg" class="case-studies-card-img" alt="">
                  </div>
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Know more about Web Development</h6>
                      <button class="btn btn-white">Read More</button>
                    </div>
                  </div>
                </div>
                <div class="card-details text-center pt-4">
                  <h6 class="m-0 pb-1">Web Development</h6>
                  <p>Developing, Designing</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-violet text-center card-contents">
                  <div class="card-image">
                    <img src="images/Group126.svg" class="case-studies-card-img" alt="">
                  </div>
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Know more about Web Designing</h6>
                      <button class="btn btn-white">Read More</button>
                    </div>
                  </div>
                </div>
                <div class="card-details text-center pt-4">
                  <h6 class="m-0 pb-1">Web Designing</h6>
                  <p>Designing, Developing</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card" data-aos="zoom-in" data-aos-delay="600">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-success text-center card-contents">
                  <div class="card-image">
                    <img src="images/Group115.svg" class="case-studies-card-img" alt="">
                  </div>
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Know more about Software Development</h6>
                      <button class="btn btn-white">Read More</button>
                    </div>
                  </div>
                </div>
                <div class="card-details text-center pt-4">
                  <h6 class="m-0 pb-1">Software Development</h6>
                  <p>Developing, Designing</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="customer-feedback" id="feedback-section">
        <div class="row">
          <div class="col-12 text-center pb-5">
            <h2>What our customers have to say</h2>
            <h6 class="section-subtitle text-muted m-0">Lorem ipsum dolor sit amet, tincidunt vestibulum.</h6>
          </div>
          <div class="owl-carousel owl-theme grid-margin">
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face2.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Tony Martinez</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face3.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Sophia Armstrong</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face20.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face15.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face16.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face1.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Tony Martinez</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face2.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Tony Martinez</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face3.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Sophia Armstrong</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face20.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="contact-us" id="contact-section">
        <div class="contact-us-bgimage grid-margin">
          <div class="pb-4">
            <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Do you have any projects?</h4>
            <h4 class="pt-1" data-aos="fade-down">Contact us</h4>
          </div>
          <div data-aos="fade-up">
            <button class="btn btn-rounded btn-outline-danger">Contact us</button>
          </div>
        </div>
      </section>
      <section class="contact-details" id="contact-details-section">
        <div class="row text-center text-md-left">
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <img src="images/gtani1.png" alt="" class="pb-2">
            <div class="pt-2">
              <p class="text-muted m-0">mikayla_beer@feil.name</p>
              <p class="text-muted m-0">906-179-8309</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Get in Touch</h5>
            <p class="text-muted">Don’t miss any updates of our new templates and extensions.!</p>
            <form>
              <input type="text" class="form-control" id="Email" placeholder="Email id">
            </form>
            <div class="pt-3">
              <button class="btn btn-dark">Subscribe</button>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Our Guidelines</h5>
            <a href="#">
              <p class="m-0 pb-2">Terms</p>
            </a>
            <a href="#">
              <p class="m-0 pt-1 pb-2">Privacy policy</p>
            </a>
            <a href="#">
              <p class="m-0 pt-1 pb-2">Cookie Policy</p>
            </a>
            <a href="#">
              <p class="m-0 pt-1">Discover</p>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Our address</h5>
            <p class="text-muted">518 Schmeler Neck<br>Bartlett. Illinois</p>
            <div class="d-flex justify-content-center justify-content-md-start">
              <a href="#"><span class="mdi mdi-facebook"></span></a>
              <a href="#"><span class="mdi mdi-twitter"></span></a>
              <a href="#"><span class="mdi mdi-instagram"></span></a>
              <a href="#"><span class="mdi mdi-linkedin"></span></a>
            </div>
          </div>
        </div>
      </section> -->
      <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2019<a href="https://www.bootstrapdash.com/" class="px-1">Bootstrapdash.</a>All rights reserved.</p>
      </footer>
      <!-- Modal for Contact - us Button -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Contact Us</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" id="Name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" class="form-control" id="Email-1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="Message">Message</label>
                  <textarea class="form-control" id="Message" placeholder="Enter your Message"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- END MODAL -->
      <!-- Modal for readmore -->
      <div class="modal fade" id="readModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Notification</h4>
            </div>
            <div class="modal-body">
              <?= $sejarah['text']; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-success">Submit</button> -->
            </div>
          </div>
        </div>
      </div>
      <!-- END MODAL -->
    </div>
  </div>
  <script src="vendors/jquery/jquery.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="vendors/aos/js/aos.js"></script>
  <script src="js/landingpage.js"></script>

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
      Tawk_LoadStart = new Date();
    (function() {
      var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/61b330e6c82c976b71c0c405/1fmhve1gg';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    })();
  </script>
  <!--End of Tawk.to Script-->
</body>

</html>