<?php
require "UsersModel.php";		 // charger le fichier PHP
// EXERCICE : Ecrire le controlleur correspondant au CRUD (model) - CORRECTION
class UsersController { // CreateReadUpdateDelete
    
    public function addUser() {
        require "php/Model/UsersModel.php";
        $redirect = 0;  // définition de la variable de redirection
//        echo $this -> arrayIsEmpty(array("firstname" => " ", "lastname" => " ", "email" => " ", "password" => " "));
        $error = $this -> arrayIsEmpty($_POST, array("firstname", "lastname", "email", "password")); /* script de vérification 
                               des champs obligatoires du formulaire */
//        var_dump($_POST);
        if($error == -1) 
            $redirect = -1; // cas où il y a une erreur
//            die("Error System");
        if($redirect != -1):
            $dbUser = new UsersModel();
            $user = $dbUser -> listenerClientsByEmail($_POST['email']); // email to database
//            var_dump($user);

            if(count($user) >= 1) 
    //            die("Error system");
//                return -1;
                $redirect = -1;

            if($redirect != -1) {
                $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT); // cryptage du mdp.
                $idUser = $dbUser -> addUser($_POST);
//                echo $Iduser;
            }
        endif;
    
        if($redirect == -1)
            header("Location: " . HOST . FOLDER . "404");
        else {
            $_POST["idclients"] = $idUser;  // ajout d'un id dans notre array
            $this -> clientAddSession($_POST);  // lancement de la méthode pour ajouter
            header("Location: " . HOST . FOLDER);
        }
    }

    public function arrayIsEmpty($data = array(), $keyObligatory = array()) {   // $data = $_POST
        if(!is_array($data)) 
            return -1;
        
        $isOk = false;

        foreach($data as $key => $val) {    // parcours du tableau entier des données du $_POST
            foreach($keyObligatory as $valO)   // parcours de toutes les clés obligatoires
                if($valO == $key)
                    $isOk = true;
            if(!$isOk || empty(trim($val)))
                return -1;
        }  

/*        if(isset($_POST)) {
            $reponse = array();
            $isNull = false;	// Vérification de l'existence des variables 
            $isOK = true;	// Vérification de l'état complet de notre API

             if (!isset($_POST['firstname'])) {
                $isNull = true;
                array_push($reponse, 'Le prénom n\'est pas reconnu!');
            }

            if (!isset($_POST['lastname'])) {
                $isNull = true;
                array_push($reponse, 'Le nom n\'est pas reconnu!');
            }

            if (!isset($_POST['email'])) {
                $isNull = true;
                array_push($response, 'L\'email n\'est pas reconnu!');
            }

            if (!isset($_POST['phone'])) {
                $isNull = true;
                array_push($response, 'Le téléphone n\'est pas reconnu!');
            }

            if (!isset($_POST['civility'])) {
                $isNull = true;
                array_push($response, 'La civilité n\'est pas reconnu!');
            }

            if (!isset($_POST['avatar'])) {
                $isNull = true;
                array_push($response, 'La civilité n\'est pas reconnu!');
            } */
        return 1;    
    }

    public function clientAddSession($user = array()) {  // ajout d'une session
        if(!isset($user["idclients"])) {
            return -1;
        }
        unset($user["password"]); // suppression du mot de passe
        $_SESSION["user"] = $user;
    }

    public function logClientOut() {
        unset($_SESSION["user"]);
        header("Location: ".HOST.FOLDER);
    }

}

/* $test = new UsersController();
$_POST = array("firstname" => "toto", "lastname" => "tata", "email" => "mdkmdk@sdjlkj.com", "password" => "qpqjqAZQ2");
$test -> addUser(); */


?>
