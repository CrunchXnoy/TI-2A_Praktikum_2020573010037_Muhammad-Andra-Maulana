<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percabangan dengan menggunakan switch-case - Muhammad Andra Maulana</title>
</head>

<body>
    <?php $x = 2;
    switch ($x) {
        case 1:
            echo "Nomor 1";
            break;
        case 2:
            echo "Nomor 2";
            break;
        default:
        case 4:
            echo "Bukan Nomor diantara 1 dan 3";
    }
    ?>
</body>

</html>