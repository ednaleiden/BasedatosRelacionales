<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar categorias</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="../style.css">
</head>
<body>
	 <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    
    <a class="navbar-brand" href="index.php"  ><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-braces " viewBox="0 0 16 16">
      <path d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6zM13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6z"/>
    </svg>
     
      Catalogo de categorias
    </a>
 
  </div>
</nav>

<?php
	include("db.php");

	if(isset($_GET['id_categoria'])){
		$id = $_GET['id_categoria'];
		$query = "SELECT * FROM cartegoria WHERE id_categoria = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			$nombre = $row['nombre'];
			$descripcion = $row['descripcion'];
		}
	}

	if(isset($_POST['update'])){
		$id = $_GET['id_categoria'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];

		$query = "UPDATE cartegoria set nombre = '$nombre',descripcion = '$descripcion' WHERE id_categoria = $id ";
		mysqli_query($conn,$query);
		 $_SESSION['message'] = 'Categoria guardada satisfactoriamente';
      	 $_SESSION['message_type'] = 'info';
         header("Location: categorias.php");
	}
	?>

<div class="container p-4">
	<div class="row">
		 <div class="col-md-4 mx-auto">
		<div class="card card-body card text-dark">
			<form action="edit.php?id_categoria=<?php echo $_GET["id_categoria"]; ?>" method="POST">
				<div class="from-group">
					<input type="text" name="title" value="<?php echo $id;?>" class="form-control" placeholder="Id categoria" disabled>
				</div>
				<div class="from-group">
					<input type="text" name="nombre" value="<?php echo $nombre;?>" class="form-control" placeholder="Nombre de la categoria">
				</div>
				<div class="from-group">
					<input type="text" name="descripcion" value="<?php echo $descripcion;?>" class="form-control" placeholder="Descripcion del producto">
				</div>
				 <div align="center" class="form-group">
             <button  class="btn btn-success mt-2" name="update">Actualizar</button>
             </div>
			</form>
		</div>
	</div>
	</div>
</div>
</body>
</html>l