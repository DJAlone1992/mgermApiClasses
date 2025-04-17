<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Complex\ScheduledDoctor;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ComplexScheduledDoctorTest extends TestCase
{


    public function testDummyToArray(): void
    {
        $dummy = ScheduledDoctor::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(ScheduledDoctor::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = ScheduledDoctor::createDummy();
        $actual = Executor::parseResponseArray(ScheduledDoctor::dummyArray, ScheduledDoctor::class);
        $this->assertEquals($expected, $actual);
    }
}
