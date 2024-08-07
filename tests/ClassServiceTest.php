<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Service;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;


class ClassServiceTest extends TestCase
{

    public function testDummyToArray()
    {
        $dummy = Service::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Service::dummyArray, $actual);
    }

    public function testArrayToDummy()
    {
        $expected = Service::createDummy();
        $actual = Executor::parseResponseArray(Service::dummyArray, Service::class);
        $this->assertEquals($expected, $actual);
    }
}
