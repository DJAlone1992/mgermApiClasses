<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Referral;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ClassReferralTest extends TestCase
{

    public function testDummyToArray(): void
    {
        $dummy = Referral::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Referral::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = Referral::createDummy();
        $actual = Executor::parseResponseArray(Referral::dummyArray, Referral::class);
        $this->assertEquals($expected, $actual);
    }
}
