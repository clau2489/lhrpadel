<!DOCTYPE html>
<html lang="es">
<head>
    <title>Niu</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">

    <!-- menu de navegacion horizontal -->
    <?php include './inc/navbar.php'; ?>
    <?php include './inc/nav.php'; ?>
	<?php include './inc/carousel.php'; ?>
	<img src="assets/img/niu.jpg" width="100%">
	<div class="container-fluid p-10">
	  <div class="row">             
	      <div class="col-md-12">
	        <h2 class="text-center">Proveedor Oficial de Niu</h2>
	        <br>
	        <h4 class="text-center">¿Querés tener en tu club la pelota oficial de la Federación Argentina de Padel?<br> Completá este formulario y te contactamos</h4>
	        <br><br>
	        <div class="col-md-offset-4 col-md-4">
				<form action="/action_page.php">
				  <div class="form-group">
				    <label for="email">Nombre y Apellido:</label>
				    <input type="text" class="form-control" id="telefono">
				  </div>					
				  <div class="form-group">
				    <label for="email">Email:</label>
				    <input type="email" class="form-control" id="email">
				  </div>
				  <div class="form-group">
				    <label for="email">Teléfono:</label>
				    <input type="text" class="form-control" id="telefono">
				  </div>				  
				  <div class="form-group">
				    <label for="pwd">Mensaje:</label>
				    <textarea id="pwd" class="form-control" type="textarea" row="6"></textarea>
				  </div>
				  <button type="submit" class="btn btn-default">Enviar Mensaje</button>
				</form>	        	
	        </div>
	      </div>
	  </div>	
	</div>

	<?php include './inc/footer.php'; ?>
    
</body>
</html>