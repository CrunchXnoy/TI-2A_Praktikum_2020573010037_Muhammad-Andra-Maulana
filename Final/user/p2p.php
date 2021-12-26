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
                            <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
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
                <div class="card text-center">
                    <div class="card-header">
                        <b>MARKET</b> <br>
                        <span id="timer"></span>
                    </div>
                    <div class="card-footer text-muted">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#beli" class="nav-link active" data-bs-toggle="tab">Beli</a>
                            </li>
                            <li class="nav-item">
                                <a href="#jual" class="nav-link" data-bs-toggle="tab">Jual</a>
                            </li>
                            <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                                <a href="#tutorial" class="nav-link" data-bs-toggle="tab">Tutorial</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="beli">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">BUYER/SELLER</th>
                                        <th scope="col">Menjual</th>
                                        <th scope="col">Price(/kg)</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Pembayaran</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>PT. Hasil Tani Abadi <br>
                                            <p style="color:red;font-size:10px;">Total Order : 41 (98.77% Success)</p>
                                        </td>
                                        <td><span class="badge rounded-pill bg-info text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flower3" viewBox="0 0 16 16">
                                                    <path d="M11.424 8c.437-.052.811-.136 1.04-.268a2 2 0 0 0-2-3.464c-.229.132-.489.414-.752.767C9.886 4.63 10 4.264 10 4a2 2 0 1 0-4 0c0 .264.114.63.288 1.035-.263-.353-.523-.635-.752-.767a2 2 0 0 0-2 3.464c.229.132.603.216 1.04.268-.437.052-.811.136-1.04.268a2 2 0 1 0 2 3.464c.229-.132.489-.414.752-.767C6.114 11.37 6 11.736 6 12a2 2 0 1 0 4 0c0-.264-.114-.63-.288-1.035.263.353.523.635.752.767a2 2 0 1 0 2-3.464c-.229-.132-.603-.216-1.04-.268zM9 4a1.468 1.468 0 0 1-.045.205c-.039.132-.1.295-.183.484a12.88 12.88 0 0 1-.637 1.223L8 6.142a21.73 21.73 0 0 1-.135-.23 12.88 12.88 0 0 1-.637-1.223 4.216 4.216 0 0 1-.183-.484A1.473 1.473 0 0 1 7 4a1 1 0 1 1 2 0zM3.67 5.5a1 1 0 0 1 1.366-.366 1.472 1.472 0 0 1 .156.142c.094.1.204.233.326.4.245.333.502.747.742 1.163l.13.232a21.86 21.86 0 0 1-.265.002 12.88 12.88 0 0 1-1.379-.06 4.214 4.214 0 0 1-.51-.083 1.47 1.47 0 0 1-.2-.064A1 1 0 0 1 3.67 5.5zm1.366 5.366a1 1 0 0 1-1-1.732c.001 0 .016-.008.047-.02.037-.013.087-.028.153-.044.134-.032.305-.06.51-.083a12.88 12.88 0 0 1 1.379-.06c.09 0 .178 0 .266.002a21.82 21.82 0 0 1-.131.232c-.24.416-.497.83-.742 1.163a4.1 4.1 0 0 1-.327.4 1.483 1.483 0 0 1-.155.142zM9 12a1 1 0 0 1-2 0 1.476 1.476 0 0 1 .045-.206c.039-.131.1-.294.183-.483.166-.378.396-.808.637-1.223L8 9.858l.135.23c.241.415.47.845.637 1.223.083.19.144.352.183.484A1.338 1.338 0 0 1 9 12zm3.33-6.5a1 1 0 0 1-.366 1.366 1.478 1.478 0 0 1-.2.064c-.134.032-.305.06-.51.083-.412.045-.898.061-1.379.06-.09 0-.178 0-.266-.002l.131-.232c.24-.416.497-.83.742-1.163a4.1 4.1 0 0 1 .327-.4c.046-.05.085-.086.114-.11.026-.022.04-.03.041-.032a1 1 0 0 1 1.366.366zm-1.366 5.366a1.494 1.494 0 0 1-.155-.141 4.225 4.225 0 0 1-.327-.4A12.88 12.88 0 0 1 9.74 9.16a22 22 0 0 1-.13-.232l.265-.002c.48-.001.967.015 1.379.06.205.023.376.051.51.083.066.016.116.031.153.044l.048.02a1 1 0 1 1-1 1.732zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                                </svg>Bibit Padi
                                            </span>
                                        </td>
                                        <td>Rp. 6.500</td>
                                        <td>
                                            <span class="badge rounded-pill bg-info text-white">40/70kg Terjual
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                                </svg>
                                            </span>
                                        </td>
                                        <td><img src="../images/bsi.png" width="40" height="30" alt="center"> <img src="../images/DANA.png" width="40" height="30" alt="center"></td>
                                        <td>
                                            <a href="#beli" type="button">
                                                <span class="badge rounded-pill bg-success text-white">PILIH</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>PT. Abal Abal <br>
                                            <p style="color:red;font-size:10px;">Total Order : 41 (98.77% Success)</p>
                                        </td>
                                        <td><span class="badge rounded-pill bg-info text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flower3" viewBox="0 0 16 16">
                                                    <path d="M11.424 8c.437-.052.811-.136 1.04-.268a2 2 0 0 0-2-3.464c-.229.132-.489.414-.752.767C9.886 4.63 10 4.264 10 4a2 2 0 1 0-4 0c0 .264.114.63.288 1.035-.263-.353-.523-.635-.752-.767a2 2 0 0 0-2 3.464c.229.132.603.216 1.04.268-.437.052-.811.136-1.04.268a2 2 0 1 0 2 3.464c.229-.132.489-.414.752-.767C6.114 11.37 6 11.736 6 12a2 2 0 1 0 4 0c0-.264-.114-.63-.288-1.035.263.353.523.635.752.767a2 2 0 1 0 2-3.464c-.229-.132-.603-.216-1.04-.268zM9 4a1.468 1.468 0 0 1-.045.205c-.039.132-.1.295-.183.484a12.88 12.88 0 0 1-.637 1.223L8 6.142a21.73 21.73 0 0 1-.135-.23 12.88 12.88 0 0 1-.637-1.223 4.216 4.216 0 0 1-.183-.484A1.473 1.473 0 0 1 7 4a1 1 0 1 1 2 0zM3.67 5.5a1 1 0 0 1 1.366-.366 1.472 1.472 0 0 1 .156.142c.094.1.204.233.326.4.245.333.502.747.742 1.163l.13.232a21.86 21.86 0 0 1-.265.002 12.88 12.88 0 0 1-1.379-.06 4.214 4.214 0 0 1-.51-.083 1.47 1.47 0 0 1-.2-.064A1 1 0 0 1 3.67 5.5zm1.366 5.366a1 1 0 0 1-1-1.732c.001 0 .016-.008.047-.02.037-.013.087-.028.153-.044.134-.032.305-.06.51-.083a12.88 12.88 0 0 1 1.379-.06c.09 0 .178 0 .266.002a21.82 21.82 0 0 1-.131.232c-.24.416-.497.83-.742 1.163a4.1 4.1 0 0 1-.327.4 1.483 1.483 0 0 1-.155.142zM9 12a1 1 0 0 1-2 0 1.476 1.476 0 0 1 .045-.206c.039-.131.1-.294.183-.483.166-.378.396-.808.637-1.223L8 9.858l.135.23c.241.415.47.845.637 1.223.083.19.144.352.183.484A1.338 1.338 0 0 1 9 12zm3.33-6.5a1 1 0 0 1-.366 1.366 1.478 1.478 0 0 1-.2.064c-.134.032-.305.06-.51.083-.412.045-.898.061-1.379.06-.09 0-.178 0-.266-.002l.131-.232c.24-.416.497-.83.742-1.163a4.1 4.1 0 0 1 .327-.4c.046-.05.085-.086.114-.11.026-.022.04-.03.041-.032a1 1 0 0 1 1.366.366zm-1.366 5.366a1.494 1.494 0 0 1-.155-.141 4.225 4.225 0 0 1-.327-.4A12.88 12.88 0 0 1 9.74 9.16a22 22 0 0 1-.13-.232l.265-.002c.48-.001.967.015 1.379.06.205.023.376.051.51.083.066.016.116.031.153.044l.048.02a1 1 0 1 1-1 1.732zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                                </svg>Bibit Padi
                                            </span>
                                        </td>
                                        <td>Rp. 6.800</td>
                                        <td>
                                            <span class="badge rounded-pill bg-info text-white">0/100kg Terjual
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                                </svg>
                                            </span>
                                        </td>
                                        <td><img src="../images/DANA.png" width="40" height="30" alt="center"></td>
                                        <td>
                                            <a href="#beli" type="button">
                                                <span class="badge rounded-pill bg-success text-white">PILIH</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="jual">
                            <h4 class="mt-2">Jual tab content</h4>
                            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
                        </div>
                        <div class="tab-pane fade" id="tutorial">
                            <h4 class="mt-2">Tutorial tab content</h4>
                            <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
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
    <!-- SCRIPT UNTUK TAB -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[data-bs-toggle="tab"]').on("shown.bs.tab", function(e) {
                var activeTab = $(e.target).text(); // Get the name of active tab
                var previousTab = $(e.relatedTarget).text(); // Get the name of previous active tab
                $(".active-tab span").html(activeTab);
                $(".previous-tab span").html(previousTab);
            });
        });
    </script>
    <!-- END SCRIPT UNTUK TAB -->
    <!-- SCRIPT UNTUK AUTO REFRESH -->
    <script>
        function checklength(i) {
            'use strict';
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        var minutes, seconds, count, counter, timer;
        count = 601; //seconds
        counter = setInterval(timer, 1000);

        function timer() {
            'use strict';
            count = count - 1;
            minutes = checklength(Math.floor(count / 60));
            seconds = checklength(count - minutes * 60);
            if (count < 0) {
                clearInterval(counter);
                return;
            }
            document.getElementById("timer").innerHTML = 'Next refresh in ' + minutes + ':' + seconds + ' ';
            if (count === 0) {
                location.reload();
            }
        }
    </script>
    <!-- SCRIPT UNTUK AUTO REFRESH -->
</body>

</html>