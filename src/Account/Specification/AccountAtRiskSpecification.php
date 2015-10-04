<?php

namespace Ehimen\SpecificationPattern\Account\Specification;
use Ehimen\SpecificationPattern\Account\Account;
use Ehimen\SpecificationPattern\User\Specification\NewUserSpecification;

/**
 * An account is considered at risk if it has a negative amount and the user is new.
 */
class AccountAtRiskSpecification implements AccountSpecification
{
    
    public function isSpecifiedBy(Account $account)
    {
        $userSpec    = new NewUserSpecification();
        $accountSpec = new PositiveAccountSpecification();
        
        return ($userSpec->isSpecifiedBy($account->getUser()) && $accountSpec->isSpecifiedBy($account));
    }
    
}