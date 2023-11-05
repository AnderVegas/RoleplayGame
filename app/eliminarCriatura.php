<?php
require_once '../persistence/conf/PersistentManager.php';
require_once '../persistence/DAO/RoleDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idCreature'])) {
        $idCreature = $_POST['idCreature'];

        $roleDAO = new RoleDAO(); // Instancia de la clase RoleDAO, ajusta esto según tu implementación.

        // Llama al método eliminarCriatura con el ID de la criatura
        $result = $roleDAO->eliminarCriatura($idCreature);

        if ($result) {
            // La eliminación fue exitosa, devuelve una respuesta de éxito al cliente
            echo 'success';
        } else {
            // Hubo un error al eliminar la criatura, puedes devolver un mensaje de error al cliente
            echo 'error';
        }
    }
}
?>
