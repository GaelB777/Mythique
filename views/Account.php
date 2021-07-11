<?php
session_start();
include("controllers/isDisconnected.php");
var_dump($_SESSION);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
<header class="banner">
    <h1>Mythique</h1>
    <nav class="navButtons">

        <div class="Buttons">

<!--            <a href="./accueil">-->
<!--                <button class="button1">ACCUEIL</button>-->
<!--            </a>-->

            <a href="./recherche">
                <button class="button2">RECHERCHE</button>
            </a>

            <a>
                <button class="button3" id="logged_out">DECONNECTION</button>
            </a>
        </div>

    </nav>

</header>



<div id="containerProfil">

    <div id="containerProfil2">
        <div class = "infoSession"><?php echo "nom : " . $_SESSION['Nom']?></div>
        <div class = "infoSession"><?php echo "prenom : " . $_SESSION['Prénom']?></div>
        <div class = "infoSession"> <?php echo "genre : " . $_SESSION['Genre']?></div>
        <div class = "infoSession"> <?php echo "date de naissance : " . $_SESSION['Date de naissance']?></div>
        <div class = "infoSession"> <?php echo "loisir : " . $_SESSION['Loisir']?></div>
        <div class = "infoSession" id="infoLast"> <?php echo "email : " . $_SESSION['Email']?></div>
    </div>

</div>

<footer>

</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="controllers/javascript/jquery.js"></script>
</body>
