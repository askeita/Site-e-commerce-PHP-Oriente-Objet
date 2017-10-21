<?php
class Model { 
// Variables globales
	private $host;
	private $user;
	private $password;
	public $database;
	protected $pdo;

	function __construct($host = "", $user = "", $password = "", $database = "") {
//		require_once "config.php";
		$this -> host = DB_HOST;
		$this -> user = DB_USER;
		$this -> password = DB_PASSWORD;
		$this -> database = DB_NAME;
		$this -> pdo = new PDO('mysql:host=' . $this -> host . '; dbname=' . $this -> database, $this -> user, 
			$this -> password, array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
	}

	public function select($champs = '*', $table = '', $where=1) {	// paramètre optionnel tout à la fin
		$theChamps = $this -> arrayToString($champs);
		$theWhere = $this -> arrayToString($where, "update");

		try {
			$result = $this -> pdo -> query("SELECT $theChamps FROM $table WHERE $theWhere");
			return $result -> fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo "Votre traitement n'a pas abouti \n";
		}
	}

	public function insert($champs, $table='') {

		$theChamps ="";
		$theNewChamps = array();
		$point =""; 
		
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

	public function delete($champs, $table='') {
		$theChamps = $this -> arrayToString($champs, 3);
		echo $theChamps;

		try {
			$result = $this -> pdo -> prepare("DELETE FROM `$table` WHERE ($theChamps) ");
			$result -> execute();
		} catch (Exception $e) {
			echo "Votre traitement n'a pas abouti \n";
		} 
	}

	public function update($champs, $where, $table='') {
		$theChamps = $this -> arrayToString($champs, 4);
		$where = $this -> arrayToString($where, 3);

		try {
			$result = $this ->pdo -> prepare("UPDATE `$table` SET $theChamps WHERE $where");
			$result -> execute();
		} catch (Exception $e) {
			echo "Votre traitement n'a pas abouti \n";
		} 
		die();
	}

	private function arrayToString($champs = "", $type=1) {
		$theChamps = "";

		if (is_array($champs)) {	// Cas $champs est un tableau
			if ($type == 1)
				foreach($champs as $value)
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

	protected function randomByAlphNum($key="User") {
		return "#" . substr(md5(uniqid($key, true)), 10);
	}
}

?>
