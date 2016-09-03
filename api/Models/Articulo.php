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
			$sql = "SELECT * FROM archivos WHERE correl = '{$this->correl}'";
			$datos = $this->conn->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

 ?>