<?php


include("db.php");

if (isset($_GET['save'])){
      $nombre = $_GET['nombre'];
      $precio = $_GET['precio'];
      $stock = $_GET['stock'];
      $id_categoria = $_GET['id_categoria'];

      $query = "INSERT INTO producto(nombre,precio,stock,id_categoria) VALUES ('$nombre','$precio','$stock','$id_categoria')";
      $result = mysqli_query($conn ,$query);

      if(!$result) {
         die("error debes llenar todos los campos");
      }

    $_SESSION['message'] = 'Articulo creado correctamente';
   $_SESSION['message_type'] = 'primary';

   header("Location: productos.php");

}

?>