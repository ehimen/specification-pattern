<?php

namespace Ehimen\SpecificationPattern\Account;

use Ehimen\SpecificationPattern\User\User;

class Account
{
    
    private $user;
    
    private $amount = 0;
    
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    
    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
    
    
    public function getAmount()
    {
        return $this->amount;
    }
    
    
    public function withdraw($amount)
    {
        $this->amount -= $amount;
    }
    
    
    public function deposit($amount)
    {
        $this->amount += $amount;
    }
    
}