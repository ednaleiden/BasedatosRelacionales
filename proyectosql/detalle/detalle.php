<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
     <link rel="shortcut icon" href="../ic.ico">

    <title>Detalle</title>
  </head>
  <body>
   <nav class="navbar navbar-light bg-light " >
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 ">
             <li class="nav-item text-center" >
              <a class="nav-link active" aria-current="page" href="../categorias/categorias.php">Categoria</a>
            </li>
            <li class="nav-item text-center" >
              <a class="nav-link active" aria-current="page" href="../productos/Productos.php">Productos</a>
            </li>
           
            <li class="nav-item text-center" >
              <a class="nav-link active" aria-current="page" href="../clientes/clientes.php">Cliente</a>
            </li>
            <li class="nav-item text-center" >
              <a class="nav-link active" aria-current="page" href="../factura/index.php">Factura</a>
            </li>
            
            <li class="nav-item dropdown text-center">
              <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Descarga de detalle
              </a>
              <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                 <li><a class="dropdown-item" href="detalle.php">Detalle</a></li>
                <li><a class="dropdown-item" href="http://localhost/proyectosql/fpdf/ " target="_blank">Descargar PDF </a></li>
              </ul>
            </li>
          </ul>
          
        </div>
      </div>
      <a class="navbar-brand" href="../categorias/categorias.php"  ><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-braces " viewBox="0 0 16 16">
        <path d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6zM13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6z"/>
      </svg>
      
        Detalle
      </a>
      <form class="d-flex">
        <input class="form-control me-3" type="search" name= "busqueda" placeholder="Escribe..." aria-label="Search">
        <button class="btn btn-outline-success" name="enviar" type="submit">Buscar</button>
      </form>
    
    </div>
    
  </nav>

<?php include("db.php")?>

<div class="container p-4">
   <div class="row">
<div class="col-md-4">



   <?php if(isset($_SESSION['message'])) { ?>
         <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
         <?= $_SESSION['message'] ?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>

       <?php session_unset();} ?>

<div class="card card-body ">
         <form action="save.php" method="GET">
            <div class="from-group">
               <input type="text" name="num_factura" class="form-control" placeholder="Número de Factura" 
               autofocus>
            </div>
            <div class="from-group mt-3">
               <input type="number" name="catidad" class="form-control" placeholder="Cantidad de artículos" 
               autofocus>
            </div>

            <div class="from-group mt-3">
               <input type="text" name="precio" class="form-control" placeholder="$ Precio de artículos" 
               autofocus>
            </div>

            <div class="from-group mt-3">
               <input type="number" name="id_producto" class="form-control" placeholder="Número de productos" 
               autofocus>
            </div>

            <input type="submit" class="btn btn-success btn-block mt-3" name="save" value="Guardar">
         </form>
      </div>
      
   </div>


  <div class="col-md-8">

    <table class="table table-dark table-striped">
      <thead>
        <th>
          #  Detalle
        </th>
        <th>
          # Factura
        </th>
        <th>
          Cantidad
        </th>
        <th>
          Precio
        </th>
        <th>
          ID de Producto
        </th>
        <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $quey= "SELECT * FROM detalle";
        $result_detalle=mysqli_query($conn,$quey);
        while ($row=mysqli_fetch_array($result_detalle)) {?>

          <tr>
            <td><?php echo $row['num_detalle']?></td>

            <td><?php echo $row['num_factura']?></td>

            <td><?php echo $row['catidad']?></td>

            <td><?php echo $row['precio']?></td>

            <td><?php echo $row['id_producto']?></td>

            <td>
              <a href="edit.php?num_detalle=<?php echo $row['num_detalle']?>"
                   class="btn btn-secondary" data-bs-toggle="tooltip" title="Editar">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                     <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                     </svg>
                   </a>
                   <a href="delete.php? num_detalle=<?php echo $row['num_detalle']?>"
                   class="btn btn-danger"data-bs-toggle="tooltip" title="Eliminar">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                     <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                     </svg>
                  </a>
            </td>

          </tr>

          <?php } ?>

      </tbody>

    </table>
<?php
       $busqueda;
       if(isset($_GET['enviar'])){
          $busqueda = $_GET['busqueda'];
 
        $consulta = $conn->query("SELECT * FROM detalle WHERE num_detalle LIKE '%$busqueda%' OR  catidad LIKE '%$busqueda%'");
 
       while($row = $consulta->fetch_array()) {  ?>
 
        <table class="table table-light table-striped">
           <thead >
              <th>
          Número de Detalle
        </th>
        <th>
          Número de Factura
        </th>
        <th>
          Cantidad
        </th>
        <th>
          Precio
        </th>
        <th>
          ID de Producto
        </th>
        </tr>
            </thead>
            <tbody>
              <td><?php echo $row['num_detalle'] ?></td>
              <td><?php echo $row['num_factura'] ?></td>
              <td><?php echo $row['catidad'] ?></td>
              <td><?php echo $row['precio'] ?></td>
              <td><?php echo $row['id_producto'] ?></td>
            </tbody>
        </table>
       
       <?php }
       } 
       ?>

</div>
</div>
</div>
</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>