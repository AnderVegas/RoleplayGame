<?php
$current_page = $_SERVER['PHP_SELF'];

// Verifica si la página actual es 'index.php'
if (basename($current_page) === 'index.php') {
    $ruta_prefix = ''; // No se agrega '../' al principio
} else {
    $ruta_prefix = '../'; // Se agrega '../' al principio
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
  .navbar {
    background-color: #282b2b ;
  }
  .yo{
    color: white;
  }
  #tituloImagen {
    width: 120px;
    margin-left: 20px;
    }
  a {
      text-decoration: none;
    }
  #pantallaRol{
    margin-top: 20px; 
  }  
  table {
        border-collapse: collapse; /* Combine border lines for a cleaner look */
        width: 100%; /* Optional: Set the table width */
    }

    td, th {
        border: 1px solid black; /* Add a 1-pixel solid black border to table cells */
        padding: 8px; /* Add some padding for spacing within cells */
    }

    #divPrincipal{
        margin-left: 50px;
        margin-right: 50px;
    }

    #tercerTd{
        height: 180px;  
    }

  </style>
  
  
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?php echo $ruta_prefix; ?>index.php"><img id="tituloImagen" src="<?php echo $ruta_prefix; ?>Imagenes/TituloROL.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="yo" aria-current="page" href="<?php echo $ruta_prefix; ?>app/crearCriatura.php">Crear una criatura</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

