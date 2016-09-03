<?php namespace Controllers;

	use Models\Anio as Anio;

	class anioController{

		private $anio;

		public function __construct(){
			$this->anio = new Anio();
		}

		private function toJson($array){
			$emparray = array();
		    while($row =mysqli_fetch_assoc($array))
		    {
		        $emparray[] = $row;
		    }
		    return json_encode($emparray);
		}

		public function index(){
			$datos = $this->anio->listar();
			echo $this->toJson($datos);
		}
	}

?>
