<?php
require "Controller.php";
class ApiController extends Controller {

	public function __construct() {
		parent::__construct();
	}
	
    public function detailItem($id) {
/* normalement on doit utiliser une méthode en GET, mais pour faire du REST API, on doit 
               utiliser du POST */
//        require "php/Model/ItemsModel.php";		 /* charger le fichier PHP. 
//                Note : Pour les photos lancer "PhotosModel.php" */
//        $dbItem = new ItemsModel();
//        $picturesItem = $dbItem -> listenerPicturesItem($id);
 //       $reviewsItem =  $dbItem -> listenerReviewsItem($id);
		
		$picturesItem = $this->itemsModel->listenerPicturesItem($id);
        $reviewsItem =  $this->itemsModel->listenerReviewsItem($id);
		
//        echo json_encode($pictureItem); // affiche tableau PHP en objet JavaScript
        echo json_encode(array("pictures"=>$picturesItem, "reviews"=>$reviewsItem));
    }
	
	public function searchItems() {
		$sql = "";
		$search = false;
		
		if(isset($_POST["price"])){ // $_POST["price"] = valeur1 and valeur2
			$sql .= "BETWEEN ".$_POST["price"]." AND ";
			$search = true;
		}
		if(isset($_POST["categorie"])){	// $_POST["categorie"] = valeur1 and valeur2
			$sql .= " categories_idcategories = ".$_POST["categorie"]." AND ";
		}
		
		$sql = substr($sql, 0, -4);
//		die($sql);
		
		if($search == false) // si aucun filtre n'est demandé
			$sql = 1;
		
		$items = $this->itemsModel->select("*", "items", $sql);
		
		echo json_encode($items);
    }
	
}

?>