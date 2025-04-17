<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Specialty;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class SpecialtyTest extends TestCase
{


    public function testDummyToArray(): void
    {
        $dummy = Specialty::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Specialty::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = Specialty::createDummy();
        $actual = Executor::parseResponseArray(Specialty::dummyArray, Specialty::class);
        $this->assertEquals($expected, $actual);
    }
}
