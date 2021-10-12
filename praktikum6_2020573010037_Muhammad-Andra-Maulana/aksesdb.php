<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi MySQL dengan MySQL_fetch_array</title>
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "db_saya")
        or die("Koneksi Gagal");
        $hasil = mysqli_query($conn, "select * from liga");
        while ($row = mysqli_fetch_array($hasil)){
            echo "Liga" . $row["negara"]; 
            echo " mempunyai" . $row[2];
            echo " wakil di liga champion <br>";
        }
    ?>
</body>
</html>