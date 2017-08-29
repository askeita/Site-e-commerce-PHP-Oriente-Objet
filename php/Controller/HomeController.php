<?php
class HomeController {
//    public function itemsHome() {
    public function home() {
        require "php/Model/ItemsModel.php";		 // charger le fichier PHP
        $dbItem = new ItemsModel();
        $itemsHome = $dbItem -> listenerItems();
        include("home.php");
    }

}

?>