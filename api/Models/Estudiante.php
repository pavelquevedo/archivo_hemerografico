<?php namespace Models;

	class Estudiante{

		private $id;
		private $nombre;
		private $edad;
		private $promedio;
		private $imagen;
		private $fecha;
		private $id_seccion;
		private $conn;

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function __construct(){
			$this->conn = new Conexion();
		}

		public function listar(){
			$sql = 'SELECT t1.*, t2.nombre as nombre_seccion FROM estudiante t1 INNER JOIN seccion t2 ON t1.id_seccion = t2.id';
			$datos = $this->conn->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO estudiante(nombre,edad,promedio,imagen,fecha,id_seccion)
					VALUES ('{$this->nombre}','{$this->edad}','{$this->promedio}','{$this->imagen}',NOW(),'{$this->id_seccion}')";
			$this->conn->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM estudiante WHERE id = '{$this->id}'";
			$this->conn->consultaSimple($sql);
		}

		public function edit(){
			$sql = "UPDATE estudiante 
					SET nombre = '{$this->nombre}', edad = '{$this->edad}', promedio = '{$this->promedio}', id_seccion = '{$this->id_seccion}' WHERE id = '{$this->id}'";
			$this->conn->consultaSimple($sql);		

		}

		public function view(){
			$sql = "SELECT t1.*, t2.nombre as nombre_seccion FROM estudiante t1 INNER JOIN seccion t2
					ON t1.id_seccion = t2.id WHERE t1.id = '{$this->id}'";
			$datos = $this->conn->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
	} 

 ?>