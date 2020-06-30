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
    <section id="infoproduct">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <a href="index.php"><h4>Volver al Catálogo de Productos</h4></a>
                    </div>
                </div>
                <?php 
                    $CodigoProducto=$_GET['CodigoProd'];
                    $productoinfo=  ejecutarSQL::consultar("select * from producto where CodigoProd='".$CodigoProducto."'");
                    while($fila=mysql_fetch_array($productoinfo)){
                        echo '
                            
                            <div class="row box">
                                <div class="col-md-6" id="lupa">
                                    <img style="width: 100%;" src="assets/img-products/'.$fila['Imagen'].'">
                                
                                </div>
                                <div class="col-md-6">
                                    <p>Información de producto</p>
                                    <h4 style="font-size: 40px; font-weight: 700;">'.$fila['NombreProd'].'</h4>
                                    <h4 style="font-size: 30px; font-weight: 700;">$ '.$fila['Precio'].'.-</h4>
                                    
                                    <br>
                                    <p>Stock Disponible</p>                       
                                    <h4><strong>Modelo: </strong>'.$fila['Modelo'].'</h4><br>
                                    <h4><strong>Marca: </strong>'.$fila['Marca'].'</h4>
                                    <br>
                                    <p>Compra Protegida con Mercado Pago</p>
                                    <p>Garantía de fábrica</p>
                                    <br>
                                    <img src="assets/img/forma_pago.jpg" width="100%">
                                    <hr>                                     
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="index.php" class="btn btn-lg btn-primary btn-block"><i class="fa fa-mail-reply"></i> Regresar a la tienda
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <button value="'.$fila['CodigoProd'].'" class="btn btn-lg btn-success btn-block botonCarrito"><i class="fa fa-shopping-cart"></i> Añadir al carrito
                                            </button>
                                        </div>   
                                    </div>                               
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>
            <br><br> 
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>