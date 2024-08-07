<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Department;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class DepartmentTest extends TestCase
{

    public function testDummyToArray()
    {
        $dummy = Department::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Department::dummyArray, $actual);
    }

    public function testArrayToDummy()
    {
        $expected = Department::createDummy();
        $actual = Executor::parseResponseArray(Department::dummyArray, Department::class);
        $this->assertEquals($expected, $actual);
    }
}
