<?php


class Track
{
    protected $id;
    protected $name;
    
     public function __construct()
    {
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}