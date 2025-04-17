<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Record;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class RecordTest extends TestCase
{


    public function testDummyToArray(): void
    {
        $dummy = Record::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Record::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = Record::createDummy();
        $actual = Executor::parseResponseArray(Record::dummyArray, Record::class);
        $this->assertEquals($expected, $actual);
    }
}
