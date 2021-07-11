<?php

require_once 'models/dbConnect.php';

$result = [];

//j'obtiens la connection à la base de données :
$getLoisir = new dbConnect;
$db = $getLoisir->getDB();

//je lance ma requête :

$req = $db->prepare("SELECT * FROM hobbies");
$req->execute();
$row_all = $req -> fetchAll(); //Je récupère les lignes.
$i = 0;
//print_r($row_all);
while(!empty($row_all[$i])){
    $result[] = $row_all[$i][1]; //je remplis un tableau avec toutes mes lignes.
    $i++;
}