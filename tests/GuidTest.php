<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Guid;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class GuidTest extends TestCase
{

    public function testDummyToArray()
    {
        $dummy = Guid::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Guid::dummyArray, $actual);
    }

    public function testArrayToDummy()
    {
        $expected = Guid::createDummy();
        $actual = Executor::parseResponseArray(Guid::dummyArray, Guid::class);
        $this->assertEquals($expected, $actual);
    }
}
