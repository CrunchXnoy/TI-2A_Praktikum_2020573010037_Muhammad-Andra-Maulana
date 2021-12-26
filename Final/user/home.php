<?php
require "../proses/koneksi.php";
include "proses/session.php";
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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Growtani | Jual & Beli Hasil Tanam | Pinjaman Modal Pertanian</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendors/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../vendors/owl-carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/aos/css/aos.css">
    <link rel="stylesheet" href="../css/styles.min.css">

    <style>
        /* Dropdown Button */
        .dropbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>

</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="header-section">
        <nav class="navbar navbar-expand-md pl-3 pl-sm-0" id="navbar">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <img src="../images/gtani1.png" alt="">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                                <img src="../images/gtani1.png" alt="">
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <div class="dropdown">
                            <li class="nav-item">
                                <a class="nav-link" href="#feedback-section">Market</a>
                            </li>
                            <div class="dropdown-content">
                                <a href="p2p">P2P (ON)</a>
                                <a href="berita">Berita (ON)</a>
                                <a href="../soon">Perusahaan</a>
                                <a href="../soon">Harga Beli & Jual</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="nav-item">
                                <a class="nav-link" href="#feedback-section">Dompet</a>
                            </li>
                            <div class="dropdown-content">
                                <a href="../soon">Overview</a>
                                <a href="../soon">Pinjaman</a>
                                <a href="../soon">Daftar Transaksi</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="nav-item">
                                <a class="nav-link" href="#feedback-section">User</a>
                            </li>
                            <div class="dropdown-content">
                                <a href="../soon">Dashboard</a>
                                <a href="../soon">Pengaturan</a>
                                <a href="../soon">Pusat Tugas</a>
                            </div>
                        </div>
                        <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                            <a href="../proses/proses_signout.php"><button class="btn btn-success"><?= "Logout" ?></button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                            <h5 class="py-3">Bantuan<br>Admin 24/7</h5>
                            <p class="text-muted">Jangan ragu untuk menghubungi customer support kami karena kami akan dengan senang membantu anda!</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#readModal">Hubungi Admin</button>
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-start">
                        <div class="features-width">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
                                <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z" />
                            </svg>
                            <h5 class="py-3">Bantuan<br>Modal Bertani</h5>
                            <p class="text-muted">Ingin mulai namun kesulitan mendapatkan pinjaman modal? silahkan bicara dengan tim kami.</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#readModal">Mulai Bertanya</button>
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-start">
                        <div class="features-width">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
                            </svg>
                            <h5 class="py-3">Informasi<br>Event</h5>
                            <p class="text-muted">Baca artikel tentang event & promo yang sedang berlangsung disini</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#readModal">Baca Artikel</button>
                        </div>
                    </div>
                </div>
            </section>
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
    <script src="../vendors/jquery/jquery.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="../vendors/aos/js/aos.js"></script>
    <script src="../js/landingpage.js"></script>

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