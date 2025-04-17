<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Cabinet;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class CabinetTest extends TestCase
{


    public function testDummyToArray(): void
    {
        $dummy = Cabinet::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Cabinet::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = Cabinet::createDummy();
        $actual = Executor::parseResponseArray(Cabinet::dummyArray, Cabinet::class);
        $this->assertEquals($expected, $actual);
    }
}
