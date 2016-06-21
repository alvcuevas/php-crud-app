<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
</head>
<body>
	
	<div class="ui-widget">
		
		<center>
		<h2>CRUD</h2>
		<a href="#" id="nuevo">Añadir usuario</a><br><br>
		</center>

		<table class="tabla" align="center">
			<thead class="ui-widget-header">
				<tr>
					<th>ID</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Operaciones</th>
				</tr>
			</thead>
			<tbody class="ui-widget-content">
				<tr>
				<?php
					include('php/conexion.php');
					$con = conexion_db();
					$resultado = $con->query("SELECT * FROM usuarios");

					while($row = $resultado->fetch_assoc()){
						echo '<td>'.$row['id'].'</td>';
						echo '<td>'.$row['usuario'].'</td>';
						echo '<td>'.$row['nombre'].'</td>';
						echo '<td>'.$row['apellido'].'</td>';
						echo '<td>'.$row['telefono'].'</td>';
						echo '<td>'.$row['email'].'</td>';
						echo '<td><a href="#" class="editar" id="'.$row['id'].'">Editar</a> | 
								  <a href="#" class="eliminar" id="'.$row['id'].'">Eliminar</a>
							  </td></tr>';
					}
				?>
			</tbody>
		</table>

	</div>

	<div id="agregar">
		
		<p class="titulo">Todos los campos son obligatorios</p>
		
		<form id="formulario">
			<fieldset>
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" class="text ui-widget-content ui-corner-all">

				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="text ui-widget-content ui-corner-all">

				<label for="apellido">Apellido</label>
				<input type="text" name="apellido" class="text ui-widget-content ui-corner-all">

				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono" class="text ui-widget-content ui-corner-all">

				<label for="email">Email</label>
				<input type="text" name="email" class="text ui-widget-content ui-corner-all">

				<label for="password">Contraseña</label>
				<input type="text" name="password" class="text ui-widget-content ui-corner-all">
			</fieldset>
		</form>

	</div>

	<div id="editar">
		
		<p class="titulo">Todos los campos son obligatorios</p>
		
		<form id="formulario2">
			<fieldset>
				<label for="usuario">Usuario</label>
				<input type="text" id="usuario" name="usuario" class="text ui-widget-content ui-corner-all">

				<label for="nombre">Nombre</label>
				<input type="text" id="nombre" name="nombre" class="text ui-widget-content ui-corner-all">

				<label for="apellido">Apellido</label>
				<input type="text" id="apellido" name="apellido" class="text ui-widget-content ui-corner-all">

				<label for="telefono">Teléfono</label>
				<input type="text" id="telefono" name="telefono" class="text ui-widget-content ui-corner-all">

				<label for="email">Email</label>
				<input type="text" id="email" name="email" class="text ui-widget-content ui-corner-all">

				<label for="password">Nueva contraseña</label>
				<input type="text" name="password" class="text ui-widget-content ui-corner-all">
			</fieldset>
		</form>

	</div>

	<input type="hidden" id="user">

	<div id="eliminar" title="¿Confirmar el borrado?">
		<p>Este usuario será eliminado de la BBDD</p>
	</div>





	<script src="js/jquery-2.2.3.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/scripts.js"></script>
</body>
</html>