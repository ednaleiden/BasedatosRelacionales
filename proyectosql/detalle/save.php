<?php


include("db.php");

if (isset($_GET['save'])){
      $num_factura = $_GET['num_factura'];
      $catidad = $_GET['catidad'];
      $precio = $_GET['precio'];
      $id_producto = $_GET['id_producto'];

      $query = "INSERT INTO detalle(num_factura,catidad,precio,id_producto) VALUES ('$num_factura','$catidad','$precio','$id_producto')";
      $result = mysqli_query($conn ,$query);

      if(!$result) {
         die("error debes llenar todos los campos");
      }

    $_SESSION['message'] = 'Detalle creado correctamente';
   $_SESSION['message_type'] = 'primary';

   header("Location: detalle.php");

}

?>