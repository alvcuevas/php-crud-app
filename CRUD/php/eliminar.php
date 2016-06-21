<?php

include('conexion.php');
$con = conexion_db();

$id = $_POST['id']; //recojo la id enviada por ajax

$q = "DELETE FROM usuarios WHERE id=$id";
$con->query($q);

?>