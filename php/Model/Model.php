<?php
class Model {	// Create Read Update Delete
// Global variables
	private $host;
	private $user;
	private $password;
	public $database;
	protected $pdo;

	function __construct($host = "", $user = "", $password = "", $database = "") {
		$this->host = DB_HOST;
		$this->user = DB_USER;
		$this->password = DB_PASSWORD;
		$this->database = DB_NAME;
		$this->pdo = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->database, $this->user, 
			$this->password, array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
	}

	/**
	 * Request to add to the database
	 * $champs by default is array
	 * $table by default is a string
	 * $where by default is int
	 * return Int - The id of the last element added
	 */
	public function select($champs = '*', $table = '', $where=1) {	// paramètre optionnel tout à la fin
		$theChamps = $this->arrayToString($champs);
		$theWhere = $this->arrayToString($where, "update");

		try {
			$result = $this->pdo->query("SELECT $theChamps FROM $table WHERE $theWhere");
			return $result -> fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			die("Votre traitement n'a pas abouti \n");
		}
	}

	/**
	 * Request to add to the database
	 * $champs by default is array
	 * $table by default is string
	 * return Int - The id of the last element added
	 */
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

			return $this->pdo->lastInsertId();
			} catch (Exception $e) {
				echo $e->getMessage();
				return -1;
			} 
	}

	/**
	 * Delete request in the database
	 * $champs by default is array
	 * $table by default is string
	 * return Int - Number of lines deleted
	 */
	public function delete($champs, $table='') {
		$theChamps = $this->arrayToString($champs, 3);
		echo $theChamps;

		try {
			$result = $this->pdo->prepare("DELETE FROM `$table` WHERE ($theChamps) ");
			$result->execute();
		} catch (Exception $e) {
			die("Votre traitement n'a pas abouti \n");
		} 
	}

	/**
	 * Update request in the database
	 * $champs by default is array
	 * $where by default is array
	 * $table by default is string
	 * return Int - Number of rows edited
	 */
	public function update($champs, $where, $table='') {
		$theChamps = $this->arrayToString($champs, 4);
		$where = $this->arrayToString($where, 3);

		try {
			$result = $this->pdo->prepare("UPDATE `$table` SET $theChamps WHERE $where");
			$result->execute();
		} catch (Exception $e) {
			die("Votre traitement n'a pas abouti \n");
		} 
		die();
	}

	/**
	 * Converting an array to a character string 
	 * $champs by default is string
	 * $type by default is int
	 * return String
	 */
	private function arrayToString($champs = "", $type=1) {
		$theChamps = "";	// string value returned

		if (is_array($champs)) {	// case $champs is a table
			
			/**
			 * Management of the different types of values 
			 */
			if ($type == 1)
				foreach($champs as $value)
					$theChamps = $theChamps . $value . ","; 
			elseif ($type == 3) {	// champs1 = 'value1' AND champs2 = 'value2'
				foreach ($champs as $key => $value)
					$theChamps = $theChamps . $key . " = '" . $value . "' AND "; 
				$theChamps = substr($theChamps, 0, -4);
			} elseif ($type == 4) {	// champs1 = 'value1', champs2 = 'value2'
				foreach ($champs as $key => $value)
					$theChamps = $theChamps . $key . " = '" . $value . "',"; 
			} else 	// case $champs is a variable
				foreach ($champs as $value)
					$theChamps = $theChamps . "'" . $value . "',";
			$theChamps = substr($theChamps, 0, -1);	// removal of the last character
		} else // case $champs is a variable - OPTION
				$theChamps = $champs;
		return $theChamps;
	}

	protected function randomByAlphNum($key="User") {
		return "#" . substr(md5(uniqid($key, true)), 10);
	}
}

?>
