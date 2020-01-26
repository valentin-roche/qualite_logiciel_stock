<?php

class Rayon
{
    private $id;
    private $name;
    private $respo;

    public function __construct() {}

    public function createSimple($name, $respo)
    {
        $this->name = $name;
        $this->respo = $respo;
    }

    /**
     * Initialize
     * @param $id
     * @param $name
     * @param $respo
     */
    public function create($id, $name, $respo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->respo = $respo;
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

    /**
     * @return mixed
     */
    public function getRespo()
    {
        return $this->respo;
    }

    /**
     * @param mixed $respo
     */
    public function setRespo($respo)
    {
        $this->respo = $respo;
    }

}
