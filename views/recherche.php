<?php
session_start();
include("controllers/isDisconnected.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<header class="banner">
    <h1>Mythique</h1>
    <nav class="navButtons">

        <div class="Buttons">
            <a href="./accueil">
                <button class="button1 btn btn-secondary btn-lg">ACCUEIL</button>
            </a>

            <a href="./recherche">
                <button class="button2 btn btn-secondary btn-lg">RECHERCHE</button>
            </a>

            <a>
                <button class="button3 btn btn-secondary btn-lg" id="logged_out">DECONNECTION</button>
            </a>
        </div>

    </nav>
</header>
<div id="containerResearsh">

    <fieldset class="fieldsetResearch">
        <legend id = "titreResearch">Recherche</legend>
        <form id="formResearch">
            <label for="gender-select">Recherche pas genre : </label>
            <select class="inputMargin" name="gender" id="gender-select">
                <option value="">--Please choose an option--</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
            <label for="country">Ville :</label>
            <input class="inputMargin" type="text" name="country" id="ville"/>
            <input type="button" value="Envoyer" id="researchForm"/>
        </form>

    </fieldset>

    <div class="container-slider">
        <div>
            <img src="./images/leftArrow.png" alt="leftArrow" class="prev">
        </div>

        <div class="intern-slider">

        </div>
        <div>
            <img src="./images/rightArrow.png" alt="rightArrow" class="next">
        </div>
    </div>

</div>
<!--        <div class="extern-slider">-->
<!--            <img src="./images/leftArrow.png" alt="leftArrow" class="prev">-->
<!--            <img src="./images/rightArrow.png" alt="rightArrow" class="next">-->
<!--        </div>-->


<!--</div>  <div class="active">la div 1</div>-->
<!--<div>la div 2</div>-->
<!--<div>la div 3</div>-->








<footer>

</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="controllers/javascript/recherche.js"></script>
<script src="controllers/javascript/jquery.js"></script>
</body>
</html>