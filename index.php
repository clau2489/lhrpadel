<?php
include './library/configServer.php';
include './library/consulSQL.php';
header("Content-Type: text/html;charset=utf-8"); 
mysql_query("SET NAMES 'utf8'");
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Inicio</title>
    <?php include './inc/link.php'; ?>
</head>

<style type="text/css">
  .dropdown-container {
    display: none;
    background-color: #2c3048;
    padding-left: 8px;
}
</style>

<body id="container-page-index">

    <!-- menu de navegacion horizontal -->
    <?php include './inc/navbar.php'; ?>
    <?php include './inc/nav.php'; ?>
    
    <!-- box de productos -->
    <div id="store" class="container-fluid">
      <div class="row">
          <!-- Categorias -->
          <div class="col-md-2">
            <?php include './inc/sidebar.php'; ?>
          </div>


          <!-- Productos -->
          <div class="col-md-10 products">
              <?php include './inc/carousel.php'; ?>

              <h2 class="text-center">Productos Destacados</h2>

              <?php
              
              $CantidadMostrar=8;
              
              //Conexion  al servidor mysql
              $conetar = new mysqli("localhost", "root", "usbw", "c1800635_lhr");
              if ($conetar->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $conetar->connect_errno . ") " . $conetar->connect_error;
              }else{
              
              // Validado  la variable GET

              $compag =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 

              $TotalReg = $conetar->query("SELECT * FROM producto WHERE CodigoCat='01pd'");

              //Se divide la cantidad de registro de la BD con la cantidad a mostrar 

              $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);

              //Consulta SQL
              $consultavistas ="SELECT * FROM producto WHERE CodigoCat='01pd' LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;

              // echo $consultavistas;
              $consulta=$conetar->query($consultavistas);

              while ($lista=$consulta->fetch_row()) {

                $imagen= utf8_encode($lista[8]);
                $nombre= utf8_encode($lista[1]);

                echo "

                  <div class='col-xs-6 col-sm-3'>
                  
                  <div class='thumbnail'>
                  
                  <a href='infoProd.php?CodigoProd=".$lista[0]."'>

                  <img style='width: 99%;' src='assets/img-products/".$imagen."'>

                  </a>
                  
                  <div class='caption'>

                  <p style='font-size: 30px; font-weight: 700;'> $ ".$lista[3]." .-</p>


                  <h5>".$nombre."</h5>                                     
                  
                  <p class='text-center'>

                  <button value='".$lista[0]."' class='btn btn-success btn-block btn-sm botonCarrito'>

                  <i class='fa fa-shopping-cart'></i>&nbsp; Añadir</button>
                  
                  </p>

                  </div>

                  </div>

                  </div>
                ";
              }

              /*Sector de Paginacion */

              //Operacion matematica para boton siguiente y atras 

              $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;

              $DecrementNum =(($compag -1))<1?1:($compag -1);

              //echo "<div class='col-md-12 box-paginator'>";

              //echo "<a href=\"?pag=".$DecrementNum."\">◀ Anterior </a>";

              //Se resta y suma con el numero de pag actual con el cantidad de 

              //numeros  a mostrar

              $Desde=$compag-(ceil($CantidadMostrar/2)-1);

              $Hasta=$compag+(ceil($CantidadMostrar/2)-1);
     
             //Se valida
             $Desde=($Desde<1)?1: $Desde;
             
             $Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
             
             //Se muestra los numeros de paginas
             for($i=$Desde; $i<=$Hasta;$i++){
              //Se valida la paginacion total
              //de registros
              
              if($i<=$TotalRegistro){
                
                //Validamos la pag activo
                
                if($i==$compag){
                   //echo "<a class='paginator' href=\"?pag=".$i."\">".$i."</a>";
                }

                else {
                  //echo "<a class='paginator' href=\"?pag=".$i."\">".$i."</a>";
                }         
              }
             }
         // echo "<a href=\"?pag=".$IncrimentNum."\"> Siguiente ▶</a>

          //</div>

          //";
          
        }
        ?>              
          </div>
      </div>
    </div>    

    <div id="registro" class="container-fluid">
      <div class="row text-center">
        <h3>Acerca de Nosotros</h3>
      </div>
      <br>
      <div class="row">                  
        <div class="col-md-12 text-center">
          <h3>¿Porqué LHR Padel? </h3><h5>En LHR Padel reunimos los mejores medios de pago para que tengas a mano muchas alternativas para pagar tus compras.</h5>
          <img src="assets/img/afip.png" width="50%">              
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-4 text-center">
          <h3>Todas las Tarjetas de crédito</h3>
          <p class="initial">Ingresás los datos de tu tarjeta de crédito al pagar y listo. La próxima vez que quieras usar esta tarjeta, solo te pediremos el código de seguridad.</p>
          <img src="assets/img/tc.png" width="100%">
          <h6 class="acredit-inst"> Acreditación instantánea.</h6>
        </div>
        <div class="col-md-4 text-center">
          <h3>Tarjeta de débito</h3>
          <p class="initial">Ingresás los datos completos una sola vez y en futuras compras solo te pediremos el código de seguridad.</p>
          <img src="assets/img/td.jpg" width="100%">
          <h6 class="acredit-inst"> Acreditación instantánea.</h6>
        </div>
        <div class="col-md-4 text-center">
          <h3>En efectivo en puntos de pago</h3>
          <h6 class="initial">Pago Fácil, Rapipago, Cobro Express y Carga Virtual se acreditan apenas pagás.</h6>
          <h6 class="initial">Con Provincia NET Pagos pagás y se acredita en 1 día hábil.</h6>
          <h6 class="initial">Con RedLink se acredita de 1 a 2 días hábiles después de que pagás.</h6>
          <img src="assets/img/efect.png" width="100%"> 
          <h6 class="acredit-inst"> Acreditación instantánea.</h6>            
        </div>
        <div class="col-md-3">          
        </div>       
      </div>
    </div>

    <?php include './inc/footer.php'; ?>

<script type="text/javascript">
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("mouseover", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>    
    
</body>
</html>