<?php

include('conexion.php');
$con = conexion_db();
$id = $_POST['id'];

$q = "SELECT * FROM usuarios WHERE id=$id";

$resultado = $con->query($q);

$datos = array();

while($row=$resultado->fetch_assoc()){
	$datos[] = $row;
}

echo json_encode($datos); // pasarlo a tipo json para que lo interprete bien ajax

?>