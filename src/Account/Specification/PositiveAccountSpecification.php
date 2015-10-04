<?php

namespace Ehimen\SpecificationPattern\Account\Specification;

use Ehimen\SpecificationPattern\Account\Account;

class PositiveAccountSpecification implements AccountSpecification
{
    
    public function isSpecifiedBy(Account $account)
    {
        return $account->getAmount() >= 0;
    }
    
}