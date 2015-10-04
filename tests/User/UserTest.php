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

    private function getTestUser($id = 1, $name = 'foo')
    {
        return new User($id, $name);
    }
}