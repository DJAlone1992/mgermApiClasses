<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\DrugStore\ContractTable;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class DrugStoreContractTableTest extends TestCase
{

    public function testDummyToArray(): void
    {
        $dummy = ContractTable::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(ContractTable::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = ContractTable::createDummy();
        $actual = Executor::parseResponseArray(ContractTable::dummyArray, ContractTable::class);
        $this->assertEquals($expected, $actual);
    }
}
