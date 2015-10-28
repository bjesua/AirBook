<?php
  session_start();
  require_once('book.php');
  require_once('user.php');
  require_once('categoria.php');
  require_once('Comment.php');
?>
<?php
  $archivo = new element_book(0,0,"","");
  $archivo->getBook($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8-iso8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $archivo->getTitle(); ?> </title>
 
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
          <?php } ?>
          </li>
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
        <div class="col-lg-7">
          <div class="page-header">
            <h3><?php echo $archivo->getTitle(); ?></h3>
            <?php
                $estrellas = round($archivo->getPunteo());
                $blancas = 5 - $estrellas;
                $y = $blancas;
                while($y < 5){
                  ?><span class="glyphicon glyphicon-star"></span><?php
                  $y++;
                }
                $y = 0;
                while($y < $blancas){
                  ?><span class="glyphicon glyphicon-star-empty"></span><?php
                  $y++;
                }
              ?>
          </div>
          <div class="col-lg-8">
            <blockquote>
              <p><?php echo $archivo->getDescription(); ?></p>
            </blockquote>

            <div class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Calificar</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <select class="form-control" id="selectCalificar">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="button">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                      </button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <p>
              <?php
                if(isset($_SESSION['idUsuario'])){
                    print '
                    <center>
                      <a href="'.$archivo->getPath().'" target="_blank">
                        <button type="button" class="btn btn-success">Descargar
                        </button>
                      </a>
                    </center>
                      ';                    
                } else {
                  ?>
                    <a href="registerform.php">Descargar</a>
                  <?php
                }
              ?>
            </p>

              <div class="row">
                <div class="pagae-header">
                  <!-- AddToAny BEGIN -->
                  <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                  <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                  <a class="a2a_button_facebook"></a>
                  <a class="a2a_button_twitter"></a>
                  <a class="a2a_button_email"></a>
                  <a class="a2a_button_google_plus"></a>
                  </div>
                  <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
                  <!-- AddToAny END -->
                </div>
              </div>
              <div class="row">
                <div class="page-header">
                  <h2><small>Comentarios</small></h2>
                </div>
                <?php
                  if(isset($_SESSION['idUsuario'])){
                ?>
                  <div class="row">
                    <div class="col-lg-12">
                      <textarea class="form-control" rows="5" placeholder="Dejar un comentario..."></textarea>
                      <button type="button" class="btn btn-block btn-primary">Enviar</button>
                    </div>
                  </div>
              <?php
                }
                $comentario = new Comment();
                $comentarios = $comentario->getComentarios($archivo->getId());
                $x = 0;
                while(@$comentarios[$x]!=null){
              ?>
                <div class="media">
                  <div class="media-left">
                    <h1><span class="glyphicon glyphicon-text-size" aria-hidden="true"></span></h1>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><?php echo $comentarios[$x]->getUsuario(); ?></h4>
                    <p>
                      <?php echo $comentarios[$x]->getTexto(); ?>
                    </p>
                  </div>
                </div>
              <?php
                $x++;
                }
              ?>


              </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="page-header">
            <h4>Categor&iacute;as</h4>
          </div>

          <ul class="list-group">
          <?php
            $categoria = new Categoria();
            $categorias = $categoria->getAllCategorias();
            $x = 0;
            while(@$categorias[$x]!=null){
              ?>
                <li class="list-group-item">
                  <span class="badge"><?php echo $categorias[$x]->getNoArchivos(); ?></span>
                  <a href="#"><?php echo $categorias[$x]->getNombre(); ?></a>
                </li>
              <?php
              $x++;
            }
          ?>
          </ul>

          <?php
            if(isset($_GET['error'])) {
          ?>
            <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              El usuario o contrase&ntilde;a no coinciden.
            </div>
          <?php } ?>

          <?php if(!isset($_SESSION["idUsuario"])){ ?>
          <div class="container" id="contenido">
            <form name="loginForm" action="login.php" method="post">
              <div class="col-lg-12">
                 <div class="form-group">
                  <label for="inputUsuario">Usuario</label>
                  <input type="text" class="form-control" id="inputUsuario" name="inputUsuario"
                         placeholder="Usuario">
                </div>
                <div class="form-group">
                  <label for="inputContrasena">Contrase&ntilde;a</label>
                  <input type="password" class="form-control" id="inputContrasena" name="inputContrasena"
                         placeholder="Contrase&ntilde;a">
                </div>
                <button type="submit" name="btnIniciarSesion" class="btn btn-ttc btn-primary">Iniciar Sesion</button>
                <button type="reset" class="btn btn-ttc">Cancelar</button>
              </div>
            </form>
          </div>
          <?php } ?>

        </div>
        <div class="col-lg-1"></div>
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