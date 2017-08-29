<?php
//require "crud.php";
require "Model.php";

//class Items extends USERS {
//class Items extends CRUD {
class ItemsModel extends Model {
// Variables globales

// Fonctions construct 
    function __construct() {
        parent::__construct();
    }

// Exercice 1 : Ecrire la fonction pour ajouter un item
    public function addItem($item = array()) {
		if(!isset($item['libelle'])) {  // nom de la variable et pas celui de la table ! 
			return 0; 
		}
		elseif(!isset($item['description'])) {
			return 0; 
		}
		elseif(!isset($item['code_item'])) {
			return 0;
        }
        elseif(!isset($item['stocks'])) {
			return 0; 
		}
		elseif(!isset($item['availabity'])) {
			return 0; 
		}
		elseif(!isset($item['price'])) {
			return 0;
        }
        elseif(!isset($item['categories_idcategories'])) {
			return 0; 
		}
//        $item2 = $this -> insert($item, "items");
	
// Exercice 1 - Correction:
		$item['code_item'] = $this -> randomByAlphNum("Items");
		return $this -> insert($item, "items");
	}

// Exercice 2 : Ecrire la fonction pour modifier un item
    public function updateItem($itemData=array()) {

        // Exercice 2 - CORRECTION :       
        if(!isset($itemData['iditems'])) {
            return 0;
        }

        // if(!isset($itemData['libelle'])) {  
		// 	return 0; 
		// }
		// elseif(!isset($itemData['description'])) {
		// 	return 0; 
		// }
		// elseif(!isset($itemData['code_item'])) {
		// 	return 0;
        // }
        // elseif(!isset($itemData['stocks'])) {
		// 	return 0; 
		// }
		// elseif(!isset($itemData['availabity'])) {
		// 	return 0; 
		// }
		// elseif(!isset($itemData['price'])) {
		// 	return 0;
        // }
        // elseif(!isset($itemData['categories_idcategories'])) {
		// 	return 0; 
		// }
        // $item3 = $this -> update($champs, $where, "items");
    
		$idItem = array("iditems" => $itemData['iditems']);
        unset($itemData['iditems']);
        $this->update($itemData, $idItem, "items");
//        die("coucou!");
	}
		
// Exercice 3 : Ecrire la fonction pour supprimer un item.
	public function deleteItem($item = array()) {
		if(!isset($item['iditems'])){
			return 0;
		}
/* 		if(!isset($item['libelle'])) {
			return 0; 
		}
		elseif(!isset($item['description'])) {
			return 0; 
		}
		elseif(!isset($item['code_item'])) {
			return 0;
        }
        elseif(!isset($item['stocks'])) {
			return 0; 
		}
		elseif(!isset($item['availabity'])) {
			return 0; 
		}
		elseif(!isset($item['price'])) {
			return 0;
        }
        elseif(!isset($item['categories_idcategories'])) {
			return 0; 
		} */
//		$item4 = $this -> delete($item, "items");
		
//		return $this -> delete($item, "items");
		return $this -> select("note, commentaire, CONCAT(firstname, ' ', lastname) AS username", "reviews, clients", 
		"items_iditems = $id AND clients_idclients = idclients");
//		die("coucou!");
    }
	
// Exercice 4 : Ecrire la fonction pour ajouter un item à une commande.
    public function addItemToOrder($orderId, $itemId,$qte) {
/* 		if(!isset($item['orders_idorders'])) {  // nom de la variable et pas celui de la table ! 
			return 0; 
		}
		elseif(!isset($item['items_iditems'])) {
			return 0; 
		}
		elseif(!isset($item['qte'])) {
			return 0;
        }
        elseif(!isset($item['price_final'])) {
			return 0; 
		} */
		if(!is_int($orderId)) {
			return 0;
		}
		elseif(!is_int($itemId)) {
			return 0;
		}
//		$item5 = $this -> insert($item, "orders_has_items");

//	Exercice 4 - Correction :
//		die($price = $this -> select("price", "items", array("iditems" => $itemId)));
		$price = $this -> select("price", "items", array("iditems" => $itemId));
		$priceTotal = $price[0]["price"] * $qte;// english notation without thousands separator
		$priceTotal = number_format($priceTotal, 2, '.', '');
		settype($priceTotal, "float");
		$idFavorite = $this -> insert(array("orders_idorders" => $orderId, "items_iditems" => $itemId, "qte" => $qte, 
			"price_final" => $priceTotal), "orders_has_items");
//		die("coucou!");
    }

// Exercice 5 : Ecrire la fonction pour supprimer un item à une commande.

// Exercice 6 : Ecrire la fonction pour l'ajout / la suppression d'une catégorie item.

// Exercice 7 : Ecrire la fonction pour afficher la liste des images (url) et de l'item.

// Exercice 8 : Ecrire la fonction pour afficher la liste des types de l'item.

 	public function listenerItems($nbItem = 8) {
		if(!is_int($nbItem)){
			return -1;
		}
		return $this -> select("i.*, p.url", "`pictures` p, items i", "p.items_iditems = i.iditems 
		GROUP BY i.iditems LIMIT " . $nbItem);
//		die("coucou!");
	}
	
	public function listenerPicturesItem($id) {
		if(!is_int($id)) {
			return -1;
		}
		return $this -> select("url", "pictures", array("items_iditems" => $id));
	}

	public function listenerItem($id) {
		if(!is_int($id)){
			return -1;
		}		
		return $this -> select(
//			"i.*, c.name as categorie, p.url, AVG(r.note) as reviewsMoyen", // SELECT //...	// on n'a plus besoin d'une partie de ce code car on utilise l'AJAX maintenant.
			"i.*, c.name as categorie",
//			"`items` i, categories c, pictures p, reviews r",	// FROM ...
			"`items` i, categories c",	
//			"i.categories_idcategories = c.idcategories AND i.iditems = p.items_iditems 
//				AND r.items_iditems = i.iditems AND i.iditems = ". $id ." GROUP BY i.iditems"	// WHERE ... AND ... GROUP ... BY ...
			"i.categories_idcategories = c.idcategories AND i.iditems = " . $id . " GROUP BY i.iditems"
		);
	}

	public function listenerReviewsItem($id) {
		if(!is_int($id)) {
			return -1;
		}
		return $this -> select("*", "reviews", array("items_iditems" => $id));
	}
	
	/* **************** CategorieModel ******************** */
	public function listenerCategories() {
		return $this->select("name", "categories");	// on demande tous les names de la table categorie 
	}
	
}

/*    $test = new ItemsModel();
var_dump($test -> listenerItems());   */
/* $test = new Items();
$test -> addItemToOrder(10, 9, 12); */
//sleep(10);

/* 
--- Phase de tests ---
$id = $test -> addItem(array('libelle' => "parfum", 'description' => "Beau parfum", 'code_item' => 242435, 'stocks' => 12, 'availabity' => 1, 
    'price' => 50, 'categories_idcategories' => 1));
$test -> updateItem(array("iditems"=>7, "libelle"=>'test un'));
$test -> updateItem(array("iditems" => 9, "libelle" => "Café", "description" => "Arabica"));
$test -> deleteItem(array("iditems" =>10));

*/

?>