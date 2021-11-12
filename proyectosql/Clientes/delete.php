<?php
include("db.php");


if(isset($_GET['id_cliente'])){
      $id= $_GET['id_cliente'];
      $query = "DELETE FROM cliente WHERE id_cliente = $id ";
      $result =  mysqli_query($conn, $query);
      if (!$result) {	
      die("Hubo un error al intentar eliminar"); 
      }

      $_SESSION['message']='El cliente se ha eliminado correctamente';

      $_SESSION['message_type']='danger';

      header("Location:clientes.php");



}

?>