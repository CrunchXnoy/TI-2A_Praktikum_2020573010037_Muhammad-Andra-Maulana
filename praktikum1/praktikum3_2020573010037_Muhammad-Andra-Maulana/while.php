<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perulangan dengan memakai while - Muhammad Andra Maulana</title>
</head>

<body>
    <?php
    echo "<h3> Cara 1 </h3>";
    $i = 1;
    while ($i <= 10) {
        print $i++;
    }
    echo "<br>";
    echo "<h3>Cara 2</h3>";
    $i = 1;
    while ($i <= 10) :
        print $i;
        $i++;
    endwhile;
    ?>
</body>

</html>