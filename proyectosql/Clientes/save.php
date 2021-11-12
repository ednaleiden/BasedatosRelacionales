<?php

include("db.php");

if(isset($_GET['save'])){
      $nombre= $_GET['nombre'];
      $apellido= $_GET['apellido'];
      $direccion= $_GET['direccion'];
      $telefono= $_GET['telefono'];
      $correo= $_GET['correo'];

      $query = "INSERT INTO cliente(nombre,apellido,direccion,telefono,correo)VALUES('$nombre','$apellido','$direccion','$telefono','$correo')";
      $result = mysqli_query($conn ,$query);


      if(!$result) {
         die("error debes llenar todos los campos");
      }
 
    $_SESSION['message'] = 'Cliente creado correctamente';
   $_SESSION['message_type'] = 'primary';
 
   header("Location: clientes.php");


}



?>