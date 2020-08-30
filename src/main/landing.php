<?php
require_once("../include/database.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>HARMONICS</title>
</head>

<body>

    <div class="topnav" id="myTopnav">
        <!-- Letf align buttons-->
        <a href="<?= LOGIN_PAGE ?>">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="background">
        <div class="bg-image-landing">
            <form action="<?= LOGIN_PAGE ?>" method="get">
                <button class="btn start">Get started here</button>
            </form>
        </div>
        <div class="logo"></div>
        <h1>
            Meet. Jam. Create
        </h1>
    </div>

</body>

</html>