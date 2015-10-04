<?php

namespace Ehimen\Tests\SpecificationPattern\Account\Specification;

use Ehimen\SpecificationPattern\Account\Account;

abstract class AccountSpecificationTestCase extends \PHPUnit_Framework_TestCase
{
    
    /**
     * @return Account
     */
    protected function getMockAccount($amount = 0)
    {
        $account = $this->getMockBuilder(Account::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $account->expects($this->any())
            ->method('getAmount')
            ->willReturn($amount);
        
        return $account;
    }
    
}