<?php namespace Models;
	
	/**
	* 
	*/
	class Conexion
	{
		private $datos = array(
			'host' => 'localhost',
			'user' => 'root',
			'pass' => '',
			'db' => 'historia_hemero'
		);

		private $conn;

		function __construct()
		{
			$this->conn = new \mysqli($this->datos['host'],
										$this->datos['user'],
										$this->datos['pass'],
										$this->datos['db']);
		}

		public function consultaSimple($sql){
			$this->conn->query($sql);
		}

		public function consultaRetorno($sql){
			$datos = $this->conn->query($sql);
			return $datos;

		}
	}

?>