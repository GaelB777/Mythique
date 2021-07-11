<?php
require_once '../models/dbConnect.php';
$country = $_POST['autocompl'];
$tabcompletion = new dbConnect();
$db = $tabcompletion->getDB();

$country = $country.'%';

$sql = "SELECT ville_nom_reel
        FROM villes
        WHERE ville_nom_reel LIKE '$country'";

$data = $db->prepare($sql);
$data->execute();
$result = $data->fetchAll(PDO::FETCH_ASSOC);

$array = [];
$i = 0;

while (! empty($result[$i]))
{
    $array[] = $result[$i]['ville_nom_reel'];
    $i++;
}

echo (json_encode($array));


