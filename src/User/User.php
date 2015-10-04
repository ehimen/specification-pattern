<?php

namespace Ehimen\SpecificationPattern\User;

class User
{
    
    private $id;
    
    private $name;
    
    private $created;
    
    
    public function __construct($id, $name)
    {
        $this->id      = $id;
        $this->name    = $name;
        $this->created = new \DateTime();
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
    
    
    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
    
}