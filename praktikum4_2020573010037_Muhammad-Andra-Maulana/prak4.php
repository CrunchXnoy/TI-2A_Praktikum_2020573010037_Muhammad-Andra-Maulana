<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan array secara asosiatif</title>
</head>

<body>
    <?php
    $telpon["Andra"] = "08537254";
    $telpon["Andri"] = "08526010";
    $telpon["Andro"] = "08236150";

    echo "Telpon Andra : " . $telpon['Andra'];
    echo "<br>";
    echo "Telpon Andri : " . $telpon['Andri'];
    echo "<br>";
    echo "Telpon Andro : " . $telpon['Andro'];
    echo "<br>";
    ?>
</body>

</html>