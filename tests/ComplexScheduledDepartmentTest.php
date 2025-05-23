<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Complex\ScheduledDepartment;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ComplexScheduledDepartmentTest extends TestCase
{
    public function testDummyToArray(): void
    {
        $dummy = ScheduledDepartment::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(ScheduledDepartment::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = ScheduledDepartment::createDummy();
        $actual = Executor::parseResponseArray(ScheduledDepartment::dummyArray, ScheduledDepartment::class);
        $this->assertEquals($expected, $actual);
    }
}
