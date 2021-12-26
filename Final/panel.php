<?php
include "proses/session.php";
// require"proses/session.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1"> -->
  <title>SIPBATIK | Sistem Informasi Peminjaman Barang Jurusan TIK</title>

  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/"> -->


  <link rel="stylesheet" type="text/css" href="css/DataTables/dataTables.bootstrap5.min.css" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/sidebar/style.css">
  <!-- Bootstrap core CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

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

  <div class="wrapper d-flex align-items-stretch">

    <!-- NAVBAR MASUK -->
    <?php
    require "sidebar.php";
    ?>

    <!-- NAVBAR MASUK -->
    <?php
    require "navbar.php";
    ?>
    <!-- END NAVBAR -->
    <!-- CONTENT -->
    <!-- TABLE -->
    <div class="col">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSidebar">Tambah Sidebar</button><br><br>
      <div class="card">
        <div class="card-body">
          <!-- <div class="alert alert-success" role="alert">Data deleted</div> -->
          <!-- TABLE -->
          <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Icon</th>
                <th scope="col">Access</th>
                <th scope="col">Active</th>
                <th scope="col">URL</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <?php $i = 1; ?>
            <?php foreach ($sidebar as $sb) : ?>
              <tbody>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $sb["sidebar_name"]; ?></td>
                  <td>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="<?= $sb['icon']; ?>" viewBox="0 0 16 16">
                      <path d="<?= $sb['path1']; ?>" />
                      <path d="<?= $sb['path2']; ?>" />
                    </svg>
                  </td>
                  <td><?= $sb["sidebar_level"]; ?></td>
                  <td><?= $sb["is_active"]; ?></td>
                  <td><?= $sb["sidebar_url"]; ?></td>
                  <td>
                    <a>
                      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSidebar<?= $sb["id"]; ?>">
                      Edit
                    </button>
                    </a>
                    
                    </a>
                    <a onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="proses/panel/delete.php?id=<?php echo $sb['id'] ?>">
                      <button class="btn btn-danger">
                        Delete
                      </button>
                    </a>
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
    <!-- CONTENT -->
  </div>
  </div>

  <!-- MODAL ADD -->
  <div class="modal fade" id="addSidebar" tabindex="-1" aria-labelledby="addSidebarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addSidebarLabel">Add Sidebar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="proses/panel/add.php" method="POST">
            <div class="mb-1">
              <label for="icon" class="col-form-label">icon:</label>
              <input type="text" name="icon" class="form-control" id="icon">
            </div>
            <div class="mb-1">
              <label for="path1" class="col-form-label">path1:</label>
              <textarea class="form-control" name="path1" id="path1"></textarea>
            </div>
            <div class="mb-1">
              <label for="path2" class="col-form-label">path2:</label>
              <textarea class="form-control" name="path2" id="path2"></textarea>
            </div>
            <div class="mb-1">
              <label for="path3" class="col-form-label">path3:</label>
              <textarea class="form-control" name="path3" id="path3"></textarea>
            </div>
            <div class="mb-1">
              <label for="sidebar_name" class="col-form-label">name:</label>
              <input type="text" class="form-control" name="sidebar_name" id="sidebar_name">
            </div>
            <div class="mb-1">
              <label for="sidebar_url" class="col-form-label">url:</label>
              <input type="text" class="form-control" name="sidebar_url" id="sidebar_url">
            </div>
            <div class="mb-1">
              <label for="sidebar_file" class="col-form-label">file:</label>
              <input type="text" class="form-control" name="sidebar_file" id="sidebar_file">
            </div>
            <div class="mb-1">
              <label for="sidebar_level" class="col-form-label">level:</label>
              <input type="text" class="form-control" name="sidebar_level" id="sidebar_level">
            </div>
            <div class="mb-1">
              <label for="is_active" class="col-form-label">is_active:</label>
              <input type="text" class="form-control" name="is_active" id="is_active">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- END MODAL ADD -->

  <?php foreach ($sidebar as $sb) : ?>
    <!-- MODAL EDIT -->
    <div class="modal fade" id="editSidebar<?= $sb["id"]; ?>" tabindex="-1" aria-labelledby="editSidebarLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editSidebarLabel">Edit Sidebar ID : <?php echo $sb['id'] ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="proses/panel/update.php" method="POST">
              <div class="mb-1">
                <label for="id" class="col-form-label">id:</label>
                <input type="text" value="<?php echo $sb['id'] ?>" name="id" class="form-control" id="id" readonly>
              </div>
              <div class="mb-1">
                <label for="icon" class="col-form-label">icon:</label>
                <input type="text" value="<?php echo $sb['icon'] ?>" name="icon" class="form-control" id="icon">
              </div>
              <div class="mb-1">
                <label for="path1" class="col-form-label">path1:</label>
                <textarea class="form-control" name="path1" id="path1"><?php echo $sb['path1'] ?></textarea>
              </div>
              <div class="mb-1">
                <label for="path2" class="col-form-label">path2:</label>
                <textarea class="form-control" name="path2" id="path2"><?php echo $sb['path2'] ?></textarea>
              </div>
              <div class="mb-1">
                <label for="path3" class="col-form-label">path3:</label>
                <textarea class="form-control" name="path3" id="path3"><?php echo $sb['path3'] ?></textarea>
              </div>
              <div class="mb-1">
                <label for="sidebar_name" class="col-form-label">name:</label>
                <input type="text" class="form-control" value="<?php echo $sb['sidebar_name'] ?>" name="sidebar_name" id="sidebar_name">
              </div>
              <div class="mb-1">
                <label for="sidebar_url" class="col-form-label">url:</label>
                <input type="text" class="form-control" value="<?php echo $sb['sidebar_url'] ?>" name="sidebar_url" id="sidebar_url">
              </div>
              <div class="mb-1">
                <label for="sidebar_level" class="col-form-label">level:</label>
                <input type="text" class="form-control" value="<?php echo $sb['sidebar_level'] ?>" name="sidebar_level" id="sidebar_level">
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="check" checked>
                <label class="form-check-label" for="flexCheckDefault">
                  is_active
                </label>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END MODAL EDIT -->
  <?php endforeach; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="js/sidebars.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

  <script type="text/javascript" src="jQuery-3.6.0/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="js/DataTables/jquery.dataTables.js"></script>
  <script type="text/javascript" src="js/DataTables/dataTables.bootstrap5.js"></script>
</body>

</html>