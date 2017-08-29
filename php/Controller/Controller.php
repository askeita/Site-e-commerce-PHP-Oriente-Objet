<?php
	class Controller {
		
		protected $categories;
		protected $itemsModel;
			
		public function __construct() {	/* permet de répérer et charger les catégories dès le démarrage de la session */
			require "php/Model/ItemsModel.php";
			$this->itemsModel = new ItemsModel();
			$this->categories = $this->itemsModel->listenerCategories();
		}
		
		public function arrayIsEmpty($data = array(), $keyObligatory = array()) {   // $data = $_POST
			if(!is_array($data)) 
				return -1;
			
			$isOk = false;

			foreach($data as $key => $val) {    // parcours du tableau entier des données du $_POST
				foreach($keyObligatory as $valO)   // parcours de toutes les clés obligatoires
					if($valO == $key)
						$isOk = true;
				if(!$isOk || empty(trim($val)))
					return -1;
			}  

	/*        if(isset($_POST)) {
				$reponse = array();
				$isNull = false;	// Vérification de l'existence des variables 
				$isOK = true;	// Vérification de l'état complet de notre API

				 if (!isset($_POST['firstname'])) {
					$isNull = true;
					array_push($reponse, 'Le prénom n\'est pas reconnu!');
				}

				if (!isset($_POST['lastname'])) {
					$isNull = true;
					array_push($reponse, 'Le nom n\'est pas reconnu!');
				}

				if (!isset($_POST['email'])) {
					$isNull = true;
					array_push($response, 'L\'email n\'est pas reconnu!');
				}

				if (!isset($_POST['phone'])) {
					$isNull = true;
					array_push($response, 'Le téléphone n\'est pas reconnu!');
				}

				if (!isset($_POST['civility'])) {
					$isNull = true;
					array_push($response, 'La civilité n\'est pas reconnu!');
				}

				if (!isset($_POST['avatar'])) {
					$isNull = true;
					array_push($response, 'La civilité n\'est pas reconnu!');
				} */
			return 1;
		}
		
		public static function show_404() {
			include("404.php");
		}
		
	}

 