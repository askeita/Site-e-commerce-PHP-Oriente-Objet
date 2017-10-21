<?php
require "Model.php";	// loads the PHP file

class ItemsModel extends Model {
    function __construct() {
        parent::__construct();
    }

	/**
	 * Add item to database
	 * $item is array
	 * return id last item
	 */
	public function addItem($item = array()) {
		if(!isset($item['libelle'])) {   
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

		$item['code_item'] = $this->randomByAlphNum("Items");
		return $this->insert($item, "items");
	}

    public function updateItem($itemData) {
        if(!isset($itemData['iditems'])) {
            return 0;
        }
		$idItem = array("iditems" => $itemData['iditems']);
        unset($itemData['iditems']);
        $this->update($itemData, $idItem, "items");
	}
		
	public function deleteItem($item = array()) {
		if(!isset($item['iditems'])){
			return 0;
		}
		return $this->delete($item, "items");
    }
	

    public function addItemToOrder($orderId, $itemId,$qte) {
		if(!is_int($orderId)) {
			return 0;
		}
		elseif(!is_int($itemId)) {
			return 0;
		}

		$price = $this->select("price", "items", array("iditems" => $itemId));
		$priceTotal = $price[0]["price"] * $qte;
		$priceTotal = number_format($priceTotal, 2, '.', '');
		settype($priceTotal, "float");
		$idFavorite = $this->insert( array("orders_idorders"=>$orderId, "items_iditems"=>$itemId, "price_final"=>$priceTotal, "qte"=>$qte), "orders_has_items" );
    }

 	public function listenerItems($nbItem = 8) {
		if(!is_int($nbItem)){
			return -1;
		}
		return $this -> select("i.*, p.url", "`pictures` p, items i", "p.items_iditems = i.iditems 
		GROUP BY i.iditems LIMIT " . $nbItem);
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
		return $this->select(
			"i.*, c.name as categories", 
			"`items` i, categories c", "i.categories_idcategories = c.idcategories AND i.iditems = " . $id . " GROUP BY i.iditems"
		);
	}

	public function listenerItem2($id){
		if(!is_int($id)){
			return -1;
		}
		return $this->select("i.*, c.name as categories, p.url, AVG(r.note) as reviewsMoyen","items i, categories c, pictures p, reviews r", "i.`categories_idcategories` = c.idcategories AND i.iditems = p.items_iditems AND r.items_iditems = i.iditems AND i.iditems = ".$id." GROUP BY i.iditems");
	}	

	public function listenerReviewsItem($id) {
		if(!is_int($id)) {
			return -1;
		}

		return $this->select("note, commentaire, CONCAT(firstname, ' ' ,lastname) as username", "reviews, clients", "items_iditems = $id AND clients_idclients = idclients");
	}
	
	/* **************** Categorie Model ******************** */
	public function listenerCategories() {
		return $this->select("idcategories, name", "categories");	
	}
	
}

?>