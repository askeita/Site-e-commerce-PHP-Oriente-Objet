<?php
class ApiController {

    public function detailItem($id) {
/* normalement on doit utiliser une méthode en GET, mais pour faire du REST API, on doit 
               utiliser du POST */
        require "php/Model/ItemsModel.php";		 /* charger le fichier PHP. 
                Note : Pour les photos lancer "PhotosModel.php" */
        $dbItem = new ItemsModel();
        $picturesItem = $dbItem -> listenerPicturesItem($id);
        $reviewsItem =  $dbItem -> listenerReviewsItem($id);
//        echo json_encode($pictureItem); // affiche tableau PHP en objet JavaScript
        echo json_encode(array("pictures" => $picturesItem, "reviews" => $reviewsItem));
    }
}

?>