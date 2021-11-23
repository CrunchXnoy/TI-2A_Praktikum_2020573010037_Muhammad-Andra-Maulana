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
  <title>SIPBATIK | Dashboard Mahasiswa</title>

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
      <!-- END SIDEBAR -->
      <div class="col-9">
        <div class="card">
          <div class="card-header">
            Biodata Mahasiswa
          </div>
          <!-- TABLE -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Level</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php $i = 1; ?>
            <?php while ($row = mysqli_fetch_array($result)) : ?>
            <tbody>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $row["username"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["level"]; ?></td>
                <td>
                  <a href=""><span class="badge rounded-pill bg-primary">View</span></a>
                  <a href=""><span class="badge rounded-pill bg-warning">Edit</span></a>
                  <a href=""><span class="badge rounded-pill bg-danger">Delete</span></a>
                </td>
              </tr>
              <?php $i++; ?>
              <?php endwhile; ?>
            </tbody>
          </table>
          <!-- END TABLE -->
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="js/sidebars.js"></script>
</body>

</html>