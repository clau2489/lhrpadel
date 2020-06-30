<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">

    <!-- menu de navegacion horizontal -->
    <?php include './inc/navbar.php'; ?>
    <?php include './inc/nav.php'; ?>

    <div class="container p-10">
        <div class="row">
            <div class="col-md-4">
              <h1>Registro de usuarios</h1>
              <hr>
              <br>
              <h3>Al crear una cuenta con nuestra tienda podrá realizar el proceso de compra más rápidamente, manejar múltiples direcciones de envío, ver y seguir el rastro de sus pedidos y mucho más.</h3>
              <br><br><br><br>
              <p class="condiciones">Al registrarme, declaro que soy mayor de edad y acepto los Términos y condiciones y las Políticas de privacidad de LHR Padel y Mercado Pago.</p>
            </div>
            <div class="col-md-2">
              
            </div>
            <div class="col-md-6">
               <br><br>
                <div id="container-form">
                   <form class="form-horizontal FormCatElec" action="process/regclien.php" role="form" method="post" data-form="save" style="padding: 1em;">
                       <div class="form-group mb-3">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                            <input class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su número de DNI" required name="clien-nit" data-toggle="tooltip" data-placement="top" title="Ingrese su número de DNI. Solamente números y sin puntos(.)" maxlength="30">
                          </div>
                        </div>
                        <br>
                        <div class="form-group mb-3">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su nombre de usuario" required name="clien-name" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre. Máximo 9 caracteres" maxlength="9">
                          </div>
                        </div>
                        <br>
                        <div class="form-group mb-3">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input class="form-control all-elements-tooltip" type="text" placeholder="Nombre/s" required name="clien-fullname" data-toggle="tooltip" data-placement="top" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                          </div>
                        </div>
                        <br>
                        <div class="form-group mb-3">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input class="form-control all-elements-tooltip" type="text" placeholder="Apellido/s" required name="clien-lastname" data-toggle="tooltip" data-placement="top" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                          </div>
                        </div>
                        <br>
                        <div class="form-group mb-3">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                            <input class="form-control all-elements-tooltip" type="password" placeholder="Contraseña" required name="clien-pass" data-toggle="tooltip" data-placement="top" title="Defina una contraseña para iniciar sesión">
                          </div>
                        </div>
                        <br>
                        <div class="form-group mb-3">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-home"></i></div>
                            <input class="form-control all-elements-tooltip" type="text" placeholder="Dirección" required name="clien-dir" data-toggle="tooltip" data-placement="top" maxlength="100">
                          </div>
                        </div>
                        <br>
                        <div class="form-group mb-3">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                            <input class="form-control all-elements-tooltip" type="tel" placeholder="Teléfono/Celular" required name="clien-phone" maxlength="11" pattern="[0-9]{8,11}" data-toggle="tooltip" data-placement="top">
                          </div>
                        </div>
                        <br>
                        <div class="form-group mb-3">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input class="form-control all-elements-tooltip" type="email" placeholder="Correo Electrónico" required name="clien-email" data-toggle="tooltip" data-placement="top" title="Ingrese la dirección de su Email" maxlength="50">
                          </div>
                        </div>
                        <br>
                        <p><button type="submit" class="btn btn-success btn-block"><i class="fa fa-pencil"></i>&nbsp; Registrarse</button></p>
                        <div class="ResForm" style="width: 100%; color: #fff; text-align: center; margin: 0;"></div>
                    </form> 
                </div> 
            </div>
        </div>
    </div>

    <br><br>

  <?php include './inc/footer.php'; ?>
    
</body>
</html>