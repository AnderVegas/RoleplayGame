<?php

require_once(dirname(__FILE__) . '/../conf/PersistentManager.php');

abstract class GenericDAO {

  //Conexión a BD
  protected $conn = null;
  //Constructor de la clase
  public function __construct() {
    $this->conn = PersistentManager::getInstance()->get_connection();
  }

  // métodos abstractos para CRUD de clases que hereden
  abstract protected function insert($name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
  abstract protected function selectAll();
  abstract protected function selectById($idCreature);
  abstract protected function update($idCreature, $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
  abstract protected function eliminarCriatura($idCreature);

}
