<?php

function conexion_db(){

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'crud';

	$mysql = @new mysqli($host,$user,$pass,$db);

	if(mysqli_connect_errno()){
		printf(error_db_connect());
		exit();
	}

	return $mysql;

}















?>