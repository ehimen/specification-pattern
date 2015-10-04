<?php

namespace Ehimen\Tests\SpecificationPattern\Account;

use Ehimen\SpecificationPattern\Account\Account;
use Ehimen\SpecificationPattern\User\User;

class AccountTest extends \PHPUnit_Framework_TestCase
{

    public function testInitialisable()
    {
        $this->assertInstanceOf(Account::class, $this->getTestAccount());
    }


    public function testGetUser()
    {
        $user = $this->getMockUser();
        $this->assertSame($user, $this->getTestAccount($user)->getUser());
    }
    
    
    public function testAccountStartsAtZero()
    {
        $this->assertSame(0, $this->getTestAccount()->getAmount());
    }
    
    
    /**
     * @dataProvider provideWithdrawExpectations
     */
    public function testWithdraw($amount, $expected)
    {
        $account = $this->getTestAccount();
        $account->withdraw($amount);
        $this->assertSame($expected, $account->getAmount());
    }
    
    
    public function provideWithdrawExpectations()
    {
        return [
            [0, 0],
            [1, -1],
            [5, -5],
            [100, -100],
        ];
    }
    
    
    /**
     * @dataProvider provideDepositExpectations
     */
    public function testDeposit($amount, $expected)
    {
        $account = $this->getTestAccount();
        $account->deposit($amount);
        $this->assertSame($expected, $account->getAmount());
    }
    
    
    public function provideDepositExpectations()
    {
        return [
            [0, 0],
            [1, 1],
            [5, 5],
            [100, 100],
        ];
    }


    /**
     * @param User|null $user
     * @return Account
     */
    private function getTestAccount(User $user = null)
    {
        $user = $user ?: $this->getMockUser();
        return new Account($user);
    }


    /**
     * @return User
     */
    private function getMockUser()
    {
        $user = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock();

        return $user;
    }
}