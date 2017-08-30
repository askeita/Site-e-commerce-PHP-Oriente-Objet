<?php
//require "UsersModel.php";		 // charger le fichier PHP
// EXERCICE : Ecrire le controlleur correspondant au CRUD (model) - CORRECTION
require "Controller.php";
class UsersController extends Controller {  // CreateReadUpdateDelete
    
    public function addUser() {
        require "php/Model/UsersModel.php";
        $redirect = 0;  // définition de la variable de redirection
//        echo $this -> arrayIsEmpty(array("firstname" => " ", "lastname" => " ", "email" => " ", "password" => " "));
        $error = $this->arrayIsEmpty($_POST, array("firstname", "lastname", "email", "password")); /* script de vérification 
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
                $idUser = $dbUser->addUser($_POST);
//                echo $Iduser;
            }
        endif;
    
        if($redirect == -1)
            header("Location: " . HOST . FOLDER . "404");
        else {
            $_POST["idclients"] = $idUser;  // ajout d'un id dans notre array
            $this->clientAddSession($_POST);  // lancement de la méthode pour ajouter
            header("Location: " . HOST . FOLDER);
        }
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
