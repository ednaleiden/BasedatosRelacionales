<?php

include("db.php");

if (isset($_GET['save'])){
    $cliente = $_GET['id_cliente'];
    $fecha = $_GET['fecha'];

    $query = "INSERT INTO factura(id_cliente,fecha) VALUES ('$cliente','$fecha')";
    $result = mysqli_query($conn,$query);

    if (!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Factura creada correctamente';
    $_SESSION['message_type'] = 'primary';
    header("Location: index.php");

}
?>