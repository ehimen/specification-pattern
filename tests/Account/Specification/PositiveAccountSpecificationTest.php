<?php

namespace Ehimen\Tests\SpecificationPattern\Account\Specification;

use Ehimen\SpecificationPattern\Account\Account;
use Ehimen\SpecificationPattern\Account\Specification\PositiveAccountSpecification;

class PositiveAccountSpecificationTest extends AccountSpecificationTestCase
{
    
    public function testInitialisable()
    {
        $this->assertInstanceOf(PositiveAccountSpecification::class, $this->getTestSpecification());
    }
    
    
    /**
     * @dataProvider provideIsSpecifiedByExpectations
     */
    public function testIsSpecifiedBy($amount, $isSpecifiedBy)
    {
        $account       = $this->getMockAccount($amount);
        $specification = $this->getTestSpecification();
        $this->assertSame($isSpecifiedBy, $specification->isSpecifiedBy($account));
    }
    
    
    public function provideIsSpecifiedByExpectations()
    {
        return [
            [-50, false],
            [-10, false],
            [-1, false],
            [0, true],
            [1, true],
            [10, true],
            [50, true],
        ];
    }
    
    
    private function getTestSpecification(Account $account = null)
    {
        $account = $account ?: $this->getMockAccount();
        return new PositiveAccountSpecification($account);
    }
    
}