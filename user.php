<?php
	class User{
		var $userid;
		var $nombre;
		var $correo;
		var $contrasena;
		var $valoracion;
		var $rol;
		var $nombre_completo;

		function setNuevoUsuario($nombreCompleto, $nombre, $correo, $contrasena, $confirmar){
			require_once('dbm.php');
            if($nombreCompleto == "" OR $nombre == "" OR $correo == "" OR $contrasena == "" OR $confirmar == "")
                return false;
                 
            if($contrasena != $confirmar)
                return false;
             
            $datab = new DataBase();
            $datab->open();
            $connect = $datab->get_connect();
             
            $query =   "INSERT INTO usuario (nombre_completo, nombre, correo, contrasena, valoracion, rol) 
                        SELECT * FROM ( SELECT '".$nombreCompleto."','".$nombre."','".$correo."','".$contrasena."',0,'autor') AS tmp
                        WHERE NOT EXISTS (
                        SELECT nombre FROM usuario WHERE nombre = '".$nombre."') LIMIT 1;";
             
             
            if(mysqli_query($connect, $query)==false){
                mysqli_close($connect);
                return false;               
            }
             
            $col_afectadas = mysqli_affected_rows($connect);
             
            if($col_afectadas == 0){
                mysqli_close($connect);
                $this->nombre_completo = $nombreCompleto;
                $this->nombre = $nombre;
                $this->correo = $correo;
                $this->contrasena = $contrasena;
                return false;   
            }
             
            mysqli_close($connect);
            return true;
        }

		function getNombre(){
			return $this->nombre;
		}

		function getCorreo(){
			return $this->correo;
		}

		function getContrasena(){
			return $this->contrasena;
		}

		function getValoracion(){
			return $this->valoracion;
		}

		function getRol(){
			return $this->rol;
		}

		function getNombreCompleto(){
			return $this->nombre_completo;
		}

		function getUser($userid){
			$this->userid = $userid;
			require_once('dbm.php');
			$data = new DataBase();
			$query = "SELECT * FROM usuario WHERE id_usuario = $userid";
			$data->open();
			$result = mysqli_query($data->get_connect(),$query);
			while($row = mysqli_fetch_array($result)){
				$this->nombre = $row[1];
				$this->correo = $row[2];
				$this->contrasena = $row[3];
				$this->valoracion = $row[4];
				$this->rol = $row[5];
				$this->nombre_completo = $row[6];
			}
		}

		function list_of_files(){
			// Esta funcion devolvera un arreglo de objetos para los archivos
			require_once('dbm.php');
			$data = new DataBase();
			$userid = $this->userid;
			$query = "SELECT * FROM archivo WHERE id_usuario = $userid";
			$data->open();
			$result = mysqli_query($data->get_connect(),$query);
			$list_of_files = array();
			while($row = mysqli_fetch_array($result)) {
				$elemento = new element_book($row[1], $row[2], $row[3], $row[4]);
				$elemento->setId($row[0]);
				$list_of_files[] = $elemento;
			}
			$data->close();
			return $list_of_files;
		}
	}
?>