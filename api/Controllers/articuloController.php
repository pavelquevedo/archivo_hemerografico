<?php namespace Controllers;

	use Models\Articulo as Articulo;
	use Models\Config as Config;

	class articuloController{
		
		private $articulo;

		public function __construct(){
			$this->articulo = new Articulo();
		}

		private function toJson($array){
			$emparray = array();
		    while($row =mysqli_fetch_assoc($array))
		    {
		    	echo $row['anio'];
		        //$emparray[] = $row;
		    }
		    return json_encode($emparray);
		}

		function ConvertToUTF8($text){

		    $encoding = mb_detect_encoding($text, mb_detect_order(), false);

		    if($encoding == "UTF-8")
		    {
		        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');    
		    }


		    $out = iconv(mb_detect_encoding($text, mb_detect_order(), false), "ASCII//TRANSLIT", $text);


		    return $out;
		}


		public function index(){
			//error_reporting(E_ALL & ~E_NOTICE); ini_set('display_errors', '1');
			$datos = $this->articulo->list();
			$emparray = array();
		    while($row =mysqli_fetch_assoc($datos))
		    {

		    	foreach(array_keys($row) as $key){
				    $row[$key] = $this->ConvertToUTF8($row[$key]);
				}  
				$emparray[] = $row;
		        //$emparray[] = array(
		        	//	'correl' =>  (string)$row['correl'],
		        	//	'autor' => iconv("UTF-8", "ISO-8859-1", $row['nombreautor'])
		        	//);
		    }
		    print json_encode($emparray, JSON_PRETTY_PRINT);
		}

	} 

 ?>