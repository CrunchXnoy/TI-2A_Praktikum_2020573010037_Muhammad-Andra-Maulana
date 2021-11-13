<?php  
        session_start();
        require "koneksi.php";
        $email =$_POST['email'];
        $password =$_POST['password'];

        $hasil = mysqli_query($conn,"select * from user WHERE email='$email' AND password ='$password'");
        $row = mysqli_fetch_array($hasil);
        if ($hasil){
                if (isset($row['email']) && isset($row['password']) && $row['email'] == $email && $row['password'] == $password) {
                echo "email ada";
                $_SESSION['email']=$row['email'];
                header("Location: ../project.php");
                }
                else{ 
                        echo "<script>
                        alert ('Mohon maaf email atau password yang anda masukkan salah')
                        </script>";
                }
        }
                else{
                        echo "Terjadi kesalahan";
                }
?>
<!-- bagaimana cara membuat jika berhasil login akan balik ke menu index  -->
<!-- jika salah membuat balik ke menu form login -->
