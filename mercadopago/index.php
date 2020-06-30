<?php
ini_set('display_errors', '1');

  require_once ('lib/mercadopago.php');
  $mp = new MP("3424845198474304", "GQ3OBRA0DGQ6TIrO1pmmQ9Dauwbg2ilw");   
  $mp->sandbox_mode(TRUE);

  $valor = $_POST['preciofinal'];
  $producto = $_POST['producto'];

  $preference_data = array (
    "items" => array(
         array(
           "title" => $producto,
           "quantity" => 1,
           "currency_id" => "ARS",
           "unit_price" => floatval(number_format((float)str_replace(",",".",$valor), 2, '.', ''))
         )
    )
  );
      
  $preference = $mp->create_preference($preference_data); 
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Pedido</title>
  </head>
  <body>
    <section>
        <div style="text-align: center">
          <div class="row text-center">
            <div class="col-md-8">
              <a href="<?php echo $preference['response']['init_point']; ?>" name="MP-Checkout" mp-mode="redirect" id="boton"></a>              
            </div>
          </div>          
        </div>
    </section> 
    <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
    <script type="text/javascript">

      function execute_my_onreturn (json) {
        if (json.collection_status=="approved"){
        document.getElementById("ESTADO_MP").value = "APPROVED";
        } else if(json.collection_status=="pending"){
        document.getElementById("ESTADO_MP").value = "PENDING";
        } else if(json.collection_status=="in_process"){    
        document.getElementById("ESTADO_MP").value = "IN_PROCESS";
        } else if(json.collection_status=="rejected"){
        document.getElementById("ESTADO_MP").value = "REJECTED";
        } else if(json.collection_status==null){
        document.getElementById("ESTADO_MP").value = "NULL";
        }
      }
    </script>
    <script type="text/javascript">
      document.getElementById("boton").click();
    </script>
  </body>
</html>