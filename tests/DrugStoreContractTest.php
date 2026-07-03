<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\DrugStore\Contract;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class DrugStoreContractTest extends TestCase
{

    public function testDummyToArray(): void
    {
        $dummy = Contract::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Contract::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = Contract::createDummy();
        $actual = Executor::parseResponseArray(Contract::dummyArray, Contract::class);
        $this->assertEquals($expected, $actual);
    }
}
