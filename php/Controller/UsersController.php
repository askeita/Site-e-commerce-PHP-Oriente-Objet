<?php
require "Controller.php";
class UsersController extends Controller {
    
    public function addUser() {
        require "php/Model/UsersModel.php"; // loads the PHP file
        $redirect = 0;  // definition of the redirection variable
        $error = $this->arrayIsEmpty($_POST, array("firstname", "lastname", "email", "password")); /* verification of mandatory fields in the form */
        if($error == -1)
            $redirect = -1;

        if($redirect != -1):
            $dbUser = new UsersModel();
            $user = $dbUser->listenerClientsByEmail($_POST['email']); // email to database

            if(count($user) >= 1) 
				$redirect = -1;

            if($redirect != -1) {
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); // cryptage du mdp.
				$idUser = $dbUser->addUser($_POST);
            }
        endif;
    
        if($redirect == -1)
            header("Location: " . HOST . FOLDER . "404");
        else {
            $_POST["idclients"] = $idUser;  // addition of an id in array
            $this->clientAddSession($_POST);  // launching the method for addition in session 
            header("Location: " . HOST . FOLDER);
        }
    }

    public function clientAddSession($user = array()) {
        if(!isset($user["idclients"])) {
            return -1;
        }
        unset($user["password"]); // suppression of password
        $_SESSION["user"] = $user;
    }

    public function logClientOut() {
        unset($_SESSION["user"]);
        header("Location: " . HOST . FOLDER);
    }

}

?>
