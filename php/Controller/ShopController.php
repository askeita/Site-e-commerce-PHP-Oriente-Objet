<?php
class ShopController {
//    public function itemsHome() {
    public function single($id) {
        require "php/Model/ItemsModel.php";		 // charger le fichier PHP
        $dbItem = new ItemsModel();
        $itemsHome = $dbItem -> listenerItem($id);

        if(sizeof($itemsHome) != 1)
            header("Location: ".HOST.FOLDER."404");
        else {
            $itemsHome = $dbItem->listenerItems();
			require("shop-single.php");
//            echo "<script>let idItem= " . $itemsHome[0]["iditems"] . ";let typePage = 1;</script>";
			echo "<script>let idItem= " . $itemHome[0]["iditems"] . ";let typePage = 1;</script>";
        }
    }
}

?>