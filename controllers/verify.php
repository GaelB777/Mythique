<?php
require_once "../models/dbConnect.php";

//$getConnexion = new dbConnect;
//$db = $getConnexion->getDB();

if (isset($_POST['inscription'])) {
    $obj = new Users($_POST['check_name'], $_POST['check_prenom'], $_POST['check_birthday'],
        $_POST['check_gender'], $_POST['check_country'], $_POST['check_email'], $_POST['check_mdp'], $_POST['check_loisir']);
//    $obj->checkBirthday();

}

class Users
{

    private $name;
    private $secondName;
    private $birthday;
    private $gender;
    private $country;
    private $email;
    private $mdp;
    private $loisir;


    public function __construct($name, $secondName, $birthday, $gender, $country, $email, $mdp, $loisir)
    {
        $this->name = $name;
        $this->secondName = $secondName;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->country = $country;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->loisir = $loisir;
        $this->checkName();
    }

    public function checkName()
    {
        $this->checkSize($this->name);
        $this->checkSecondName();
    }

    public function checkSecondName()
    {
        $this->checkSize($this->secondName);
        $this->checkBirthday();
    }

    public function checkBirthday()
    {
        $date = $this->birthday;
        $date = substr($date, 0, 4);
        $currentDate = date("Y");

        $resultDate = $currentDate - $date;
        if ($resultDate >= 18) {
            $this->checkGender();
        } else {
            exit('pasmajeur');
        }

        ini_set('xdebug.default_enable', false);
        ini_set('html_errors', false);
    }

    public function checkGender()
    {
        if ($this->gender !== "") {
            $this->checkCountry();
        } else {
            exit('pasrempli');
        }
    }

    public function checkCountry()
    {
        $this->securityValue($this->country);
        $this->countryExist($this->country);
        $this->checkEmail();
    }

    public function checkEmail()
    {
        $email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $emailSql = new dbConnect();
            $db = $emailSql->getDB();

            $sql = "
                                SELECT *
                                FROM users
                                WHERE email = '$this->email'
                           ";
            $data = $db->prepare($sql);
            $data->execute();
            $result = $data->fetch();

            if (!empty($result)) {
                exit('emailinvalid');
            } else {
                $this->checkPassword();
            }
        } else {
            exit('emailinvalid');
        }
    }

    public function checkPassword()
    {
        $uppercase = preg_match("#[A-Z]#", $this->mdp);
        $lowercase = preg_match("#[a-z]#", $this->mdp);
        $number = preg_match("#[0-9]#", $this->mdp);

        if (!$uppercase || !$lowercase || !$number || strlen($this->mdp) < 8) {

            exit('mdpincorrect');
        } else {
            $this->checkLoisir();
        }

    }

    public function checkLoisir()
    {
        $this->checkSize($this->loisir);
        $this->insert();
    }


    // SECONDARY VERIFY FUNCTION //


    public function countryExist($country)
    {
        $countryExist = new dbConnect();
        $db = $countryExist->getDB();
//        $ville = $_POST['check_country'];

        $sql = "SELECT *
                FROM villes
                WHERE ville_nom_simple = '$country' OR ville_nom_reel = '$country'";
        $data = $db->prepare($sql);
        $data->execute();
        $count = $data->rowCount();

        if ($count === 0) {
            exit('la ville n\'existe pas.');
        }

    }


    public function checkSize($value)
    {
        if (!empty($value)) {
            $name = $this->securityValue($value);

            if (strlen($name) < 3 || strlen($name) > 16) {
                exit('nameSizeFalse');
            } else {

                if (is_numeric($name[0])) {
                    exit("NameOneCharacterNumber");
                }

            }

        }

    }

    public function securityValue($value)
    {
        $value = trim($value);
        $value = htmlspecialchars($value);
        $value = htmlspecialchars_decode($value);
        $value = preg_replace('#[^a-z0-9]#i', '', $value);
        return $value;
    }


    public function insert()
    {
        $password =password_hash($this->mdp, PASSWORD_DEFAULT);
        $newUser = new dbConnect();
        $db = $newUser->getDB();


        $sql = "
                                    INSERT INTO users
                                    VALUES ('','$this->name', '$this->secondName', '$this->gender', '$this->country', '$this->email', '$password', '$this->loisir', '$this->birthday')
                               ";
        $data = $db->prepare($sql);
        $data->execute();

        exit('new user');
    }

}