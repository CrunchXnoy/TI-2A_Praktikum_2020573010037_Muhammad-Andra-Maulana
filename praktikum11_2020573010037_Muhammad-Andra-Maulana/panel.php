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
  <title>SIPBATIK | Dashboard Panel</title>

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
        <div class="card">
        <!-- <div class="alert alert-success" role="alert">Data deleted</div> -->
          <!-- TABLE -->
          <table class="table">
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
                <td><?= $sb["icon_name"]; ?></td>
                <td>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="<?= $sb['icon']; ?>" viewBox="0 0 16 16">
                        <path d="<?= $sb['path1']; ?>"/>
                        <path d="<?= $sb['path2']; ?>"/>
                    </svg>
                </td>
                <td><?= $sb["icon_level"]; ?></td>
                <td><?= $sb["is_active"]; ?></td>
                <td><?= $sb["icon_url"]; ?></td>
                <td>
                <a> 
                  <button type="button" class="badge rounded-pill bg-warning" data-bs-toggle="modal" data-bs-target="#editSidebar">Edit</button>
                </a>
                </a>
                <a 
                  onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="proses/panel/delete.php?id=<?php echo $sb['id'] ?>">
                  <span class="badge rounded-pill bg-danger">
                    Delete
                  </span>
                </a>
              </td>
              </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- END TABLE -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSidebar">Tambah Sidebar</button>
        </div>
      </div>
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
            <label for="icon_name" class="col-form-label">name:</label>
            <input type="text" class="form-control" name="icon_name" id="icon_name">
          </div>
          <div class="mb-1">
            <label for="icon_url" class="col-form-label">url:</label>
            <input type="text" class="form-control" name="icon_url" id="icon_url">
          </div>
          <div class="mb-1">
            <label for="icon_file" class="col-form-label">file:</label>
            <input type="text" class="form-control" name="icon_file" id="icon_file">
          </div>
          <div class="mb-1">
            <label for="icon_level" class="col-form-label">level:</label>
            <input type="text" class="form-control" name="icon_level" id="icon_level">
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

  <!-- MODAL EDIT -->
  <div class="modal fade" id="editSidebar" tabindex="-1" aria-labelledby="editSidebarLabel" aria-hidden="true">
    <?php $id = 'id'; ?>
    <?php foreach ($sidebar as $sb) : ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSidebarLabel">Edit Sidebar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses/panel/update.php" method="POST">
          <div class="mb-1">
            <label for="icon" class="col-form-label">icon:</label>
            <input type="text" value="<?php echo $sb['icon'] ?>" name="icon" class="form-control" id="icon">
          </div>
          <div class="mb-1">
            <label for="path1" class="col-form-label">path1:</label>
            <textarea class="form-control" value="<?php echo $sb['path1'] ?>" name="path1" id="path1"></textarea>
          </div>
          <div class="mb-1">
            <label for="path2" class="col-form-label">path2:</label>
            <textarea class="form-control" value="<?php echo $sb['path2'] ?>" name="path2" id="path2"></textarea>
          </div>
          <div class="mb-1">
            <label for="path3" class="col-form-label">path3:</label>
            <textarea class="form-control" value="<?php echo $sb['path3'] ?>" name="path3" id="path3"></textarea>
          </div>
          <div class="mb-1">
            <label for="icon_name" class="col-form-label">name:</label>
            <input type="text" class="form-control" value="<?php echo $sb['icon_name'] ?>" name="icon_name" id="icon_name">
          </div>
          <div class="mb-1">
            <label for="icon_url" class="col-form-label">url:</label>
            <input type="text" class="form-control" value="<?php echo $sb['icon_url'] ?>" name="icon_url" id="icon_url">
          </div>
          <div class="mb-1">
            <label for="icon_level" class="col-form-label">level:</label>
            <input type="text" class="form-control" value="<?php echo $sb['icon_level'] ?>" name="icon_level" id="icon_level">
          </div>
          <div class="mb-1">
            <label for="is_active" class="col-form-label">is_active:</label>
            <input type="text" class="form-control" value="<?php echo $sb['is_active'] ?>" name="is_active" id="is_active">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
  <?php endforeach; ?>
</div>
    <!-- END MODAL EDIT -->        

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="js/sidebars.js"></script>
</body>

</html>