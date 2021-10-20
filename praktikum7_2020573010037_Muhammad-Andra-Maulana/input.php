<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan Buku Tamu</title>
</head>
<body>
    <h1>Simpan Buku Tamu MySQL</h1>
    <?php
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $bplace = $_POST["bplace"];
        $bdate = $_POST["bdate"];
        $conn = mysqli_connect("localhost", "root", "", "db_crud")
        or die ("Koneksi gagal");
        if ($password != $password2) {
            echo "Password Tidak Sama";
        } else {
            echo "Nama  : $nama <br>";            
    
            $sqlstr = "insert into dataPendaftar (nama, email,password,bplace,bdate)
                 values ('$nama','$email','$password','$bplace','$bdate')";
            $hasil = mysqli_query($conn, $sqlstr);
            if ($hasil) {
                echo "Pendaftaran berhasil";
            }
        }
        ?>
        <br>
        <button onclick="history.go(-1);">Back </button>
</body>
</html>
