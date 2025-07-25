<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Complex\ScheduledCabinet;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ComplexScheduledCabinetTest extends TestCase
{

    public function testDummyToArray(): void
    {
        $dummy = ScheduledCabinet::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(ScheduledCabinet::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = ScheduledCabinet::createDummy();
        $actual = Executor::parseResponseArray(ScheduledCabinet::dummyArray, ScheduledCabinet::class);
        $this->assertEquals($expected, $actual);
    }
}
