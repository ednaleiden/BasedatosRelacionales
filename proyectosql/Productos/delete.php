<?php
include("db.php");

if (isset($_GET['id_producto'])){
   $id = $_GET['id_producto'];
   $query = "DELETE FROM producto WHERE id_producto = $id ";
   $result = mysqli_query($conn, $query);
   if(!$result){
      die("Query failed");
   }

   $_SESSION['message'] = 'Articulo removido satisfactoriamente';
   $_SESSION['message_type'] = 'danger';
   header("Location:productos.php");
}

?>