<div id="container-carrito-compras">
    <div class="container">
        <div class="row" style="padding-top: 1em; padding-bottom: 1em;">
            <div class="col-md-6">
              <h4>Tu Carrito</h4>
              <div id="carrito-compras-tienda"></div> 
            </div>
            <div class="col-md-2">
              
            </div>
            <div class="col-md-4 text-center">
              <img src="assets/img/lhrpadel.png" width="60px">
              <br><br>
              <a href="pedido.php" class="btn btn-success btn-block"><i class="fa fa-file"></i> Ver Pedido</a>
              <a href="process/vaciarcarrito.php" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Vaciar carrito</a>
            </div>            
        </div>
    </div>
</div>


<!-- Modal login -->
<div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content" id="modal-form-login">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title text-center text-primary" id="myModalLabel">Iniciar sesión</h4>
            </div>
            <form action="process/login.php" method="post" role="form" style="margin: 20px;" class="FormCatElec" data-form="login">
              <div class="form-group">
                  <label><span class="glyphicon glyphicon-user"></span>&nbsp;Nombre</label>
                  <input type="text" class="form-control" name="nombre-login" placeholder="Escribe tu nombre" required=""/>
              </div>
              <div class="form-group">
                  <label><span class="glyphicon glyphicon-lock"></span>&nbsp;Contraseña</label>
                  <input type="password" class="form-control" name="clave-login" placeholder="Escribe tu contraseña" required=""/>
              </div>

              <p>¿Cómo iniciaras sesión?</p>
              <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" value="option1" checked>
                    Usuario
                </label>
             </div>
             <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" value="option2">
                     Administrador
                </label>
             </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Iniciar sesión</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
              </div>
              <div class="ResFormL" style="width: 100%; text-align: center; margin: 0;"></div>
          </form>
      </div>
  </div>
</div>

<!-- Fin Modal login -->
<div id="mobile-menu-list" class="hidden-sm hidden-md hidden-lg">
    <br>
    <h3 class="text-center tittles-pages-logo">LHR Padel</h3>
    <button class="btn btn-default button-mobile-menu" id="button-close-mobile-menu">
    <i class="fa fa-times"></i>
    </button>
    <br><br>
    <ul class="list-unstyled text-center">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="product.php">Productos</a></li>
        <?php 
            if(!$_SESSION['nombreAdmin']==""){
                echo '<li><a href="configAdmin.php">Administración</a></li>';
            }elseif(!$_SESSION['nombreUser']==""){
                echo '<li><a href="pedido.php">Pedido</a></li>';
            }else{
                echo '<li><a href="registration.php">Registro</a></li>';
            }
        ?>
    </ul>
</div>

<!-- Modal carrito -->
<div class="modal fade modal-carrito" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
  <div class="modal-dialog modal-md">
    <div class="modal-content" style="padding: 1em; text-align: center">
        <br>
        <img src="assets/img/shopping-cart.png">
        <h4>Tu producto se añadio correctamente</h4>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <a href="index.php" class="btn btn-primary btn-block"><i class="fa fa-tag"></i> Continuar comprando</a>
          </div>
          <div class="col-md-6">
            <a href="pedido.php" class="btn btn-success btn-block"><i class="fa fa-credit-card"></i> Ir a la Caja</a>
          </div>          
        </div>
        <br>
      </div>
  </div>
</div>
<!-- Fin Modal carrito -->
   
<!-- Modal logout -->
<div class="modal fade modal-logout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <p class="text-center">¿Quieres cerrar la sesión?</p>
        <p class="text-center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
        <p class="text-center">
            <a href="process/logout.php" class="btn btn-primary btn-sm">Cerrar la sesión</a>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
        </p>
      </div>
  </div>
</div>
<!-- Fin Modal logout -->