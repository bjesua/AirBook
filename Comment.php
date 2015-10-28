<?php
	class Comment
	{
		var $usuario;
		var $texto;
		function insert($id_usuario, $id_archivo,$texto){
			require_once('dbm.php');
			$ret = false;
			if($texto == "" OR $id_usuario == "" OR $id_archivo == "")
				return false;

			$datab = new DataBase();
			$datab->open();
			$connect = $datab->get_connect();
			if (mysqli_connect_errno())
				return false;

			mysqli_autocommit($connect,FALSE);
			$query = "INSERT INTO comentario(id_archivo, id_usuario, fecha, texto) VALUES ($id_archivo, $id_usuario, NOW(), '$texto');";
			if(mysqli_query($connect, $query)==false)
				return false;

			if(mysqli_commit($connect)){
				$ret = true;
			}
			mysqli_close($connect);
			return $ret;
		}

		function setComentario($usuario, $texto){
			$this->usuario = $usuario;
			$this->texto = $texto;
		}

		function getUsuario(){
			return $this->usuario;
		}

		function getTexto(){
			return $this->texto;
		}

		function getComentarios($id_archivo){
			require_once('dbm.php');
			require_once('user.php');
			$data = new DataBase();
			$data->open();
			$comentarios = array();
			$query = "SELECT comentario.id_usuario, comentario.texto FROM comentario WHERE comentario.id_archivo = $id_archivo ORDER BY comentario.id_comentario DESC";
			$result = mysqli_query($data->get_connect(),$query);
			while($row = mysqli_fetch_array($result)) {
				$elemento = new Comment();
				$usuario = new User();
				$usuario->getUser($row[0]);
				$elemento->setComentario($usuario->getNombre(), $row[1]);
				$comentarios[] = $elemento;
			}
			$data->close();
			return $comentarios;
		}
	}
?>