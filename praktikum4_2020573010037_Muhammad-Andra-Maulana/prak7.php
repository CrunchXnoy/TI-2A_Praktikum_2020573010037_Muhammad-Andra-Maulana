<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemakaian fungsi built-in : String</title>
</head>

<body>
    <?php
    $str = "Belajar PHP ternyata menyenangkan";
    echo strtolower($str); //ubah huruf kecil
    echo "<br>";
    echo strtoupper($str); //besar semua
    echo "<br>";
    echo str_replace("menyenangkan", "mudah lho", $str); //ganti string
    echo "<br>";

    ?>
</body>

</html>