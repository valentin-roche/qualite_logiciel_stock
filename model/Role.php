<?php

/**
 * Role class
 */
class Role
{
  private $id;
  private $name;

  function __construct() {}

  public function create($id, $name) {
    $this->setId($id);
    $this->setName($name);
  }

  /**
   * @return mixed
   */
  public function getId()
  {
      return $this->id;
  }
  /**
   * @param mixed $id
   */
  public function setId($id)
  {
      $this->id = $id;
  }
  /**
   * @return mixed
   */
  public function getName()
  {
      return $this->name;
  }
  /**
   * @param mixed $name
   */
  public function setName($name)
  {
      $this->name = $name;
  }

}
?>
