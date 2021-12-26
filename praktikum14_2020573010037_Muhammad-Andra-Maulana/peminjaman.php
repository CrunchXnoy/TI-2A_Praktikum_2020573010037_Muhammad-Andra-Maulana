<?php
include "proses/session.php";
// require"proses/session.php";
$datapeminjaman = mysqli_query($conn, "SELECT * FROM tb_peminjaman pem 
RIGHT JOIN tb_barang brg ON pem.barang=brg.kode_barang 
LEFT JOIN tb_mahasiswa mhs ON pem.user=mhs.id_user
LEFT JOIN tb_matakuliah mk ON pem.matakuliah=mk.kode_matakuliah
LEFT JOIN tb_dosen dos ON mk.dosen=dos.nip");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>SIPBATIK | Halaman Peminjaman</title>

  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/"> -->



  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
        <!-- KONTEN -->
        <!-- PROYEKTOR -->
        <h4>
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
          </svg>
          List Peminjaman
        </h4>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalAdd">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
          </svg>Add
        </button>
        <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#modalList">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist me-2" viewBox="0 0 16 16">
            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
          </svg>List Peminjaman
        </button>

        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($databarang as $db) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $db["nama_barang"]; ?></td>
                <td><?= $db["keterangan"]; ?></td>
                <td>
                  <span class="badge rounded-pill bg-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalview<?= $db["kode_barang"]; ?>">
                    View
                  </span>
                  <span class="badge rounded-pill bg-warning" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaledit<?= $db["kode_barang"]; ?>">
                    Edit
                  </span>
                  <span class="badge rounded-pill bg-danger" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $db["kode_barang"]; ?>">
                    Delete
                  </span>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- <div class="row">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/infocus.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Proyektor</h5>
                            <p class="card-text">Ini adalah alat sihir untuk menembak layar</p>
                            <a href="#" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb-fill" viewBox="0 0 16 16">
                                    <path d="M8.5 1.75v2.716l.047-.002c.312-.012.742-.016 1.051.046.28.056.543.18.738.288.273.152.456.385.56.642l.132-.012c.312-.024.794-.038 1.158.108.37.148.689.487.88.716.075.09.141.175.195.248h.582a2 2 0 0 1 1.99 2.199l-.272 2.715a3.5 3.5 0 0 1-.444 1.389l-1.395 2.441A1.5 1.5 0 0 1 12.42 16H6.118a1.5 1.5 0 0 1-1.342-.83l-1.215-2.43L1.07 8.589a1.517 1.517 0 0 1 2.373-1.852L5 8.293V1.75a1.75 1.75 0 0 1 3.5 0z" />
                                </svg>
                                Pinjam
                            </a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="assets/infocus.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Wire</h5>
                            <p class="card-text">Ini adalah alat sihir untuk menembak layar</p>
                            <a href="#" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb-fill" viewBox="0 0 16 16">
                                    <path d="M8.5 1.75v2.716l.047-.002c.312-.012.742-.016 1.051.046.28.056.543.18.738.288.273.152.456.385.56.642l.132-.012c.312-.024.794-.038 1.158.108.37.148.689.487.88.716.075.09.141.175.195.248h.582a2 2 0 0 1 1.99 2.199l-.272 2.715a3.5 3.5 0 0 1-.444 1.389l-1.395 2.441A1.5 1.5 0 0 1 12.42 16H6.118a1.5 1.5 0 0 1-1.342-.83l-1.215-2.43L1.07 8.589a1.517 1.517 0 0 1 2.373-1.852L5 8.293V1.75a1.75 1.75 0 0 1 3.5 0z" />
                                </svg>
                                Pinjam
                            </a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="assets/infocus.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Printer</h5>
                            <p class="card-text">Ini adalah alat sihir untuk menembak layar</p>
                            <a href="#" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb-fill" viewBox="0 0 16 16">
                                    <path d="M8.5 1.75v2.716l.047-.002c.312-.012.742-.016 1.051.046.28.056.543.18.738.288.273.152.456.385.56.642l.132-.012c.312-.024.794-.038 1.158.108.37.148.689.487.88.716.075.09.141.175.195.248h.582a2 2 0 0 1 1.99 2.199l-.272 2.715a3.5 3.5 0 0 1-.444 1.389l-1.395 2.441A1.5 1.5 0 0 1 12.42 16H6.118a1.5 1.5 0 0 1-1.342-.83l-1.215-2.43L1.07 8.589a1.517 1.517 0 0 1 2.373-1.852L5 8.293V1.75a1.75 1.75 0 0 1 3.5 0z" />
                                </svg>
                                Pinjam
                            </a>
                        </div>
                    </div> -->
      </div>
    </div>
  </div>
  </div>
  </div>

  <!-- Modal Delete -->
  <?php foreach ($databarang as $dp) : ?>
    <div class="modal fade" id="modaldelete<?= $dp["kode_barang"]; ?>" tabindex="-1" aria-labelledby="modalviewLabel" aria-hidden="true" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalviewLabel">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Anda yakin ingin menghapus <b><?= $dp["nama_barang"] ?>?</b>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <a href="proses/data_barang/delete.php?id=<?php echo $dp['kode_barang'] ?>" type="button" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- END MODAL DELETE -->

  <!-- Modal List Peminjaman -->
  <?php foreach ($databarang as $dp) : ?>
    <div class="modal fade" id="modalList" tabindex="-1" aria-labelledby="modalviewLabel" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalviewLabel">List Peminjaman</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID Peminjaman</th>
                  <th scope="col">Kode Barang</th>
                  <th scope="col">Barang</th>
                  <th scope="col">Status</th>
                  <th scope="col">Peminjam</th>
                  <th scope="col">Waktu Peminjaman</th>
                  <th scope="col">Waktu Pengembalian</th>
                  <th scope="col">Matakuliah</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($datapeminjaman as $dp) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td>PNJM-<?= $dp["id_peminjaman"]; ?></td>
                    <td><?= $dp["kode_barang"]; ?></td>
                    <td><?= $dp["nama_barang"]; ?></td>
                    <td><?php
                        if ($dp["status"] == 1) {
                          $status = "Dipinjam";
                        } else if ($dp["status"] == 2) {
                          $status = "Tersedia";
                        } else if ($dp["status"] == 3) {
                          $status = "Dipinjam";
                        } else {
                          $status = "Tersedia";
                        }
                        echo $status;
                        ?>
                    </td>
                    <td><?= $dp["user"]; ?></td>
                    <td><?= $dp["waktu_peminjaman"]; ?></td>
                    <td><?= $dp["waktu_pengembalian"]; ?></td>
                    <td><?= $dp["nm_matakuliah"]; ?> - <?= $dp["nm_dosen"]; ?></td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- END MODAL List Peminjaman -->

  <!-- Modal View -->
  <?php foreach ($databarang as $dp) : ?>
    <div class="modal fade" id="modalview<?= $dp["kode_barang"]; ?>" tabindex="-1" aria-labelledby="modalviewLabel" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalviewLabel">Log Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="<?= $dp["gambar"] ?>" style="max-height:350px;" width="50%" height="50%" class="rounded mx-auto d-block">
            <br>
            <table class="table table-bordered border-primary">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Time</th>
                  <th scope="col">Peminjam</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>16/04/2021, 16:40</td>
                  <td>Muhammad Andra Maulana</td>
                  <td>
                    Sudah Dikembalikan
                  </td>
                </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- END MODAL VIEW -->
  <!-- MODAL EDIT -->
  <?php foreach ($databarang as $dp) : ?>
    <div class="modal fade" id="modaledit<?= $dp["kode_barang"]; ?>" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddLabel">Edit Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="proses/data_barang/edit.php" method="POST">
              <div class="mb-1">
                <label for="kode_barang" class="col-form-label">ID Barang:</label>
                <input type="text" name="kode_barang" value="<?= $dp["kode_barang"]; ?>" class="form-control" id="kode_barang">
              </div>
              <div class="mb-1">
                <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                <input type="text" name="nama_barang" value="<?= $dp["nama_barang"]; ?>" class="form-control" id="nama_barang">
              </div>
              <div class="mb-1">
                <label for="keterangan" class="col-form-label">Keterangan:</label>
                <input type="text" name="keterangan" value="<?= $dp["keterangan"] ?>"" class=" form-control" id="keterangan">
              </div>
              <div class="mb-1">
                <label for="gambar" class="col-form-label">Gambar:</label>
                <input type="text" name="gambar" value="<?= $dp["gambar"] ?>" class="form-control" id="gambar">
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
          <h5 class="modal-title" id="modalAddLabel">Tambah Peminjaman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="proses/peminjaman/add.php" method="POST">
            <div class="mb-1">
              <label for="brg" class="col-form-label">Nama Barang:</label>
              <select name="brg" id="brg" class="form-select" aria-label="Default select example">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_barang");
                while ($hasil1 = mysqli_fetch_array($query)) {
                  echo "<option value=''>$hasil1[kode_barang] - $hasil1[nama_barang]</option>";
                }
                ?>
              </select>
            </div>
            <div class="mb-1">
              <label for="mk" class="col-form-label">Mata Kuliah:</label>
              <select name="mk" id="mk" class="form-select" aria-label="Default select example">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_matakuliah mk
                LEFT JOIN tb_dosen dos ON mk.dosen=dos.nip");
                while ($hasil = mysqli_fetch_array($query)) {
                  echo "<option value=''>$hasil[kode_matakuliah] - $hasil[nm_dosen]</option>";
                }
                ?>
              </select>
            </div>
            <div class="mb-1">
              <label for="waktu_pengembalian" class="col-form-label">Waktu Pengembalian:</label>
              <input type="text" name="waktu_pengembalian" class="form-control" id="waktu_pengembalian">
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>