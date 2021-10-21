<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Status</h1>
    <?php
        session_start();
        $email = $_POST["email"];
        $password = $_POST["password"];
        $conn = mysqli_connect("localhost", "root", "", "db_crud")
        or die ("Koneksi gagal");

        $data = mysqli_query($conn,"select * from dataPendaftar where email='$email' and password='$password'");
        $cek = mysqli_num_rows($data);        
        if($cek > 0){
            $_SESSION['email'] = $email;
            $_SESSION['status'] = "login";
            header("location:admin/index.php");
        }else{
            header("location:login.php?pesan=gagal");
        }        
        ?>
        <br>
        <button onclick="history.go(-1);">Back </button>
</body>
</html>
