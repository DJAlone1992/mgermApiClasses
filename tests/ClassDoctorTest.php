<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Doctor;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ClassDoctorTest extends TestCase
{

    public function testDummyToArray()
    {
        $dummy = Doctor::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Doctor::dummyArray, $actual);
    }

    public function testArrayToDummy()
    {
        $expected = Doctor::createDummy();
        $actual = Executor::parseResponseArray(Doctor::dummyArray, Doctor::class);
        $this->assertEquals($expected, $actual);
    }
}
