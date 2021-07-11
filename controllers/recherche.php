<?php
session_start();

require_once '../models/dbConnect.php';

$utilisateur = $_SESSION['Email'];

$connexion = new dbConnect;
$db = $connexion->getDB();

$result = [];

$genre = $_POST['genderPHP'];
$country = $_POST['countryPHP'];

if(empty($genre) && empty($country)){

    global $result;

    $sql = "
                    SELECT * FROM users WHERE Email != '$utilisateur'


               ";

    $data = $db->prepare($sql);
    $data->execute();
    $resultGender = $data->fetchAll();

    $result[] = $resultGender;

}


if(!empty($genre)){

    global $result;

    $sql = "
                    SELECT * FROM users WHERE Genre = '$genre' AND Email != '$utilisateur'


               ";

    $data = $db->prepare($sql);
    $data->execute();
    $resultGender = $data->fetchAll();
    $result[] = $resultGender;

}


if(!empty($country)){

    $sql = "
                    SELECT * FROM users WHERE Ville = '$country' AND Email != '$utilisateur'
                    
                    
               ";

    $data = $db->prepare($sql);
    $data->execute();
    $resultCountry = $data->fetchAll();
    $result[] = $resultCountry;

}



for($k = 0; $k < count($result); $k++)
{

    if(!empty($coutry)){
        for($i = 0; $i < count($result[$k]); $i++)
        {
            if($result[$k][$i]['Ville'] != $country)
            {
                unset($result[$k][$i]);
            }
        }
    }

    if(!empty($genre)){
        for($i = 0; $i < count($result[$k]); $i++)
        {
            if($result[$k][$i]['Genre'] != $genre)
            {
                unset($result[$k][$i]);
            }
        }
    }
}




$myJSON = json_encode($result);

print_r($myJSON);


