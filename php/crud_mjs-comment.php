<?php 
	class CRUD{ // CreateReadUpdateDelete


		/*
			Variable Global
		*/
		private $host;
		private $user;
		private $password;
		public $database;
		private $pdo;

		function __construct($host = "", $user = "", $password = "", $database = "") {
			require_once "config.php";
			$this->host = DB_HOST; 
			$this->user = DB_USER; 
			$this->password = DB_PASSWORD; 
			$this->database = DB_NAME;
			$this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		}
		
		/**
			* Request to add to the database
			* $champs by default is sring
			* $table by default is sring
			* $where by default is int
			* return Array - A array sorting data
		**/
		public function select($champs = '*', $table = '', $where = 1) {

			$theChamps = $this->arrayToString($champs);
			$theWhere = $this->arrayToString($where, 3);

			try{
				$result = $this->pdo->query("SELECT $theChamps FROM $table WHERE $theWhere");
				return $result->fetchAll(PDO::FETCH_ASSOC);	
			}catch (Exception $e) {
				die("Votre traitement n'a pas abouti  \n");
				// $e->getMessage() permet d'afficher l'erreur SQL;
			}		
		}
	
		/**
			* Request to add to the database
			* $champs by default is array
			* $table by default is sring
			* return Int - The id of the last element added
		**/
		public function insert($champs, $table = '') {

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
			         
			$result = $this->pdo->prepare("INSERT INTO $table ($theChamps) VALUES ($point)");
			$result->execute($theNewChamps);
			
			return $this->pdo->lastInsertId();
		}

		/**
			* Update request in the database
			* $champs by default is array
			* $where by default is array
			* $table by default is sring
			* return Int - Number of rows edit
		**/
		public function update($champs, $where, $table = '') {
			$theChamps = $this->arrayToString($champs, 4);
			$where = $this->arrayToString($where, 3);

			try{
				$result = $this->pdo->prepare("UPDATE `$table` SET $theChamps WHERE $where");
				$result->execute();
				return $result->rowCount();
			}catch (Exception $e) {
				die("Votre traitement n'a pas abouti  \n");
			}
		}

		/**
			* Removal request in the database
			* $champs by default is array
			* $table by default is sring
			* return Int - Number of lines delete
		**/
		public function delete($champs,$table = '') {
			$theChamps = $this->arrayToString($champs, 3);

			try{
				$result = $this->pdo->prepare("DELETE FROM `$table` WHERE $theChamps");
				$count = $result->execute();
				return $count;
			}catch (Exception $e) {
				die("Votre traitement n'a pas abouti  \n");
			}
		}

		/********************************************************/
		/**
			* Converting an array to a character string
			* $champs by default is string
			* $type by default is int
			* return String
		**/
		private function arrayToString($champs = "", $type = 1){
			$theChamps = ""; // valeur string retournée
			
			/* Cas $champs est un tableu */
			
			if(is_array($champs)){
				
				/*
					Gestion des differents type de valeur souhaitez
				*/
				if($type == 1) // value1, value2
					foreach($champs as $valeu)
						$theChamps = $theChamps.$valeu.',';
				elseif($type == 3){ // champs1 = 'value1' AND champs2 = 'value2'
					foreach($champs as $key=>$valeu)
						$theChamps = $theChamps.$key." = '".$valeu."' AND ";
					$theChamps = substr($theChamps,0,-4);
				}elseif($type == 4) // champs1 = 'value1' , champs2 = 'value2'
					foreach($champs as $key=>$valeu)
						$theChamps = $theChamps.$key." = '".$valeu."',";
				else // Type == 2 - 'value1', 'value2'
					foreach($champs as $valeu)
						$theChamps = $theChamps."'".$valeu."',";
				
				$theChamps = substr($theChamps,0,-1); // Suppression du dernier caractère
				
			}else /* Cas $champs est une variable */
				$theChamps = $champs;

			return $theChamps;
		}
	
	
	}

	/**
		-- Phase de test --
	$bd = new CRUD("localhost","root","","mike-js");
	$bd->select( array("nom","prenom"), "users" );
	echo $bd->insert( array("nom","prenom"), array("Mike","Mike"), "users" );
	$bd->delete( array("nom"=>"Mike","prenom"=>"lfdkzflo"), "users" );
		-- End Test --
	**/