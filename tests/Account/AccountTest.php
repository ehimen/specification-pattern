<?php

namespace Ehimen\Tests\SpecificationPattern\Account;

use Ehimen\SpecificationPattern\Account\Account;

class AccountTest extends \PHPUnit_Framework_TestCase
{

    public function testInitialisable()
    {
        $this->assertInstanceOf(Account::class, $this->getTestAccount());
    }

    private function getTestAccount()
    {
        return new Account();
    }
}