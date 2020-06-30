<?php 
    session_start(); 
    error_reporting(E_PARSE);
    if(!isset($_SESSION['contador'])){
        $_SESSION['contador'] = 0;
    }
?>

<nav class="navbar bg-warning">
  <div class="container-fluids">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">      
        <?php
          if(!$_SESSION['nombreAdmin']==""){
            echo '
            <ul class="nav navbar-nav">
              <li>
                <h4 style="color:#ffffff ">Bienvenido: '.$_SESSION['nombreAdmin'].'  - Panel de Administración </h4>
              <li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li>
                  <a href="process/logout.php" class="items"> <i class="fa fa-power-off"></i> Cerrar Sesion</a>
              </li>                     
            </ul>            
   
              ';
            }else if(!$_SESSION['nombreUser']==""){
            echo '
            
            <ul class="nav navbar-nav">
              <form class="form-inline" action="process/login.php" method="post">
                <div class="form-group">
                  <a class="nav-link" href="pedido.php"><i class="fa fa-credit-card"></i> Pedido</a>
                </div>
              </form>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i> '.$_SESSION['nombreUser'].' <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="process/logout.php">Cerrar Sesion</a></li>
                </ul>
              </li>          
            </ul>

             ';
           }else{
            echo '
            <ul class="nav navbar-nav text-center" style="margin-top:3px;">
              <li>
                <form class="form-inline" action="process/login.php" method="post">
                  <div class="form-group">
                    <input class="form-control" type="text" name="nombre-login" placeholder="usuario" required="" style="border-radius: 3px;"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" name="clave-login" placeholder="Contraseña" required="" style="border-radius: 3px;"/>
                  </div>
                  <div class="checkbox text-center">
                    <label class="items">
                      <input type="radio" name="optionsRadios" value="option1" checked> Usuario
                      <input type="radio" name="optionsRadios" value="option2">
                      Administrador
                    </label>
                  </div>
                  <button type="submit" class="boton btn-success"> Ingresar </button>
                </form>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">          
              <li>
                <a class="items" href="return">Olvidé mi clave</a> 
              </li>
              <li>
                <a class="items" href="registration.php"> Registrarse</a>
              </li>
              <li>              
                <a href="#" class="carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver carrito"><i class="fa fa-shopping-cart"></i></a>
              </li>           
            </ul>

             ';
           }
        ?>
    </div>
  </div>
</nav>