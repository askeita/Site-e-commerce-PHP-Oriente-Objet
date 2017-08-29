<?php
require "Model.php";		 // charger le fichier PHP
//class Users extends CRUD { // CreateReadUpdateDelete
class UsersModel extends Model { // CreateReadUpdateDelete	
// Variables globales
	// private $client;
	// private $password;
	// private $delivery_address;
	// private $favorite_items;
	// private $orders;

	// private $db;
	// private $pdo; 

	function __construct() {
		parent::__construct();
//		echo $this -> database;
// 		$this -> $db = new CRUD("localhost", "root", "", "myshop");

// 		$this -> host = $host;
// 		$this -> client = $client;
// 		$this -> password = $password;
// 		$this -> database = $database;
// 		$this -> pdo = new PDO('mysql:host=' . $this -> host . '; dbname=' . $this -> database, $this -> client, 
// 		$this -> password, array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
// 		$this -> password, array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
	}
	
// Exercice 1 : Ecrire la fonction pour ajouter un utilisateur
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

// Exercice 2 : Ecrire la fonction pour ajouter un item favori
	public function addFavorite($userId, $itemId){
//		$this -> insert($item, "clients_has_items");
		
		if(!is_int($userId)){
			return 0; 
		}
		elseif(!is_int($itemId)){
			return 0; 
		}
		
		$idFavorite = $this -> insert(array("clients_idclients" => $userId, "items_iditems" => $itemId), "clients_has_items");
	}

//
	public function listenerClientsByEmail($email){
		$user = $this -> select("*", "clients", array("email" => $email));
		return $user;
		}
	
// Exercice 3 : Ecrire la fonction permettant d'écrire la liste d'items favoris
	public function listenerFavorite($id){

		if(!is_int($id)){
			return 0; 
		}

		$myFavorite = $this -> select("*", "listenerFavorite", array("idclients" => $id));
		var_dump($myFavorite);
	}

// Exercice 4 : Ecrire la fonction permettant d'ajouter une adresse de livraison
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
		$idDelivery = $this -> insert($delivery, "delivery");

		// $idAddress = $this -> insert(array("street" => $street, "city"=>$city, "country"=>$country));
		// var_dump($idAddress);	
	}

// Exercice 5 : Ecrire la fonction permettant d'obtenir la liste des adresses de livraison
	public function listenerDelivery($userId){
			if(!is_int($userId)){
				return 0; 
			}
			if($type == null) 
				$myDelivery = $this -> select("*", "delivery", array("clients_idclients" => $userId));
			else 
				$myDelivery = $this -> select("*", "delivery", array("clients_idclients" => $userId, "type"=>$type));			
			var_dump($myDelivery);
	}

// Exercice 6 : Ecrire la fonction permettant d'ajouter une adresse de livraison
	public function addOrder($userId, $deliveryId) {
		if(!is_int($userId)) {
			return 0; 
		}
		elseif(!is_int($deliveryId)) {
			return 0; 
		}
		// if(!isset($order['num_order'])) {
		// 	return 0;
		// }
		$order = array('num_order' => $this -> randomByAlphNum());
		$order["clients_idclients"] = $userId;
		$order["delivery_iddelivery"] = $deliveryId;
		$idorder = $this -> insert($order, "orders");
		// delivery["clients_idclients"] = $userId;
		// $idDelivery = $this -> insert($delivery, "delivery");
	}

// Exercice 7 : Ecrire la fonction permettant d'obtenir la liste des commandes
	public function listenerOrder($userId, $type=null) {
		if(!is_int($userId)) {
			return 0;
		}
		if($dateOrder == null)
			$myOrders = $this -> select("*", "orders", array("clients_idclients" => $userId));
		else 
			$myOrders = $this -> select("*", "orders", array("clients_idclients" => $userId, "date_order" => $dateOrder));
		
		var_dump($myOrders);
	}

// Exercice 8 : 

}

// $test = new UsersModel();
//$test -> addOrder(1, 1);

// Exercice 3 : Requête SQL affichant la liste des favoris
// SELECT 
// 	i.*, c.idclients 
// FROM 
// 	`items` i,
// 	clients c, 
// 	clients_has_items chi
// WHERE 
// 	chi.items_iditems = `iditems` AND chi.clients_idclients = c.idclients AND c.idclients = 1;

/* 
--- Phase de tests ---
$test -> addUser(array('firstname' => "Mike", 'lastname' => "Sylvestre", 'email' => "Mike@Mike.Mike", 'password' => "Mike"));
$test -> addFavorite(array('clients_idclients' => , 'items_iditems' => ));
$test -> addFavorite(1,2);
$test -> listenerFavorite(1);
$test -> addAddress();
*/

?>