<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Hospital;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ClassHospitalTest extends TestCase
{

    public function testDummyToArray(): void
    {
        $dummy = Hospital::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Hospital::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = Hospital::createDummy();
        $actual = Executor::parseResponseArray(Hospital::dummyArray, Hospital::class);
        $this->assertEquals($expected, $actual);
    }
}
