<?php
  session_start();
  require_once('book.php');
  require_once('user.php');
  require_once('categoria.php');

  $usuario = new User();
  $usuario->getUser($_SESSION["idUsuario"]);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8-iso8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Airbook</title>
 
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/tema.css" rel="stylesheet" media="screen">
 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- El logotipo y el icono que despliega el menú se agrupan
           para mostrarlos mejor en los dispositivos móviles -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
          <span class="sr-only">Desplegar navegación</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">AirBook</a>
      </div>
     
      <!-- Agrupar los enlaces de navegación, los formularios y cualquier
           otro elemento que se pueda ocultar al minimizar la barra -->
      <div class="collapse navbar-right navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <?php if(isset($_SESSION["idUsuario"])) { ?>
            <li><a href="profile.php">Perfil</a></li>
          <?php } else { ?>
            <li><a href="registerform.php">Registrarse</a></li>
          <?php } 

          if(isset($_SESSION["idUsuario"])) { ?>
            <li><a href="logout.php">Salir</a></li>
            <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Subir nuevo archivo">
                <span class="glyphicon glyphicon-circle-arrow-up"></span>
                Cargar
              </a>
          </li>
          <?php } ?>
          <!--<li><a href="#">Salir</a></li>-->
        </ul>
     
        <form class="navbar-form navbar-left" role="search">
          <div class="input-group">
            <div class="form-group">
              <input type="text" class="form-control input-sm" placeholder="Buscar">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-sm btn-primary">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
            </div>
          </div>
        </form>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-2">
          <img src="images/generic-user.png" alt="usuario" class="img-circle">
        </div>
        <div class="col-lg-3">
          <h2>
            <?php echo $usuario->getNombreCompleto(); ?><br/>
          </h2>
          <div class="panel panel-primary">
            <div class="panel-heading">Informaci&oacute;n de contacto</div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-4 control-label">Email</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $usuario->getCorreo(); ?></p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Usuario</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $usuario->getNombre(); ?></p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Mensaje</label>
                <div class="col-sm-8">
                  <p class="form-control-static">
                    <a href="#" id="sendMessage">Enviar Mensaje</a>
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-1"></div>
          <div class="col-lg-5">

            <div class="panel panel-primary">
              <div class="panel-heading">Inbox</div>
              <div class="panel-body">
              </div>
            </div>

          </div>
          <div class="col-lg-5">

            <div class="panel panel-info">
              <div class="panel-heading">Mis Libros</div>
              <div class="panel-body">
              </div>
            </div>
            
          </div>
      </div>

    </div>

     <footer class="footer">
      <div class="container text-center">
        <p class="text-muted">AirBook&#174; 2015, An&aacute;lisis y Dise&ntilde;o de Sistemas 1</p>
      </div>
    </footer>
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
 
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
    </script>

    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>