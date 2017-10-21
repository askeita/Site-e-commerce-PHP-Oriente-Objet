<?php
require "Model.php";

class UsersModel extends Model { // CreateReadUpdateDelete	

	function __construct() {
		parent::__construct();
	}
	
	public function addUser($user = array()){
		if(!isset($user['firstname'])){
			return 0; 
		}
		elseif(!isset($user['lastname'])){
			return 0; 
		}
		elseif(!isset($user['email'])){
			return 0;
		}
		elseif(!isset($user['password'])){
			return 0;
		}
		
		return $this -> insert($user, "clients");
	}

	public function addFavorite($userId, $itemId){		
		if(!is_int($userId)){
			return 0; 
		}
		elseif(!is_int($itemId)){
			return 0; 
		}
		
		$idFavorite = $this->insert(array("clients_idclients" => $userId, "items_iditems" => $itemId), "clients_has_items");
	}

	public function addDelivery($userId, $delivery) {
		if(!is_int($userId)) {
			return 0; 
		}
		if(!isset($delivery['street'])) {
			return 0; 
		}
		elseif(!isset($delivery['city'])) {
			return 0; 
		}
		elseif(!isset($delivery['country'])) {
			return 0;
		}
		$delivery["clients_idclients"] = $userId;
		$idDelivery = $this->insert($delivery, "delivery");
	}

	public function addOrder($userId, $deliveryId) {
		if(!is_int($userId)) {
			return 0; 
		}
		elseif(!is_int($deliveryId)) {
			return 0; 
		}

		$order = array('num_order' => $this->randomByAlphNum());
		$order["clients_idclients"] = $userId;
		$order["delivery_iddelivery"] = $deliveryId;
		$idOrder = $this->insert($order, "orders");
	}

	/********************** SELECT ************************/
	public function listenerClientsByEmail($email){
		$user = $this->select("*", "clients", array("email" => $email));
		return $user;
		}
	
	public function listenerFavorite($userId){
		if(!is_int($userId)){
			return 0; 
		}

		$myFavorite = $this->select("*", "listenerFavorite", array("idclients" => $userId));
		var_dump($myFavorite);
	}

	public function listenerDelivery($userId, $type = null){
			if(!is_int($userId)){
				return 0; 
			}
			if($type == null) 
				$myDelivery = $this->select("*", "delivery", array("clients_idclients" => $userId));
			else 
				$myDelivery = $this->select("*", "delivery", array("clients_idclients" => $userId, "type"=>$type));			
			var_dump($myDelivery);
	}

	public function listenerOrder($userId, $type=null) {
		if(!is_int($userId)) {
			return 0;
		}
		if($dateOrder == null)
			$myOrders = $this->select("*", "orders", array("clients_idclients" => $userId));
		else 
			$myOrders = $this->select("*", "orders", array("clients_idclients" => $userId, "date_order"=>$dateOrder));
		
		var_dump($myOrders);
	}
}

/*
--- Phase de tests ---
$test -> addUser(array('firstname' => "Mike", 'lastname' => "Sylvestre", 'email' => "Mike@Mike.Mike", 'password' => "Mike"));
$test -> addFavorite(array('clients_idclients' => , 'items_iditems' => ));
$test -> addFavorite(1,2);
$test -> listenerFavorite(1);
$test -> addAddress();
*/

?>