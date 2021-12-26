<?php
include "proses/session.php";
$user = mysqli_query($conn, "SELECT * FROM user WHERE LEVEL != 'admin'");
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
      <div class="col">
        <h4>
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
            <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z" />
          </svg>
          Data User Sibatik
        </h4>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalAdd">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
          </svg>Add
        </button>
        <div class="card">
          <div class="card-header">
            <h4>
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
              </svg>
              Data User
            </h4>
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
            <?php foreach ($user as $us) : ?>
              <tbody>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $us["username"]; ?></td>
                  <td><?= $us["email"]; ?></td>
                  <td><?= $us["level"]; ?></td>
                  <td>
                    <span class="badge rounded-pill bg-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $us["username"]; ?>">
                      View
                    </span>
                    <span class="badge rounded-pill bg-warning" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaledit<?= $us["id"]; ?>">
                      Edit
                    </span>
                    <span class="badge rounded-pill bg-danger" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $us["id"]; ?>">
                      Delete
                    </span>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
              </tbody>
          </table>
          <!-- END TABLE -->
        </div>
      </div>
    </div>
  </div>

  <!-- DATA MODAL -->

  <!-- Modal Delete -->
  <?php foreach ($user as $us) : ?>
    <div class="modal fade" id="modaldelete<?= $us["id"]; ?>" tabindex="-1" aria-labelledby="modalviewLabel" aria-hidden="true" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalviewLabel">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Anda yakin ingin menghapus akun <b><?= $us["email"] ?>?</b>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <a href="proses/data_user/delete.php?id=<?php echo $us['id'] ?>" type="button" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- END MODAL DELETE -->

  <!-- MODAL EDIT -->
  <?php foreach ($user as $us) : ?>
    <div class="modal fade" id="modaledit<?= $us["id"]; ?>" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="proses/data_user/edit.php" method="POST">
              <div class="mb-1">
                <!-- <label for="id" class="col-form-label">ID Barang:</label> -->
                <input type="text" name="id" value="<?= $us["id"]; ?>" class="form-control" id="id" hidden>
              </div>
              <div class="mb-1">
                <label for="username" class="col-form-label">Username:</label>
                <input type="text" name="username" value="<?= $us["username"]; ?>" class="form-control" id="username">
              </div>
              <div class="mb-1">
                <label for="email" class="col-form-label">Email:</label>
                <input type="text" name="email" value="<?= $us["email"] ?>" class=" form-control" id="email">
              </div>
              <div class="mb-1">
                <label for="password" class="col-form-label">Password:</label>
                <input type="text" name="password" class="form-control" id="password">
              </div>
              <div class="mb-1">
                <label for="level" class="col-form-label">Level:</label>
                <input type="text" name="level" value="<?= $us["level"] ?>" class="form-control" id="level">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Edit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- END MODAL EDIT -->

  <!-- MODAL ADD -->
  <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAddLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="proses/data_user/add.php" method="POST">
            <div class="mb-1">
              <label for="username" class="col-form-label">Username:</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-1">
              <label for="email" class="col-form-label">Email:</label>
              <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="mb-1">
              <label for="password" class="col-form-label">Password:</label>
              <input type="password" name="password" class=" form-control" id="password">
            </div>
            <div class="mb-1">
              <label for="level" class="col-form-label">Level:</label>
              <input type="text" name="level" class=" form-control" id="level">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- END MODAL ADD -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="js/sidebars.js"></script>
</body>

</html>