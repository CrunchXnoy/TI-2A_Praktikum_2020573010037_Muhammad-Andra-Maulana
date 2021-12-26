<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .kotak {
            width: 100;
            height: 400;
            margin: 50px;
            display: flex;
        }

        .kotak img {
            margin: auto;
            max-width: 40%;
        }

        .animasi-teks {
            font-size: 29px;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            -webkit-animation: typing 5s steps(70, end);
            animation: animasi-ketik 5s steps(70, end);
        }

        @keyframes animasi-ketik {
            from {
                width: 0;
            }
        }

        @-webkit-keyframes animasi-ketik {
            from {
                width: 0;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.min.css">
</head>

<body>
    <rssapp-wall id="ExSeNfJL5d0liSRw"></rssapp-wall>
    <script src="https://widget.rss.app/v1/wall.js" type="text/javascript" async></script>

    <br>
    <center><a href="home"><button class="btn btn-success">Back</button></a></center>
</body>

</html>