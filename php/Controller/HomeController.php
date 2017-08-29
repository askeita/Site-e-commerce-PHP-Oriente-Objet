<?php
require "Controller.php";
class HomeController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	/*
	*	Appeler au lancement de la route par défaut (la route /)
	*/
	
//    public function itemsHome() {
    public function home() {
//		var_dump($this->categories); die();
//        require "php/Model/ItemsModel.php";		 // charger le fichier PHP
//        $dbItem = new ItemsModel();
//        $itemsHome = $dbItem -> listenerItems();
		$itemsHome = $this->itemsModel->listenerItems();	// Récupération des items de la BDD (les 8 premiers items).
        include("home.php");	// Chargement de la view (page home.php)
    }

}

?>