<?php
include("db.php");

if (isset($_GET['num_factura'])){
   $id = $_GET['num_factura'];
   $query = "DELETE FROM factura WHERE num_factura = $id ";
   $result = mysqli_query($conn, $query);
   if(!$result){
      die("Query failed");
   }


     $_SESSION['message'] = 'Articulo removido satisfactoriamente';
    $_SESSION['message_type'] = 'danger';
     header("Location:index.php");
}
?>