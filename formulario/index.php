<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="utf-8"/>
<title>Formulario</title>
<link href="styles.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400' rel='stylesheet' type='text/css'>
</head>

<body>

<?php
	$producto = $_POST['producto'];
	$importe = $_POST['precio'];
	$costo = $_POST['costoenvio'];
	if ($costo == 0) {
		$metododeeenvio = "Retira en domicilio del vendedor";
	}else{
		$metododeeenvio = " Envio a domicilio";
	}
	$costoenvio = $_POST['costoenvio'];
	$preciofinal = $importe + $costoenvio;
?>


<!-- formulario de contacto -->
	
	<form action="envia.php" method="post" class="form-consulta">

		<img src="../assets/img/lhrpadel.png" style="width: 70px;">

		<br><br>

		<h4>Enviale tus datos al vendedor</h4>

		<input type="hidden" name="producto" id="producto" value="<?php echo $producto ?>" class="campo-form">

		<input type="hidden" name="producto" id="producto" value="<?php echo $producto ?>" class="campo-form">

		<input type="hidden" name="metodo" id="metodo" value="<?php echo $metododeeenvio ?>" class="campo-form">
		
		<label>Total a pagar:
			<input type="text" name="preciofinal" id="precio" placeholder="$ <?php echo $preciofinal ?>" class="campo-form">
		</label>

		<label>
			<input type="hidden" name="total" id="total" value="<?php echo $preciofinal ?>" class="campo-form">
		</label>

		<label>Nombre y apellido: <span>*</span>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre y apellido" class="campo-form" required>
		</label>

		<label>Dirección: <span>*</span>
			<input type="text" name="direccion" id="direccion" placeholder="Dirección" class="campo-form" required>
		</label>

		<label>Telefono: <span>*</span>
			<input type="text" name="telefono" id="telefono" placeholder="Telefono" class="campo-form" required>
		</label>
		
		<label>Email: <span>*</span>
			<input type="email" name="email" id="email" placeholder="Email" class="campo-form" required>
		</label>
		<br><br>
		<input type="submit" value="Continuar" class="btn-form">
	</form>

<!-- formulario -->

</body>
</html>