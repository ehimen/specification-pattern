<?php

namespace Ehimen\SpecificationPattern\Account\Specification;

use Ehimen\SpecificationPattern\Account\Account;

interface AccountSpecification
{
    
    public function isSpecifiedBy(Account $account);
    
}