<?php
require "Controller.php";
class HomeController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
//    public function itemsHome() {
    public function home() {
//		var_dump($this->categories); die();
//        require "php/Model/ItemsModel.php";		 // charger le fichier PHP
//        $dbItem = new ItemsModel();
//        $itemsHome = $dbItem -> listenerItems();
		$itemsHome = $this->itemsModel->listenerItems();
        include("home.php");
    }

}

?>