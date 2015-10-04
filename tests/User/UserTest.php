<?php

namespace Ehimen\Tests\SpecificationPattern\User;

use Ehimen\SpecificationPattern\User\User;

class UserTest extends \PHPUnit_Framework_TestCase
{

    public function testInitialisable()
    {
        $this->assertInstanceOf(User::class, $this->getTestUser());
    }

    private function getTestUser()
    {
        return new User();
    }
}