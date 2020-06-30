<!DOCTYPE html>

<html lang="es">

<head>
  
  <title>Pedido</title>

  <!-- include de links -->
  <?php include './inc/link.php'; ?>
  
</head>

<body id="container-page-index">

  <!-- include de navbar -->
  <?php include './inc/navbar.php'; ?>

  <section id="container-pedido">

    <div class="container">
      
      <div class="page-header">

        <div class="row">
          <div class="col-md-8">
            <h1>Detalle de compra</h1>
          </div>
          <div class="col-md-4">
            <a href="index.php"><img src="assets/img/lhrpadel.png" style="width: 50px; float: right;"></a>
          </div>            
        </div>
      
      </div>
      
      <div class="row">

        <div class="col-md-8">
          
          <h4>Tu compra</h4>
            
            <?php
            
            error_reporting(E_PARSE);
            
            include 'library/configServer.php';
            
            include 'library/consulSQL.php';
            
            session_start();
            
            $suma = 0;
            
            if(isset($_GET['precio'])){
                $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
                $_SESSION['contador']++;
            }
            
            for($i = 0;$i< $_SESSION['contador'];$i++){
              
              $consulta=ejecutarSQL::consultar("select * from producto where CodigoProd='".$_SESSION['producto'][$i]."'");
                
                while($fila = mysql_fetch_array($consulta)) {
                  
                  $suma += $fila['Precio'];
                  
                  $producto = $fila['NombreProd'];
                  
                  $_SESSION['sumaTotal']=$suma;
                  echo 
                  "
                  <div class='col-md-4 text-center' style='border-style: solid;border-width: 1px; margin: 10px; border-color: #d0d0d0; border-radius: 10px; height: 100%'>

                    <img style='width: 100%' src='assets/img-products/".$fila['Imagen']."'
                    
                    <hr>

                    <div style='height: 40px'>
                      
                      <h4>".$fila['NombreProd']."</h4>
                    
                    </div>

                    <input type='number' style='font-weight: 900' class='forms-control' id='precio' value='".$fila['Precio']."' disabled>
                    
                    <p style='font-size: 10px;'>Precio por unidad: </p>
                  
                  </div>                 
                  ";
                }
              }
              echo "
              </div>
              <div class='col-md-4'>
                
                <div class='row'>
                  
                  <div class='jumbotron text-center'>
                    
                    <form action='formulario/index.php' method='post'>

                      <input class='form-control' type='hidden' name='producto' id='producto' value='". $producto ."'>
  
                      <input class='form-control' type='hidden' id='precio' name='precio' value='". $suma ."'>

                      <div class='form-group'>
                        
                        <label>Seleccionar método de envio:</label>
                        
                        <select class='form-control' id='costoenvio' name='costoenvio'>
                          
                          <option value='0'>Sin Costo | Retira en domicilio del vendedor (Acordar día y horario)</option>
                          
                          <option value='450'>$450 | Envio a domicilio a cualquier destino del país </option>
                        
                        </select>
                      
                      </div>                      
                      
                      <br><br> 
                      
                      <button type='submit' class='btn btn-success btn-xl btn-block'><i class='fa fa-check-square-o'></i> Continuar Compra </button>
                      
                      <br>          
                    
                    </form>";

              ?>
              <hr>
              
              <p>
                <a class="btn btn-danger btn-sm btn-block" href="index.php" role="button">
                  <i class="fa fa-trash"></i> Cancelar compra y volver
                </a>
              </p>
              
              <p>
                <a class="btn btn-primary btn-sm btn-block" href="index.php" role="button">
                  <i class="fa fa-undo"></i> Regresar a la tienda
                </a>
              </p>
              
              <br><br><br><br>
            
            </div>              
          
          </div>            
        
        </div>

      </div>

    </div>

  </section>

  <?php include './inc/footer.php'; ?>

</body>

</html>