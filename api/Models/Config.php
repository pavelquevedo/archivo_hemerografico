<?php namespace Models;

	class Config{

		public static function toJson($array){
			$emparray = array();
			if(mysqli_num_rows($array) > 0){
			    while($row =mysqli_fetch_assoc($array))
			    {
			        $emparray[] = $row;
			    }
			}
			return json_encode($emparray);
			
		}

	} 


 ?>