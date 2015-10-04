<?php

namespace Ehimen\Tests\SpecificationPattern\User;

use Ehimen\SpecificationPattern\User\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    
    public function testInitialisable()
    {
        $this->assertInstanceOf(User::class, $this->getTestUser());
    }
    
    
    public function testGetId()
    {
        $this->assertSame(1, $this->getTestUser()->getId());
    }
    
    
    public function testGetName()
    {
        $this->assertSame('foo', $this->getTestUser()->getName());
    }
    
    
    public function testGetCreatedDate()
    {
        $now  = new \DateTime();
        $user = $this->getTestUser();
        // Check we have 0 days, 0 hours, 0 minutes difference between now and user created date.
        // (Anything less than a minute is acceptable due to time passing during test suite.
        $this->assertSame('000', $now->diff($user->getCreated())->format('%d%h%i'));
    }
    
    
    private function getTestUser($id = 1, $name = 'foo')
    {
        return new User($id, $name);
    }
    
}