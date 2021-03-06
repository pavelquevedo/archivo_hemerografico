<?php namespace Controllers;

	use Models\Articulo as Articulo;
	use Models\Config as Config;

	class articuloController{
		
		private $articulo;

		public function __construct(){
			$this->articulo = new Articulo();
		}

		public function index(){
			$datos = $this->articulo->list();
			$emparray = array();
		    while($row =mysqli_fetch_assoc($datos))
		    {
				$emparray[] = $row;
		    }
		    print json_encode($emparray, JSON_PRETTY_PRINT);
		}

		public function view($anio){
			$this->articulo->set('anio',$anio);
			$datos = $this->articulo->view();
			$emparray = array();
			while ($row = mysqli_fetch_assoc($datos)) {
				$emparray[] = $row;
			}
			echo json_encode($emparray, JSON_PRETTY_PRINT);
		}

		public function search($autor,$articulo, $anio){
			if($autor !== 'null'){
				$this->articulo->set('nombreautor',$autor);		
			}
			if($articulo !== 'null'){
				$this->articulo->set('nombrearticulo',$articulo);
			}
			if($anio !== 'null'){
				$this->articulo->set('anio',$anio);
			}
			
			$datos = $this->articulo->search();
			while ($row = mysqli_fetch_assoc($datos)) {
				$emparray[] = $row;
			}
			echo json_encode($emparray, JSON_PRETTY_PRINT);
		}

	} 

 ?>