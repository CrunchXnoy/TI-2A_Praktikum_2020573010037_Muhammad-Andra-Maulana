<?php
include "proses/session.php";

//query untuk tabel hasil tambah peminjaman
$databarang = mysqli_query($conn, "SELECT * FROM tb_peminjaman pem
LEFT JOIN tb_barang brg ON pem.barang=brg.kode_barang
LEFT JOIN tb_matakuliah mk ON pem.matakuliah=mk.kode_matakuliah
LEFT JOIN tb_dosen dos ON mk.dosen = dos.nip
LEFT JOIN user usr ON pem.user = usr.id WHERE status=2 || status=3 || status=4");
//end
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SIPBATIK | Halaman Riwayat Peminjaman</title>

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
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                    Riwayat Peminjaman
                </h4>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Peminjam</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Waktu Peminjaman</th>
                            <th scope="col">Waktu Pengembalian</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($databarang as $db) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $db["kode_barang"]; ?></td>
                                <td><?= $db["nama_barang"]; ?></td>
                                <td><?= $db["username"]; ?></td>
                                <td><?= $db["keterangan"]; ?></td>
                                <td><?= date("d-m-Y H:i:s", strtotime($db['waktu_peminjaman'])) ?></td>
                                <td><?= date("d-m-Y H:i:s", strtotime($db['waktu_pengembalian'])) ?></td>
                                <td><?= $db["matakuliah"]; ?></td>
                                <td>
                                    <?php
                                    if ($db["status"] == 1) echo "<span class='badge rounded-pill bg-secondary'>Pending</span>";
                                    elseif ($db["status"] == 2) echo "<span class='badge rounded-pill bg-success'>Disetujui</span>";
                                    elseif ($db["status"] == 3) echo "<span class='badge rounded-pill bg-danger'>Ditolak</span>";
                                    elseif ($db["status"] == 4) echo "<span class='badge rounded-pill bg-info'>Telah Dikembalikan</span>";
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalapprove<?= $db["kode_barang"]; ?>" <?php if ($db["status"] == "2") {
                                                                                                                                                                        echo "disabled";
                                                                                                                                                                    }; ?>>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit<?= $db["kode_barang"]; ?>" <?php if ($db["status"] == "2") {
                                                                                                                                                                    echo "disabled";
                                                                                                                                                                }; ?>>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaledit<?= $db["kode_barang"]; ?>" <?php if ($db["status"] == "2") {
                                                                                                                                                                    echo "disabled";
                                                                                                                                                                }; ?>>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                                            <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                                        </svg>
                                    </button>
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
                        <a href="proses/peminjaman/delete.php?id=<?php echo $dp['kode_barang'] ?>" type="button" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- END MODAL DELETE -->
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
                        <form action="proses/peminjaman/edit.php" method="POST">
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
    <!-- MODAL APPROVE -->
    <?php foreach ($databarang as $dp) : ?>
        <div class="modal fade" id="modalapprove<?= $dp["kode_barang"]; ?>" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="proses/peminjaman/approve.php" method="POST">
                            <div class="mb-1">
                                <input type="hidden" name="id_peminjaman" value="<?= $dp["id_peminjaman"]; ?>" class="form-control" id="nama_barang">
                            </div>
                            <div class="mb-1">
                                <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                                <input type="text" name="nama_barang" value="<?= $dp["kode_barang"] . " - " . $dp["nama_barang"]; ?>" class="form-control" id="nama_barang" readonly>
                            </div>
                            <div class="mb-1">
                                <label for="keterangan" class="col-form-label">Keterangan:</label>
                                <input type="text" name="keterangan" value="<?= $dp["keterangan"] ?>" class=" form-control" id="keterangan" readonly>
                            </div>
                            <div class="mb-1">
                                <label for="keterangan" class="col-form-label">Waktu Peminjaman & Pengembalian:</label>
                                <input type="select" name="waktu" value="<?= date("d-m-Y H:i:s", strtotime($db['waktu_peminjaman'])) . " s.d " . date("d-m-Y H:i:s", strtotime($db['waktu_pengembalian'])) ?>" class=" form-control" id="keterangan" readonly>
                            </div>
                            <div class="mb-1">
                                <label for="nama_barang" class="col-form-label">Aksi:</label>
                                <select name="aksi" class="form-select" aria-label="Default select example">
                                    <option value="2">Disetujui</option>
                                    <option value="3">Ditolak</option>
                                </select>
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
    <!-- END MODAL APPROVE -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="js/sidebars.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>