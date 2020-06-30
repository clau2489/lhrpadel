<?php
include './library/configServer.php';
include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Productos</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-product">
    <?php include './inc/navbar.php'; ?>
    <?php include './inc/nav.php'; ?>
    <section id="store">
       <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3">
                  <div class="vertical-menu">
                    <?php
                      $categorias=  ejecutarSQL::consultar("select * from categoria");
                      while($cate=mysql_fetch_array($categorias)){
                          echo '
                          <a href="#'.$cate['CodigoCat'].'" tabindex="-1" role="tab" id="'.$cate['CodigoCat'].'-tab" data-toggle="tab" aria-controls="'.$cate['CodigoCat'].'" aria-expanded="false">'.$cate['Nombre'].'
                          </a>
                        ';
                      }
                    ?>
                  </div>
                </div>
                <div class="col-xs-9">
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade" id="all-product" aria-labelledby="all-product-tab">
                          <br><br>
                        <div class="row">
                          <?php
                          $consulta=  ejecutarSQL::consultar("select * from producto where Stock > 0");
                          $totalproductos = mysql_num_rows($consulta);
                          if($totalproductos>0){
                            $nums=1;
                            while($fila=mysql_fetch_array($consulta)){
                              echo '
                                  <div class="col-xs-12 col-sm-6 col-md-3">
                                       <div class="thumbnail">
                                         <a href="infoProd.php?CodigoProd='.$fila['CodigoProd'].'"><img src="assets/img-products/'.$fila['Imagen'].'"></a>
                                         <div class="caption">
                                            <p style="font-size: 30px; font-weight: 700;"> $ '.$fila['Precio'].' .-</p>
                                            <h4>'.$fila['NombreProd'].'</h4>
                                            <p>Marca: '.$fila['Marca'].'</p>
                                           
                                            <p class="text-center">
                                               <a href="infoProd.php?CodigoProd='.$fila['CodigoProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;
                                               <button value="'.$fila['CodigoProd'].'" class="btn btn-success btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>
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
                        </div>
                      </div><!-- Fin del contenedor de todos los productos -->
                      
                      <!-- ==================== Contenedores de categorias =============== -->
                      <?php
                        $consultar_categorias= ejecutarSQL::consultar("select * from categoria");
                        $nums=1;
                        while($categ=mysql_fetch_array($consultar_categorias)){
                          echo '
                            <div role="tabpanel" class="tab-pane fade active in" id="'.$categ['CodigoCat'].'" aria-labelledby="'.$categ['CodigoCat'].'-tab"><br>';
                            $consultar_productos= ejecutarSQL::consultar("select * from producto where CodigoCat='".$categ['CodigoCat']."' and Stock > 0");
                            $totalprod = mysql_num_rows($consultar_productos);
                            if($totalprod>0){
                              $nums=1;
                              while($prod=mysql_fetch_array($consultar_productos)){
                                echo '
                                      <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="thumbnail">
                                          <a href="infoProd.php?CodigoProd='.$prod['CodigoProd'].'"><img src="assets/img-products/'.$prod['Imagen'].'">
                                          </a>
                                          <div class="caption">
                                            <h3>'.$prod['Marca'].'</h3>
                                            <p>'.$prod['NombreProd'].'</p>
                                            <p>$'.$prod['Precio'].'</p>
                                            <p class="text-center">
                                            <a href="infoProd.php?CodigoProd='.$prod['CodigoProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;
                                            <button value="'.$prod['CodigoProd'].'" class="btn btn-success btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>
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
    </section>
    <?php include './inc/footer.php'; ?>
    <script>
        $(document).ready(function() {
            $('#store-links a:first').tab('show');
        });
    </script>
</body>
</html>