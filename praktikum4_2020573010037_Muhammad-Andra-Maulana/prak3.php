<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Array dengan foreach</title>
</head>

<body>
    <?php
    $anak[0] = "Andra";
    $anak[1] = "Andri";
    $anak[2] = "Andro";

    foreach ($anak as $value) {
        echo "Nama anak : $value";
        echo "<br>";
    }
    ?>
</body>

</html>