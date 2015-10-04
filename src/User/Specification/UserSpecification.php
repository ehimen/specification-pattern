<?php

namespace Ehimen\SpecificationPattern\User\Specification;

use Ehimen\SpecificationPattern\User\User;

interface UserSpecification
{
    
    public function isSpecifiedBy(User $user);
    
}