<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Schedule\Cell;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ClassScheduleCellTest extends TestCase
{


    public function testDummyToArray(): void
    {
        $dummy = Cell::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Cell::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = Cell::createDummy();
        $actual = Executor::parseResponseArray(Cell::dummyArray, Cell::class);
        $this->assertEquals($expected, $actual);
    }
}
