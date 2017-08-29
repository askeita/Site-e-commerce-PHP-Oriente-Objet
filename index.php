<?php
session_start(); // Démarrage de la session
require_once "php/config.php";  // chargement du fichier config
/* $valeur = preg_split("^{*}/[0-9]+$", $_SERVER["REQUEST_URI"]);  // en utilisant le regexp, on demande de 
             //   créer un array à chaque fois qu'on rencontre un slash */ 
//var_dump($valeur); die();

/*
    Retrieve the last element in the URL and modify the URL
*/

function recoveryLastElemToUrl() {
    $statements = preg_split("(/)", $_SERVER["REQUEST_URI"]);   // Conversion chaine de caractères en tableau par Regex
    $nbElem = sizeof(preg_split("(/)", FOLDER));
//    echo $nbElem; die();
    $id = (sizeof($statements) > $nbElem) ? $statements[$nbElem] : 0;   // Ternaire  
    unset($statements[$nbElem]);
    /*
        * Seconde méthode *
        $id = (sizeof($statements) > NBSEPARATOR) ? $statements[$NBSEPARATOR] : 0;   // Ternaire  
            unset($statements[NBSEPARATOR]);
    */ 
    $_SERVER["REQUEST_URI"] = implode("/", $statements); /* fusion des chaînes de caractères pour créer le chemin.
                    Redefinition de la variable. */
    return $id;
}

$id = recoveryLastElemToUrl(); // Appel de la fonction
//echo $id; die();

// $keywords = preg_split("\[0-9]{1,3}", "rgf3g g5erg 0");
// Recuperation du chemin ( de l'url apres le nom de domaine)
//echo $_SERVER["REQUEST_URI"];die(); // Mike/php-object-webforce3/
//if($_POST) {
// Codage des routes. Vérification des méthodes utilisées
if($_SERVER["REQUEST_METHOD"] == "POST") { // on détermine la méthode. Si la méthode est POST:
//    echo $_GET["page"]; die();
/*     if(!isset($_GET["page"])) { // Vérification que la route est bien spécifiée
        header("Location: http://localhost/alsaleh_keita/Git/php-object-webforce3/404");
    } */

    // Test l'existence de la route
//    switch($_GET["page"]) {
    switch($_SERVER["REQUEST_URI"]){
//        case "user-register":   // chargement de la Class et lancement de la méthode
        case FOLDER."user-register": // Chargement de la Class et lancement de la methode
            require "php/Controller/UsersController.php"; // charge le fichier PHP
            $usersController = new UsersController(); // on instancie le contrôleur
            $usersController->addUser(); // Lancemenent de la méthode; on détermine la fonction.
            break;
        
        case FOLDER."single": // Chargement de la Class et lancement de la methode
            require "php/Controller/ApiController.php"; // charge le fichier PHP
            $apiController = new ApiController(); // on instancie le contrôleur
            $apiController->detailItem((int) $id); // on détermine la fonction. on caste $id. 
            break;

        case FOLDER."shop-list": // Chargement de la Class et lancement de la methode
            require "php/Controller/ApiController.php"; // charge le fichier PHP
            $apiController = new ApiController(); // on instancie le contrôleur
            $apiController->searchItems(); // on détermine la fonction. on caste $id. 
            break;
			
            default: // redirection vers la route 404
            header("Location: ".HOST.FOLDER."404");
    }
/*     if($_POST["type"] == "register") {
        require "UsersController.php"; // charge le fichier PHP
        unset($_POST["type"]);
        $test = new UsersController();
//        echo $test -> addUser();
        $redirect = $test -> addUser();
        if($redirect == -1)
            header("Location: http://localhost/alsaleh_keita/Git/php-object-webforce3/404.html");
        else 
            header("Location:http://localhost/alsaleh_keita/Git/php-object-webforce3/index.html");
    }*/
} elseif($_SERVER["REQUEST_METHOD"] == "GET")  {
/*     if(!isset($_GET["page"])) {
        header("Location: http://localhost/alsaleh_keita/Git/php-object-webforce3/404");
    } */

//    echo $_SERVER["REQUEST_URI"]."<br>"; 
//    echo FOLDER."404"; die();

//    switch($_GET["page"]) {
    switch($_SERVER["REQUEST_URI"]){
//        case "user-register":
//        case "home":
        case FOLDER:
            require "php/Controller/HomeController.php";
            $home = new HomeController();
            $home->home();
//            include("home.php");
            break;

        case FOLDER."logout":
            require "php/Controller/UsersController.php";
            $usersController = new UsersController();
            $usersController->logClientOut();
            break;

        case FOLDER."single": 
            require "php/Controller/ShopController.php";
            $shop = new ShopController();
            $shop->single((int)$id);
            break;

		case FOLDER."shop-list": 
            require "php/Controller/ShopController.php";
            $shop = new ShopController();
            $shop->shopListView(); // lancement de la méthode POO
            break;
			
//        case "404":
        case FOLDER."404":
            require("php/Controller/Controller.php");
//			$controller = new Controller(); // Création d'une instance 
           Controller::show_404();
		   break;

        default:
            header("Location: ".HOST.FOLDER."404"); // lancement de la page 404
    }
}

