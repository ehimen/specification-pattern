<?php

namespace Ehimen\Tests\SpecificationPattern\Account\Specification;

use Ehimen\SpecificationPattern\Account\Specification\AccountAtRiskSpecification;
use Ehimen\SpecificationPattern\User\User;

class AccountAtRiskSpecificationTest extends AccountSpecificationTestCase
{
    
    public function testInitialisable()
    {
        $this->assertInstanceOf(AccountAtRiskSpecification::class, $this->getTestSpecification());
    }
    
    
    /**
     * @dataProvider provideIsSpecifiedByExpectations
     */
    public function testIsSpecifiedBy($created, $amount, $isSpecifiedBy)
    {
        $user          = $this->getMockUser($created);
        $account       = $this->getMockAccount($amount, $user);
        $specification = $this->getTestSpecification();
        
        $this->assertSame($isSpecifiedBy, $specification->isSpecifiedBy($account));
    }
    
    
    public function provideIsSpecifiedByExpectations()
    {
        $twoDaysAgo       = new \DateTime('@' . (time() - (86400 * 2) - 3600));
        $oneDayAgo        = new \DateTime('@' . (time() - 86400 - 3600));
        $oneDayAgoPrecise = new \DateTime('@' . (time() - 86400));
        $oneMinuteAgo     = new \DateTime('@' . (time() - 60)); 
        $now              = new \DateTime('@' . (time() - 0));
        
        return [
            [$twoDaysAgo, -10, false],
            [$twoDaysAgo, 0, false],
            [$twoDaysAgo, 10, false],
            [$oneDayAgo, -10, false],
            [$oneDayAgo, 0, false],
            [$oneDayAgo, 10, false],
            [$oneDayAgoPrecise, -10, false],
            [$oneDayAgoPrecise, 0, false],
            [$oneDayAgoPrecise, 10, false],
            [$oneMinuteAgo, -10, true],
            [$oneMinuteAgo, 0, false],
            [$oneMinuteAgo, 10, false],
            [$now, -10, true],
            [$now, 0, false],
            [$now, 10, false],
        ];
    }
    
    
    /**
     * @return AccountAtRiskSpecification
     */
    private function getTestSpecification()
    {
        return new AccountAtRiskSpecification();
    }
    
    
    /**
     * @return User
     */
    private function getMockUser(\DateTime $created = null)
    {
        $user = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $user->expects($this->any())
            ->method($created)
            ->willReturn($created);
        
        return $user;
    }
    
}