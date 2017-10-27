<?php
class Controller {
	
    protected $categories;
    protected $itemsModel;

    public function __construct() { // loads the categories at the start of the session
        require "php/Model/ItemsModel.php";
        $this->itemsModel = new ItemsModel();
        $this->categories = $this->itemsModel->listenerCategories();
    }

    public function arrayIsEmpty($data = array(), $keyObligatory = array()) {   // $data = $_POST
        if(!is_array($data)) 
            return -1;

        $isOk = false;

        foreach($data as $key => $val) {    // parcours du tableau entier des données du $_POST
            foreach($keyObligatory as $valO)   // parcours de toutes les clés obligatoires
                if($valO == $key)
                    $isOk = true;
            if(!$isOk || empty(trim($val))) {
                return -1; 
                die();
            }
        }  

        return 1;
    }

    public static function show_404() {
            include("404.php");
    }

    public function __destruct(){
            
    }
}

 