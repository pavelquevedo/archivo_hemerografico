<?php namespace Models;

	class Anio{

		private $anio;
		private $conn;

		public function __construct(){
			$this->conn = new Conexion();
		}

		public function listar(){
			$sql = 'SELECT DISTINCT(anio) FROM archivos ORDER BY anio DESC';
			$datos = $this->conn->consultaRetorno($sql);
			return $datos;
		}
	} 

 ?>