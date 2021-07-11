<?php

if(empty($_GET['page']))
{
    require "views/accueil.view.php";
}
else
{
    switch($_GET['page'])
    {
        case "accueil" : require "views/accueil.view.php";
            break;
        case "recherche" : require "views/recherche.php";
        break;
        case "account" : require "views/account.php";
        break;

    }
}
