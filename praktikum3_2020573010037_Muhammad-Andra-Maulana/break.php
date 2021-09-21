<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpindahan dengan menggunakan Break (Berfungsi memaksa perulangan berhenti dan melanjutkan program setelah perulangan) - Muhammad Andra Maulana</title>
</head>

<body>
    <?php
    for ($i = 0; $i < 5; $i++) {
        if ($i == 2) {
            break;
        }
        echo ("Nilai i : $i <br>");
    }
    echo ("Loop Selesai");
    ?>
</body>

</html>