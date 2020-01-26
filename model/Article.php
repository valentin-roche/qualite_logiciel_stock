<?php
class Article
{
    private $id;
    private $name;
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
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    private $description;
  
    public function create($id_param, $name, $description) {
        $this->id = $id_param;
        $this->name = $name;
        $this->description = $description;
    }
  
    public function createSimple($name, $description) {
      $this->setName($name);
      $this->setDescription($description);
    }
  
    public function __construct() {}
}