<?php
/**
 * @title: Role Play Game
 * @description:  Juega ya
 *
 * @version    0.1
 *
 * @author Ander Vegas
 */

require_once '../templates/header.php';
require_once '../persistence/conf/PersistentManager.php';
require_once '../persistence/DAO/RoleDAO.php';


if (isset($_POST['idCreature'])) {
    $idCreature = $_POST['idCreature'];
    echo "ID de la criatura a modificar: " . $idCreature; // Para verificar que $idCreature se obtenga correctamente

    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['avatar']) && isset($_POST['attackPower']) && isset($_POST['lifeLevel']) && isset($_POST['weapon'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $avatar = $_POST['avatar'];
        $attackPower = $_POST['attackPower'];
        $lifeLevel = $_POST['lifeLevel'];
        $weapon = $_POST['weapon'];

        $role_dao = new RoleDAO();
        if ($role_dao->update($idCreature, $name, $description, $avatar, $attackPower, $lifeLevel, $weapon)) {
            $error = "<span class='success'>Actualizado correctamente</span><br><br>";

            // Redirige a index.php
            header('Location: ../index.php');
            exit; 
        } 
    }
} 




?>


<div class="container">
    <h2 class="mt-3">Formulario de Modificación de Criatura</h2>

        <form action="modificarCriatura.php" method="post" id="editCreatureForm" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar (imagen):</label>
                <input type="text" class="form-control" id="avatar" name="avatar" required>
            </div>

            <div class="mb-3">
                <label for="attackPower" class="form-label">Poder de Ataque:</label>
                <input type="number" class="form-control" id="attackPower" name="attackPower" required>
            </div>

            <div class="mb-3">
                <label for="lifeLevel" class="form-label">Nivel de Vida:</label>
                <input type="number" class="form-control" id="lifeLevel" name="lifeLevel" required>
            </div>

            <div class="mb-3">
                <label for="weapon" class="form-label">Arma:</label>
                <input type="text" class="form-control" id="weapon" name="weapon" required>
            </div>

            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
        
    </div>
</body>
</html> 