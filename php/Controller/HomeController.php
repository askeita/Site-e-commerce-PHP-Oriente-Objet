<?php
require "Controller.php";
class HomeController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	/**
	* Call to launch the default route
	**/
    public function home() {
		$itemsHome = $this->itemsModel->listenerItems(); // Retrieval of the items from database ( by default the 8 first items)
		include("home.php"); // loads view (page home.php)
    }
}

?>