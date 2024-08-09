<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\PriceList;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class PriceListTest extends TestCase
{

    public function testDummyToArray()
    {
        $dummy = PriceList::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(PriceList::dummyArray, $actual);
    }

    public function testArrayToDummy()
    {
        $expected = PriceList::createDummy();
        $actual = Executor::parseResponseArray(PriceList::dummyArray, PriceList::class);
        $this->assertEquals($expected, $actual);
    }
}
