<?php
include "proses/session.php";
// require"proses/session.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SIPBATIK | Dashboard Dosen</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/"> -->



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/sidebars.css" rel="stylesheet">
</head>

<body>

    <!-- NAVBAR -->
    <div class="container-fluid">
        <?php
        require "navbar.php";
        ?>
    </div>

    <!-- SIDEBAR -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                require "sidebar.php";
                ?>
            </div>
            <div class="col-9">
                <!-- FORM -->
                <form>
                    <div class="row">
                        <div class="col">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?php echo $row['nama'] ?>" id="nama">
                        </div>
                        <div class="col">
                            <label for="nama" class="form-label">Prodi</label>
                            <input type="text" class="form-control" value="<?php echo $row['prodi'] ?>" id="nama">
                        </div>
                    </div>
                    <fieldset disabled>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" value="<?php echo $row['email'] ?>" id="email" aria-describedby="emailHelp">
                            <div id="email" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                    </fieldset>
                    <div class="dropdown">
                    <label for="email" class="form-label">Jenis Kelamin</label><br>
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $row['jns_kelamin'] ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Laki-Laki</a></li>
                            <li><a class="dropdown-item" href="#">Perempuan</a></li>
                        </ul>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <label for="nama" class="form-label">Alamat</label>
                            <input type="text" class="form-control" value="<?php echo $row['alamat'] ?>" id="nama">
                        </div>
                        <fieldset disabled>
                            <div class="col">
                                <label for="nama" class="form-label">Kelas</label>
                                <input type="text" class="form-control" value="<?php echo $row['prodi'] ?> <?= $row['kelas'] ?>" id="nama">
                            </div> <br>
                        </fieldset>
                        <div class="row">
                            <div class="col">
                                <label for="nama" class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" value="<?php echo $row['tgl_lahir'] ?>" id="nama">
                            </div>
                            <div class="col">
                                <label for="nama" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" value="<?php echo $row['tempat_lahir'] ?>" id="nama">
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <!-- ENDFORM -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="js/sidebars.js"></script>
</body>

</html>