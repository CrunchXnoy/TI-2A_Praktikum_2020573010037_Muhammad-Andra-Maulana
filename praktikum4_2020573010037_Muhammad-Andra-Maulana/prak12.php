<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modularisasi menggunakan include</title>
</head>

<body>
    <?php
    for ($b = 1; $b < 5; $b++) {
        include("contoh_include.php");
    }
    ?>
</body>

</html>