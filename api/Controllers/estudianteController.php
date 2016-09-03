<?php namespace Controllers;

	use Models\Estudiante as Estudiante;
	use Models\Seccion as Seccion;

	class estudianteController{

		private $estudiante;
		private $seccion;

		public function __construct(){
			$this->estudiante = new Estudiante();
			$this->seccion = new Seccion();
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
			$datos = $this->estudiante->listar();
			echo $this->toJson($datos);
		}

		public function eliminar($id){
			$this->estudiante->set("id",$id);
			$this->estudiante->delete();
			header("Location: " . URL . "estudiante");
		}

		public function editar($id){
			if(!$_POST){
				$this->estudiante->set("id", $id);
				$datos = $this->estudiante->view();
				return $datos;
			}else{
				$this->estudiante->set("id", $_POST['id']);
				$this->estudiante->set("nombre", $_POST['nombre']);
				$this->estudiante->set("edad", $_POST['edad']);
				$this->estudiante->set("promedio", $_POST['promedio']);
				$this->estudiante->set("id_seccion", $_POST['id_seccion']);
				$this->estudiante->edit();
				header("Location: " . URL . "estudiante");
			}
		}

		public function listarSecciones(){
			$datos = $this->seccion->listar();
			return $datos;
		}

		public function agregar(){
			if(!$_POST){
				$datos = $this->seccion->listar();
				return $datos;
			}else{
				$permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
				$limite = 700;
				if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024){
					//Se guarda imagen
					$nombreImagen = date('is') . $_FILES['imagen']['name'];
					$ruta = "Views" . DS . "template" . DS . "imagenes" . DS . "avatars" . DS . $nombreImagen;
					move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
					//Se guardan datos de POST
					$this->estudiante->set("nombre",$_POST['nombre']);
					$this->estudiante->set("edad",$_POST['edad']);
					$this->estudiante->set("promedio",$_POST['promedio']);
					$this->estudiante->set("imagen", $nombreImagen);
					$this->estudiante->set("id_seccion",$_POST['id_seccion']);
					print "TODO BIEN HASTA ACA";
					//Ejecutar insert
					$this->estudiante->add();
					//Redireccionar a detalle estudiantes
					header('Location: ' . URL . "estudiante");
 				}
			}
		}
	} 

	$estudianteController = new estudianteController();

 ?>