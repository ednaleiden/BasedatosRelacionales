<?php
include("db.php");

if(isset($_GET['id_categoria'])){
	$id = $_GET['id_categoria'];
	$query = "DELETE FROM cartegoria WHERE id_categoria = $id";
	$result = mysqli_query($conn, $query);
	if(!$result ){
		die("Query failed");
	}

	$_SESSION['message'] = 'Categoria removida satisfactoriamente';
	$_SESSION['message_type'] = 'danger';
	header("Location: categorias.php");
}

?>