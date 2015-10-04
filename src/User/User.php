<?php

namespace Ehimen\SpecificationPattern\User;

class User
{
    
    private $id;
    
    private $name;
    
    
    public function __construct($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }
    
    
    /**
     * @return int
     */
    public function getId()
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