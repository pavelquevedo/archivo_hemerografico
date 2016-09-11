<?php namespace Models;

	class Articulo{
		private $conn;
		private $correl;
		private $nombrearticulo;
		private $nombreautor;
		private $mes;
		private $anio;
		private $path;


		public function __construct(){
			$this->conn = new Conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function list(){
			$sql = 'SELECT * FROM archivos';
			$datos = $this->conn->consultaRetorno($sql);
			//echo mysqli_num_rows($datos);
			return $datos;
		}

		public function search(){
			$sql =  "SELECT * FROM archivos WHERE";
			$pos = strpos($sql, 'WHERE');

			if (isset($this->nombreautor)) {
				if(strlen(substr($sql,$pos))==5){
					$sql = $sql . " nombreautor LIKE '%". $this->nombreautor ."%' ";	
				}else{
					$sql = $sql . " AND nombreautor LIKE '%". $this->nombreautor ."%' ";
				}
			}
			if (isset($this->nombrearticulo)) {
				if(strlen(substr($sql,$pos))==5){
					$sql = $sql . " nombrearticulo LIKE '%". $this->nombrearticulo ."%' ";	
				}else{
					$sql = $sql . " AND nombrearticulo LIKE '%". $this->nombrearticulo ."%' ";
				}
			}
			if (isset($this->anio)) {
				if(strlen(substr($sql,$pos))==5){
					$sql = $sql . " anio = " . $this->anio;	
				}else{
					$sql = $sql . " AND anio = " . $this->anio;	
				}
			}
			file_put_contents('./log_'.date("j.n.Y").'.txt', $sql, FILE_APPEND);
			$datos = $this->conn->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO archivos(nombrearticulo,nombreautor,mes,anio,path)
					VALUES ('{$this->nombrearticulo}','{$this->nombreautor}','{$this->mes}','{$this->anio}','{$this->path}')";
			$this->conn->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM archivos WHERE correl = '{$this->correl}'";
			$this->conn->consultaSimple($sql);
		}

		public function edit(){
			$sql = "UPDATE archivos 
					SET nombrearticulo = '{$this->nombrearticulo}', nombreautor = '{$this->nombreautor}', mes = '{$this->mes}', anio = '{$this->anio}', path = '{$this->path}' WHERE correl = '{$this->correl}'";
			$this->conn->consultaSimple($sql);		

		}

		public function view(){
			$sql = "SELECT * FROM archivos WHERE anio = '{$this->anio}'";
			$datos = $this->conn->consultaRetorno($sql);
			return $datos;
		}

	}

 ?>