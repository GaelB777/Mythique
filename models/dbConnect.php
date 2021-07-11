<?php

class dbConnect{

private $db_host;
private $db_name;
private $db_user;
private $db_pass;
private $bdd;



public function __construct($db_host = 'localhost', $db_name = 'meetic', $db_user ='root', $db_pass = '')
{
$this->db_host = $db_host;
$this->db_name = $db_name;
$this->db_user = $db_user;
$this->db_pass = $db_pass;

    try
    {
        $this->bdd = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_pass,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }
    catch(PDOException $e)
    {
        echo'Échec de la connexion :' . $e->getMessage();
    }

}


public function getDB()
{

    return $this->bdd;

}



}