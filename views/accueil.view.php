<?php
session_start();
require 'models/dbConnect.php';
require("controllers/isConnected.php");
require_once 'controllers/loisir.php';
global $result;
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Document</title>
</head>
<body>




<header class="banner1">
    <h1>Mythique</h1>
<!--    <nav class="navButtons">-->
<!---->
<!--        <div class="Buttons">-->
<!---->
<!--            <a href="accueil">-->
<!--                <button class="button1">ACCUEIL</button>-->
<!--            </a>-->
<!---->
<!--            <a href="recherche">-->
<!--                <button class="button2">RECHERCHE</button>-->
<!--            </a>-->
<!---->
            <a>
                <button class="button3">INSCRIPTION</button>
            </a>
<!--        </div>-->

        <form class="formConnexion" action="accueil.view.php" method="post">
            <label for="emailConnexion">Email :</label>
            <input type="email" name="emailConnexion" id="emailConnexion" required/>
            <label for="mdpConnexion">Mot de passe :</label>
            <input type="password" name="mdpConnexion" id="mdpConnexion" required/>
            <input type="button" value="Se connecter" id="seConnecter"/>
        </form>

    </nav>
</header>
<div id = "response"></div>
    <div class="bannerImg">
        <div class="textBanner">
            <H1>Faire des rencontres à Rennes</H1>
            <p>Rennes est classée parmi les 10 premières villes de France agréables à vivre. Labellisée ville d'art et
                d'histoire, elle attire pour son… </p>
        </div>
        <a><button class="buttonImg">INSCRIPTION</button></a>
        <div class="containerInscription">
<!--            INSCRIPTION-->
            <form id="formInscription"  onsubmit="return false;">
                <fieldset>
                    <legend>Inscription</legend>

                    <label for="name">Nom :</label>
                    <input class="inputMargin" type="text" name="name" id="name" maxlength="16"/>
                    <div id="output_checkuser"></div>


                    <label for="secondName">Prénom :</label>
                    <input class="inputMargin" type="text" name="secondName" id="secondName" required/>
                    <div id="output_checkuser2"></div>

                    <label for="birthday">Date de naissance :</label>
                    <input class="inputMargin" type="date" name="birthday" id="birthday" required/>
                    <div id="output_checkuser3"></div>

                   <!-- <label for="pseudo">Genre :</label>
                    <input class="inputMargin" type="select" required/>-->

                    <label for="gender">Sexe :</label>
                    <select class="inputMargin" name="gender" id="gender-select" required>
                        <option value="">--Please choose an option--</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                    <div id="output_checkuser4"></div>

                    <label for="country">Ville :</label>
                    <input class="inputMargin" type="text" name="country" id="country" required/>
                    <div id="output_checkuser5"></div>

                    <label for="email">Email :</label>
                    <input class="inputMargin" type="text" name="email" id="email" required/>
                    <div id="output_checkuser6"></div>

                    <label for="mdp">Mot de passe :</label>
                    <input  class="inputMargin" type="password" name="mdp" id="mdp"required/>
                    <div id="output_checkuser7"></div>

                    <label for="loisir">Loisirs :</label>
                    <select class = inputMargin name="loisir" id = "loisir">

                        <?php
                        foreach ($result as $value){
                            echo "<option value=' . $value . '>" . $value . "</option>";

                        }
                        ?>

                    </select>

<!--                    <input class="inputMargin" type="text" name="loisir" id="loisir"required/>-->
                    <div id="output_checkuser8"></div>

<!--                    <div id="status">-->
<!--                        Inscription réservée aux personnes majeurs !-->
<!--                    </div>-->

                    <input type="button" value="Envoyer" id="envoyer" />
                </fieldset>



            </form>
        </div>

    </div>




<footer>

</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="controllers/javascript/jquery.js"></script>
<script src="controllers/javascript/script.js"></script>
</body>
</html>