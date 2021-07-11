<?php
    require_once '../models/dbConnect.php';
    session_start();

    $connexion = new dbConnect;
    $db = $connexion->getDB();

    if (isset($_POST['emailPHP']) && isset($_POST['passwordPHP']))
    {
        $email = securityValue($_POST['emailPHP']);
        $mdp = securityValue($_POST['passwordPHP']);

//        AND password = '$mdp'

        $sql = "
                    SELECT *
                    FROM users
                    WHERE Email = '$email'
                    
               ";

        $data = $db->prepare($sql);
        $data->execute();
        $result = $data->fetch();
        $count = $data->rowCount();
        if($count > 0)
        {
            $hash = $result['Password'];
            if(password_verify($mdp, $hash))
            {
                $_SESSION['id'] = $result['id'];
                $_SESSION['Email'] = $result['Email'];
                $_SESSION['Nom'] = $result['Nom'];
                $_SESSION['Prénom'] = $result['Prénom'];
                $_SESSION['Genre'] = $result['Genre'];
                $_SESSION['Loisir'] = $result['Loisir'];
                $_SESSION['Date de naissance'] = $result['Date de naissance'];
                exit("connexion success");
            }

        }

        else
        {
            print 'pas de ligne dans la BDD';
        }

    }

    function securityValue($value)
    {
        $value = trim($value);
        $value = htmlspecialchars($value);
        $value = htmlspecialchars_decode($value);

        return $value;
    }

