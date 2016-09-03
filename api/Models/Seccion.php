<?php namespace Models;
	
	class Seccion{

		private $id;
		private $nombre;
		private $conn;

		public function __construct(){
			$this->conn = new Conexion();
		}

		public function set($atributo, $valor){
			$this->$atributo = $valor;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function add(){
			$sql = "INSERT INTO seccion(nombre)
					VALUES ('{$this->nombre}')";
			$this->conn->consultaSimple($sql);
		}

		public function listar(){
			$sql = "SELECT * FROM seccion";
			$datos = $this->conn->consultaRetorno($sql);
			echo(mysqli_num_rows($datos));
			return $datos;
		}

		public function delete(){
			$sql = "DELETE FROM seccion WHERE id = '{$this->id}'";
			$this->conn->consultaSimple($sql);
		}

		public function edit(){
			$sql = "UPDATE secion SET nombre = '{$this->nombre}' WHERE id = '{$this->id}'";
			$this->conn->consultaSimple($sql);

		}

		public function view(){
			$sql = "SELECT * FROM seccion WHERE id='{$this->id}'";
			$datos = $this->conn->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
	}


 ?>