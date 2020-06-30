<?php
include './library/configServer.php';
include './library/consulSQL.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">

    <!-- menu de navegacion horizontal -->
    <?php include './inc/navbar.php'; ?>
    <?php include './inc/nav.php'; ?>
    
    <!-- box de productos -->
    <div id="store" class="container-fluid">
      <div class="row">
          <!-- Categorias -->
          <div class="col-md-2">
            <div class="vertical-menu">
              <a style="color: white" href="niu.php"><i class="fa fa-circle"></i> Pelotas Niu</a>
              <a style="color: white" href="mayorista.php"><i class="fa fa-tags"></i> Mayoristas/ Clubes</a>
              <br><br><br>
              <hr>            
              <input type="text" class="form-control" id="usr" placeholder="Buscar" style="margin-top: 7px;">

              <h3>Categorías</h3>
              <?php             
                $categorias=  ejecutarSQL::consultar("select * from categoria");
                while($cate=mysql_fetch_array($categorias)){
                  echo '<a class="categorias" href="#'.$cate['CodigoCat'].'" tabindex="-1" role="tab" id="'.$cate['CodigoCat'].'-tab" data-toggle="tab" aria-controls="'.$cate['CodigoCat'].'" aria-expanded="false">'.$cate['Nombre'].'</a>';
                }
              ?>
            </div>
          </div>


          <!-- Productos -->
          <div class="col-md-10 products">
              <?php include './inc/carousel.php'; ?>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade" id="all-product" aria-labelledby="all-product-tab">
                  <br>
                    <?php
                    $consulta=  ejecutarSQL::consultar("select * from producto where Stock > 0");
                    $totalproductos = mysql_num_rows($consulta);
                    if($totalproductos>0){
                      $nums=1;
                      while($fila=mysql_fetch_array($consulta)){
                        echo '
                            <div class="col-md-3">
                                 <div class="thumbnail">
                                    <a href="infoProd.php?CodigoProd='.$fila['CodigoProd'].'">
                                      <img style="width: 100%;" src="assets/img-products/'.$fila['Imagen'].'">
                                    </a>
                                   <div class="caption">
                                      <p style="font-size: 30px; font-weight: 700;"> $ '.$fila['Precio'].' .-</p>
                                      <h5>'.$fila['NombreProd'].'</h5>                                     
                                      <p class="text-center">
                                         <button value="'.$fila['CodigoProd'].'" class="btn btn-primary btn-block btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>
                                      </p>

                                   </div>
                                 </div>
                             </div>                              
            
                             ';
                    if ($nums%4==0){
                      echo '<div class="clearfix"></div>';
                    }
                    $nums++;
                      }   
                    }
                    ?>
                </div><!-- Fin del contenedor de todos los productos -->                

                
                <!-- ==================== Contenedores de categorias =============== -->
                <?php
                  $consultar_categorias= ejecutarSQL::consultar("select * from categoria");
                  $nums=1;
                  while($categ=mysql_fetch_array($consultar_categorias)){
                    echo 
                      '
                      <div role="tabpanel" class="tab-pane fade active in" id="'.$categ['CodigoCat'].'" aria-labelledby="'.$categ['CodigoCat'].'-tab">
                      ';
                      $consultar_productos= ejecutarSQL::consultar("select * from producto where CodigoCat='".$categ['CodigoCat']."' and Stock > 0");
                      $totalprod = mysql_num_rows($consultar_productos);
                      if($totalprod>0){
                        $nums=1;
                        while($prod=mysql_fetch_array($consultar_productos)){
                          echo '
                                <div class="col-md-3">
                                  <div class="thumbnail">
                                    <div class="container-img">
                                      <a href="infoProd.php?CodigoProd='.$prod['CodigoProd'].'">
                                      <img style="width: 100%;" src="assets/img-products/'.$prod['Imagen'].'">
                                      </a>
                                    </div>
                                    <div class="caption">
                                      <h2 class="price">$ '.$prod['Precio'].'</h2>
                                      <h5>'.$prod['NombreProd'].'</h5>
                                      <p class="text-center">
                                      <button value="'.$prod['CodigoProd'].'" class="btn btn-primary btn-block btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                ';    
                      if ($nums%4==0){
                        echo '<div class="clearfix"></div>';
                      }
                      $nums++;   
                             } 
                          }
                      echo '</div>'; 
                  }
                ?>
                <!-- ==================== Fin contenedores de categorias =============== -->
              </div>
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
    
</body>
</html>