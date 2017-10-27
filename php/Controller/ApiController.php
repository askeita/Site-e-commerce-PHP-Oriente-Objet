<?php
require "Controller.php";
class ApiController extends Controller {    // loads the PHP file

    public function __construct() {
            parent::__construct();
    }
	
    public function detailItem($id) {
		
	$picturesItem = $this->itemsModel->listenerPicturesItem($id);
        $reviewsItem =  $this->itemsModel->listenerReviewsItem($id);
        echo json_encode(array("pictures" => $picturesItem, "reviews" => $reviewsItem));
    }
	
    public function searchItems() {
        $sql = "";
        $search = false;

        if(isset($_POST["price"])){ // $_POST["price"] = valeur1 and valeur2
            $sql .= " price BETWEEN " . $_POST["price"] . " AND ";
            $search = true;
        }
        if(isset($_POST["categorie"])){	// $_POST["categorie"] = valeur1 and valeur2
            $sql .= " categories_idcategories = " . $_POST["categorie"] . " AND ";
            $search = true;
        }

        if($search == false) // if no filter is asked
            $sql = 1;
        else
            $sql .= " iditems = items_iditems GROUP BY iditems";
            
        $items = $this->itemsModel->select("i.*, p.url", "items i, pictures p", $sql);
        echo json_encode($items);
    }
}

?>