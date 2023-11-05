


<?php
require 'GenericDAO.php';

class RoleDAO extends GenericDAO {

  //Se define una constante con el nombre de la tabla
  const USER_TABLE = 'creature';

  public function selectAll() {
    $query = "SELECT * FROM " . RoleDAO::USER_TABLE;
    $result = mysqli_query($this->conn, $query);
    $creatures= array();
    while ($RoleBD = mysqli_fetch_array($result)) {
      $creature = array(
        'idCreature' => $RoleBD["idCreature"],
        'name' => $RoleBD["name"],
        'description' => $RoleBD["description"],
        'avatar' => $RoleBD["avatar"],
        'attackPower' => $RoleBD["attackPower"],
        'lifeLevel' => $RoleBD["lifeLevel"],
        'weapon' => $RoleBD["weapon"],
      );
      array_push($creatures, $creature);
    }
    return $creatures;
  }





  public function insert($name, $description, $avatar, $attackPower, $lifeLevel, $weapon) {
    $query = "INSERT INTO " . RoleDAO::USER_TABLE .
      " (name, description, avatar, attackPower, lifeLevel, weapon) VALUES(?,?,?,?,?,?)";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssiis', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
    return $stmt->execute();
  }

  

  // public function checkExists($email, $password) {
  //   $query = "SELECT user, password FROM " . RoleDAO::USER_TABLE . " WHERE user=? AND password=?";
  //   $stmt = mysqli_prepare($this->conn, $query);
  //   mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
  //   if(mysqli_stmt_execute($stmt)>0)
  //     return true;
  //   else
  //     return false;
  // }


  public function selectById($idCreature) {
    $query = "SELECT name, description, avatar, attackPower, lifeLevel, weapon FROM " . RoleDAO::USER_TABLE . " WHERE idCreature=?";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $idCreature);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);

    $creature = array();

    while (mysqli_stmt_fetch($stmt)) {
        $creature = array(
            'idCreature' => $idCreature,
            'name' => $name,
            'description' => $description,
            'avatar' => $avatar,
            'attackPower' => $attackPower,
            'lifeLevel' => $lifeLevel,
            'weapon' => $weapon
        );
    }

    return $creature;
}


public function update($idCreature, $name, $description, $avatar, $attackPower, $lifeLevel, $weapon) {
  $query = "UPDATE " . RoleDAO::USER_TABLE .
      " SET name=?, description=?, avatar=?, attackPower=?, lifeLevel=?, weapon=?"
      . " WHERE idCreature=?";
  $stmt = mysqli_prepare($this->conn, $query);
  mysqli_stmt_bind_param($stmt, 'sssiisi ', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon, $idCreature);

  if ($stmt) {
      if ($stmt->execute()) {
          return true;
      } else {
          echo "Error al ejecutar la consulta: " . mysqli_error($this->conn);
      }
  } else {
      echo "Error al preparar la consulta: " . mysqli_error($this->conn);
  }

  return false;
}



  public function eliminarCriatura($idCreature) {
    $query = "DELETE FROM " . RoleDAO::USER_TABLE . " WHERE idCreature =?";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $idCreature);
    return $stmt->execute();

    
  }


public function mostrarCriatura($idCreature, $name, $description, $avatar) {
  echo '<td width = "33%">';
  echo '<div>';
  echo '<h2>' . $name . '</h2>';
  echo '<table>';
  echo '<td>';
  echo '<img src="' . $avatar . '" alt="Avatar">';
  echo '</td>';
  echo '<td>';
  echo '<p>' . $description . '</p>';
  echo '</td>';
  echo '</table>';

  // Pagina de detalle
  echo '<form action="app/detalleCriatura.php" method="get">';
  echo '<input type="hidden" name="idCreature" value="' . $idCreature . '">';
  echo '<button type="submit" style="margin: 5px;" class="btn btn-primary">Más información</button>';
  echo '</form>';

  // Agrega un formulario para modificar
  echo '<form action="app/modificarCriatura.php" method="post">';
  echo '<input type="hidden" name="idCreature" value="' . $idCreature . '">';
  echo '<button type="submit" style="margin: 5px;" class="btn btn-secondary">Modificar</button>';
  echo '</form>';

  // Agrega un formulario para eliminar
  echo '<form action="index.php" method="post">';
  echo '<input type="hidden" name="idCreature" value="' . $idCreature . '">';
  echo '<button type="submit" style="margin: 5px;" class="btn btn-danger" name="eliminarCriatura">Exterminar</button>';
  echo '</form>';
  
  echo '</div>';
  echo '</td>';
}




}

?>
