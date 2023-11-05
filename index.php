<?php
/**
 * @title: Role Play Game
 * @description:  Juega ya
 *
 * @version    0.1
 *
 * @author Ander Vegas
 */

include 'templates\header.php';
require_once 'persistence/conf/PersistentManager.php';
require_once 'persistence/DAO/RoleDAO.php';



?>


<div id="divPrincipal">

<table>

    <tr>
        <td rowspan="2"><img src="Imagenes/PantallaROL.png" id="pantallaRol" width="900px"></td>
        <td >
            <h1 style="margin-left: 40px;">Comunidad de usuarios de Heroes</h1>
            <p style="margin-left: 40px;">La aventura comienza aqui, en tu navegador</p>
            <div style="margin-left: 30px;">
            <button type="button" class="btn btn-primary btn-lg mx-2" href="#" id="search-link">Juega ahora!</button>
            </div>
        </td>
    </tr>
    <tr>
        <td id="tercerTd" ></td>
    </tr>


</table>


<hr>

<div id="divPrincipal">
    <table>
    <?php

    require_once 'persistence/conf/PersistentManager.php';
    require_once 'persistence/DAO/RoleDAO.php';

    if (isset($_POST['idCreature'])) {

        $idCreature = $_POST['idCreature'];
        
        // Llama a la función eliminarCriatura
        $roleDAO = new RoleDAO(); // Asegúrate de que tengas una instancia válida de RoleDAO
    $result = $roleDAO->eliminarCriatura($idCreature);

    if ($result) {
        // La criatura se eliminó correctamente, puedes redirigir o mostrar un mensaje de éxito
    } else {
        // Hubo un error al eliminar la criatura, muestra un mensaje de error
    }
        // La criatura se eliminó correctamente, puedes redirigir o mostrar un mensaje de éxito
    } 
    


    


 
    $roleDAO = new RoleDAO(); // Instancia de la clase RoleDAO, ajusta esto según tu implementación.

    $creatures = $roleDAO->selectAll();     

    $count = 0;

    foreach ($creatures as $creature) {
        if ($count === 0) {
            echo '<tr>';
        }

        $roleDAO->mostrarCriatura(
            $creature['idCreature'],
            $creature['name'],
            $creature['description'],
            $creature['avatar']
        );

        if ($count === 3) {
            echo '</tr>';
        }

        $count++;

        if($count === 3){
            $count = 0;
        }
    }




?>

    </table>
</div>
    
</body>
</html>


<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #282b2b;
        }
        .yo {
            color: white;
        }
        #tituloImagen {
            width: 120px;
            margin-left: 20px;
        }
        a {
            text-decoration: none;
        }
        #pantallaRol {
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid black;
            padding: 8px;
        }

        #divPrincipal {
            margin-left: 20px;
            margin-right: 20px;
        }

        #tercerTd {
            min-height: 180px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img id="tituloImagen" src="Imagenes/TituloROL.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="yo" aria-current="page" href="#">Crear una criatura</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="divPrincipal" class="container">
    <table>
        <tr>
            <td rowspan="2"><img src="Imagenes/PantallaROL.png" id="pantallaRol" class="img-fluid"></td>
            <td>
                <h1 class="mt-2 mt-lg-0">Comunidad de usuarios de Heroes</h1>
                <p>La aventura comienza aquí, en tu navegador</p>
                <div class="mt-2">
                    <button type="button" class="btn btn-primary btn-lg" href="#" id="search-link">Juega ahora!</button>
                </div>
            </td>
        </tr>
        <tr>
            <td id="tercerTd"></td>
        </tr>
    </table>
    <hr>
</div>
</body>
</html> -->
