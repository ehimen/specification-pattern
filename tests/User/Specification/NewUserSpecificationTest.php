<?php

namespace Ehimen\Tests\SpecificationPattern\User\Specification;

use Ehimen\SpecificationPattern\User\Specification\NewUserSpecification;
use Ehimen\SpecificationPattern\User\User;

class NewUserSpecificationTest extends \PHPUnit_Framework_TestCase
{
    
    public function testInitialisable()
    {
        $this->assertInstanceOf(NewUserSpecification::class, $this->getTestSpecification());
    }
    
    
    /**
     * @dataProvider provideIsSpecifiedByExpectations
     */
    public function testIsSpecifiedBy($date, $isSpecifiedBy)
    {
        $user          =  $this->getMockUser($date);
        $specification = $this->getTestSpecification();
        $this->assertSame($isSpecifiedBy, $specification->isSpecifiedBy($user));
    }
    
    
    public function provideIsSpecifiedByExpectations()
    {
        return [
            [new \DateTime('@' . (time() - (86400 * 2) - 3600)), false],  // Two days ago (ish).
            [new \DateTime('@' . (time() - 86400 - 3600)), false],      // One day ago (ish).
            [new \DateTime('@' . (time() - 86400)), false],             // One day ago (exactly).
            [new \DateTime('@' . (time() - 60)), true],                 // Very recently.
            [new \DateTime('@' . (time() - 0)), true],                  // Pretty much now.
        ];
    }
    
    
    /**
     * @return NewUserSpecification
     */
    public function getTestSpecification()
    {
        return new NewUserSpecification();
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
            ->method('getCreated')
            ->willReturn($created);
        
        return $user;
    }
    
}