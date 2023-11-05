<?php
require_once '../templates/header.php';
require_once '../persistence/conf/PersistentManager.php';
require_once '../persistence/DAO/RoleDAO.php';

if (isset($_GET['idCreature'])) {
    $idCreature = $_GET['idCreature'];

    $role_dao = new RoleDAO();
    $creature = $role_dao->selectById($idCreature);

    if ($creature) {
        echo '<div class="container">';
        echo '<h2>Detalle de la Criatura</h2>';
        echo '<table>';
        echo '<tr><th width="10%" >ID</th><td>' . $creature['idCreature'] . '</td></tr>';
        echo '<tr><th width="10%" >Nombre</th><td>' . $creature['name'] . '</td></tr>';
        echo '<tr><th width="10%" >Descripción</th><td>' . $creature['description'] . '</td></tr>';
        echo '<tr><th width="10%" >Avatar</th><td><img src="../' . $creature['avatar'] . '" alt="Avatar"></td></tr>';
        echo '<tr><th width="10%" >Poder de Ataque</th><td>' . $creature['attackPower'] . '</td></tr>';
        echo '<tr><th width="10%" >Nivel de Vida</th><td>' . $creature['lifeLevel'] . '</td></tr>';
        echo '<tr><th width="10%" >Arma</th><td>' . $creature['weapon'] . '</td></tr>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<div class="container">';
        echo '<h2>Detalle de la Criatura</h2>';
        echo '<p>Criatura no encontrada.</p>';
        echo '</div>';
    }
}
?>
</body>
</html>
