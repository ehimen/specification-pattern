<?php

namespace Ehimen\SpecificationPattern\User\Specification;

use Ehimen\SpecificationPattern\User\User;

class NewUserSpecification implements UserSpecification
{
    
    public function isSpecifiedBy(User $user)
    {
        $diff = $user->getCreated()->diff(new \DateTime());
        return $diff->days < 1;
    }
    
}