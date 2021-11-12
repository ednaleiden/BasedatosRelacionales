<?php
include("db.php");

if (isset($_GET['num_detalle'])){
   $id = $_GET['num_detalle'];
   $query = "DELETE FROM detalle WHERE num_detalle = $id ";
   $result = mysqli_query($conn, $query);
   if(!$result){
      die("Query failed");
   }

   $_SESSION['message'] = 'Detalle removido satisfactoriamente';
   $_SESSION['message_type'] = 'danger';
   header("Location:detalle.php");
}

?>