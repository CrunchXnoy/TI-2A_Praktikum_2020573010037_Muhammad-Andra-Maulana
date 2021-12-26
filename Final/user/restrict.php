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
    <div class="kotak" data-tilt>
        <img src="../images/denied.png"></img>
    </div>
    <center>
        <div class="animasi-teks">
            <h3>Admin shouldn't access this page</h3>
        </div>
    </center>
    <br>
    <center><a href="../landing"><button class="btn btn-success">Back</button></a></center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/vanilla-tilt.min.js"></script>
    <!-- <script type="text/javascript">
        VanillaTilt.init(document.querySelector(".kotak"), {
            max: 25,
            speed: 100
        });

        //It also supports NodeList
        VanillaTilt.init(document.querySelectorAll(".your-element"));
    </script> -->
</body>

</html>