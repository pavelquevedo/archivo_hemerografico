<?php namespace Controllers;

	use Models\Seccion as Seccion;
	
	class seccionController{

		private $seccion;

		public function __construct(){
			$this->seccion = new Seccion();
		}

		public function index(){
			$datos = $this->seccion->listar();
			return $datos;
		}

		public function ver($num){
			print "Eres el numero: ".$num;
		}

		public function agregar(){
			if($_POST){
				$this->seccion->set("nombre", $_POST['nombre']);
				$this->seccion->add();
				header('Location: ' . URL . "seccion");
			}
		}

	} 

 ?>