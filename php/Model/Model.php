<?php
//echo "Mike le roi 2";
//class CRUD { // Create Read Update Delete
class Model { 
// Variables globales
	private $host;
	private $user;
	private $password;
	public $database;
//	public $table;	//	On n'a pas besoin d'une variable globale table
	// private $pdo; 
	protected $pdo;

	function __construct($host = "", $user = "", $password = "", $database = "") {
//		require_once "config.php";
		$this -> host = DB_HOST;
		$this -> user = DB_USER;
		$this -> password = DB_PASSWORD;
		$this -> database = DB_NAME;
		$this -> pdo = new PDO('mysql:host=' . $this -> host . '; dbname=' . $this -> database, $this -> user, 
//			$this -> password, array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
			$this -> password, array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
	}

	public function select($champs = '*', $table = '', $where=1) {	// paramètre optionnel tout à la fin
		
//		$theChamps = "";
	/* 	echo "<br>champ 1 :".$champs ;
		echo "<br>champ 1 :".  $table ;
		echo "<br>champ 1 :".$where ;
		die('fin'); */
		$theChamps = $this -> arrayToString($champs);
		$theWhere = $this -> arrayToString($where, "update");

/*		if (is_array($champs)) {	// Cas $champs est un tableau
			foreach($champs as $value)
				$theChamps = $theChamps . $value . ','; 
			$theChamps = substr($theChamps, 0, -1); 
		} else 	// Cas $champs est une variable
				$theChamps = $champs;*/
//		echo $theChamps;
//		$data = $result -> fetchAll(PDO::FETCH_ASSOC);
/*		return $result -> fetchAll(PDO::FETCH_ASSOC);*/

//		var_dump($data);// echo '<br />';
//		die();

		try {
			$result = $this -> pdo -> query("SELECT $theChamps FROM $table WHERE $theWhere");
			return $result -> fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo "Votre traitement n'a pas abouti \n";
		}
	}

/*	public function update($table = '', $champs = '*') {
		if (is_array($champs)) {
			foreach($champs as $value)
				$theChamps = $theChamps . $value . ',';
			$theChamps = substr($theChamps, 0, -1);
		} else 
				$theChamps = $champs;
//		echo $theChamps;
		$result = $this -> pdo -> query("UPDATE $theChamps FROM $table");
	}*/

//*********************************************************************************
// EXERCICE 1 : écrire la fonction pour l'insert dans le CRUD
/*	public function insert($table = '', $champs = '*', $champsInseres = '*') {
		
		$theChamps = "";
		$theChampsIns = "";

		if (is_array($champs)) {
			foreach($champs as $value)
				$theChamps = $theChamps . $value . ',';
			$theChamps = substr($theChamps, 0, -1);
		} else 
				$theChamps = $champs;

		if (is_array($champsInseres)) {
			foreach($champsInseres as $valuesInserees)
				$theChampsIns .= "'" . $valuesInserees . "'" . ',';
			$theChampsIns = substr($theChampsIns, 0, -1);
		} else 
				$theChampsIns = $champsInseres;
//			echo $theChamps;
//			echo ('INSERT INTO ' . $table . '(' . $theChamps . ')' . ' VALUES ' . '(' . $theChampsIns . ')');
		$result = $this -> pdo -> query('INSERT INTO ' . $table . '(' . $theChamps . ')' . ' VALUES ' . '(' . $theChampsIns . ')');
	}*/


// EXERCICE 1 - CORRECTION : 
	public function insert($champs, $table='') {

		$theChamps ="";
		$theNewChamps = array();
		$point =""; 
		
//		$theChamps = $this -> arrayToString($champs);
//		$theValue = $this -> arrayToString($value, 2);

//		var_dump($theChamps);
//		var_dump($theValue);

//		$result = $this -> pdo -> prepare("INSERT INTO `$table` ($theChamps) VALUES ($theValue) ");
//		$result -> execute();
//		echo $this -> pdo -> lastInsertId();
//		die();

		//Passer l'array $champs en string utilisable dans la requête/
		if (is_array($champs)) {
			foreach ($champs as $key => $value) {
				$theChamps .= trim($key).',';
				array_push($theNewChamps, trim($value));
				$point .= "?,";
			}
				$theChamps = substr($theChamps,0,-1);
				$point = substr($point,0,-1);
		} else
			$theChamps = $champs;
		try {
			$result = $this->pdo->prepare("INSERT INTO $table ($theChamps) VALUES ($point)");
			$result->execute($theNewChamps);

			return $this -> pdo -> lastInsertId();
			} catch (Exception $e) {
				echo $e -> getMessage();
				return -1;
			} 
	}


//*********************************************************************************
// EXERCICE 2 : écrire la fonction pour le delete dans le CRUD
/*	public function delete($table='', $champs, $conditions) {

		$theChamps = $this -> arrayToString($champs);
		$theValue = $this -> arrayToString($conditions, "delete");

//		var_dump($theChamps);
//		var_dump($theValue);

		$result = $this -> pdo -> prepare("DELETE FROM `$table` ($theChamps) WHERE ($conditions) AND ($conditions)");
		$result  -> execute();
		echo $this -> pdo -> lastInsertId();

/*		try {
			$result = $this -> pdo -> prepare("INSERT INTO `$table` ($theChamps) VALUES ($theValue) ");
			$result -> execute();
		} catch (Exception $e) {
			echo 'Mike -> Exception reçue : ', $e -> getMessage(), "\n";
		} 
		die();
	}*/


// EXERCICE 2 : correction
	public function delete($champs, $table='') {
		$theChamps = $this -> arrayToString($champs, 3);
		echo $theChamps;

		try {
			$result = $this -> pdo -> prepare("DELETE FROM `$table` WHERE ($theChamps) ");
			$result -> execute();
		} catch (Exception $e) {
			echo "Votre traitement n'a pas abouti \n";
		} 
//		die();
	}

// EXERCICE 3
	public function update($champs, $where, $table='') {
		$theChamps = $this -> arrayToString($champs, 4);
		$where = $this -> arrayToString($where, 3);

//		$result = $this -> pdo -> prepare("DELETE FROM `$table` WHERE ($theChamps) ");
//		$result -> execute();
//		echo $this -> pdo -> lastInsertId();
//		die();

		try {
			$result = $this ->pdo -> prepare("UPDATE `$table` SET $theChamps WHERE $where");
			$result -> execute();
		} catch (Exception $e) {
			echo "Votre traitement n'a pas abouti \n";
		} 
		die();
	}

//*********************************************************************************
// EXERCICE 1 - EXERCICE 2 - CORRECTION INSERT : 
	private function arrayToString($champs = "", $type=1) {
		$theChamps = "";

		if (is_array($champs)) {	// Cas $champs est un tableau
			if ($type == 1)
				foreach($champs as $value)
//					$theChamps = $theChamps . "'" . $value . "',"; 
					$theChamps = $theChamps . $value . ","; 
			elseif ($type == 3) {
				foreach ($champs as $key => $value)
					$theChamps = $theChamps . $key . " = '" . $value . "' AND "; 
				$theChamps = substr($theChamps, 0, -4); // "-4" à cause des 4 caractères du "AND"
			} elseif ($type == 4) {
				foreach ($champs as $key => $value)
					$theChamps = $theChamps . $key . " = '" . $value . "',"; 
			} else 	// Cas $champs est une variable
				foreach ($champs as $value)
					$theChamps = $theChamps . "'" . $value . "',";
			$theChamps = substr($theChamps, 0, -1);
		} else // cas $champs est une variable - OPTION
				$theChamps = $champs;
		return $theChamps;
	}
//********************************************************************************
	protected function randomByAlphNum($key="User") {
		return "#" . substr(md5(uniqid($key, true)), 10);
	}
}


//$bd = new CRUD("localhost", "root", "", "mike-js");

// SELECT
//$bd -> select(array("nom", "prenom"), "users");
//echo "toto";

// INSERT
//$bd -> insert("users", array("nom", "prenom", "age", "poste"), array("LE COADIC", "Cheunn", "24", "informaticien"));
//$bd -> insert(array("nom, prenom"), array("Mike", "Mike"), "users");

// DELETE
//$bd->delete( array("prenom"=>"toto", "age"=>"25"), "users" );

// UPDATE


?>
