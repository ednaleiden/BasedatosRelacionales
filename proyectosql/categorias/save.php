<?php

include("db.php");

if (isset($_GET['save'])){
	$nombre = $_GET['nombre'];
	$descripcion = $_GET['descripcion'];

	$query = "INSERT INTO cartegoria(nombre,descripcion) VALUES ('$nombre','$descripcion')";
	$result = mysqli_query($conn,$query);

	if(!$result){
		die("Query failed");
	}

	
	$_SESSION['message'] = 'Categoria creada satisfactoriamente';
    $_SESSION['message_type'] = 'primary';



   header("Location: categorias.php");
}