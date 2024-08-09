<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Patient;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ClassPatientTest extends TestCase
{

    public function testDummyToArray()
    {
        $dummy = Patient::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Patient::dummyArray, $actual);
    }

    public function testArrayToDummy()
    {
        $expected = Patient::createDummy();
        $actual = Executor::parseResponseArray(Patient::dummyArray, Patient::class);
        $this->assertEquals($expected, $actual);
    }
}
