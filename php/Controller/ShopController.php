<?php
require "Controller.php";
class ShopController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
    public function single($id) {
		$itemHome = $this->itemsModel->listenerItem($id);
        if(sizeof($itemHome) != 1)			
            header("Location: " . HOST . FOLDER . "404");
        else {
			$itemsHome = $this->itemsModel->listenerItems();		
			require("shop-single.php");
			echo "<script>let idItem= " . $itemHome[0]["iditems"] . ";let typePage = 1;</script>";	// typePage permet de prendre en compte le nbre de requêtes Ajax
        }
    }
	
	public function shopListView() {
		$itemsHome = $this->itemsModel->listenerItems(); // accès à la liste des 8 items
		require("shop-list.php");
		echo "<script>let typePage = 2;</script>";
	}
}

?>