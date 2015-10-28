<?php
    include('dbm.php');
    class Validacion
    {
        function getUserId($usuario, $contrasena){
            if($usuario == "" OR $contrasena == "")
                return -1;
             
            $datab = new DataBase();
            $datab->open();
            $connect = $datab->get_connect();
             
            echo $query = "SELECT id_usuario, nombre, contrasena FROM usuario WHERE nombre = '".$usuario."' AND contrasena = '".$contrasena."';";
            $result = mysqli_query($connect, $query);
             
            while($row = mysqli_fetch_array($result)){
                mysqli_close($connect);
                return $row[0];
            }           
            mysqli_close($connect);
            return -1;
        }
    }
?>