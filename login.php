<?php
	require_once('validacion.php');
	$validacion = new Validacion();
	if(isset($_POST['btnIniciarSesion'])){
        echo $resultado = $validacion->getUserId(trim($_POST['inputUsuario']), trim($_POST['inputContrasena']));
        if($resultado > 0 ){
        	session_start();
            $_SESSION["idUsuario"] = $resultado;
            header('Location: index.php');
        }else{
            header('Location: index.php?error=1');
        }
    }
?>