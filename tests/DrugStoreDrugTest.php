<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\DrugStore\Drug;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class DrugStoreDrugTest extends TestCase
{

    public function testDummyToArray(): void
    {
        $dummy = Drug::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Drug::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = Drug::createDummy();
        $actual = Executor::parseResponseArray(Drug::dummyArray, Drug::class);
        $this->assertEquals($expected, $actual);
    }
}
