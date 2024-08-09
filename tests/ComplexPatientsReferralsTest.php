<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Complex\PatientsReferrals;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;


class ComplexPatientsReferralsTest extends TestCase
{


    public function testDummyToArray()
    {
        $dummy = PatientsReferrals::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(PatientsReferrals::dummyArray, $actual);
    }

    public function testArrayToDummy()
    {
        $expected = PatientsReferrals::createDummy();
        $actual = Executor::parseResponseArray(PatientsReferrals::dummyArray, PatientsReferrals::class);
        $this->assertEquals($expected, $actual);
    }
}
