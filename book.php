<?php
	class book{
		function new_entries_by_category($category){
			require_once('dbm.php');
			$data = new DataBase();
			$data->open();
			$query = "SELECT `id_archivo`, `nombre`, `descripcion`, `ruta`, `punteo`
						FROM `archivo` WHERE `id_usuario` = $category ORDER BY 1 ASC LIMIT 20";
			$result = mysqli_query($data->get_connect(), $query);
			$list_of_files = array();
			while($row = mysqli_fetch_array($result)){
				$elemento = new element_book($row[0], $row[1], $row[2], $row[3]);
				$elemento->setPunteo($row[4]);
				$elemento->setId($row[0]);
				$list_of_files[] = $elemento;
			}
			$data->close();
			return $list_of_files;
		}

	}

	class element_book{
		var $id;
		var $user;
		var $title;
		var $path;
		var $description;
		var $punteo;
		function element_book($user, $title, $description, $path){
			$this->user = $user;
			$this->title = $title;
			$this->path = $path;
			$this->description = $description;
		}
		public function getBook($id){
			require_once('dbm.php');
			$data = new DataBase();
			$data->open();
			$query = "SELECT * FROM `archivo` WHERE `id_archivo` = $id";
			$result = mysqli_query($data->get_connect(), $query);
			$row = mysqli_fetch_array($result);
			$this->id = $row[0];
			$this->user = $row[1];
			$this->title = $row[2];
			$this->path = $row[5];
			$this->description = $row[3];
			$this->punteo = $row[6];
			$data->close();
		}
		function setId($id){
			$this->id = $id;
		}
		function getId(){
			return $this->id;
		}
		function setPunteo($punteo){
			$this->punteo = $punteo;
		}
		function getUserId(){
			return $this->user;
		}
		function getTitle(){
			return $this->title;
		}
		function getPath(){
			return $this->path;
		}
		function getDescription(){
			return $this->description;
		}
		function getPunteo(){
			return $this->punteo;
		}
	}
?>