<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\DrugStore\InvoiceDrug;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class DrugStoreInvoiceDrugTest extends TestCase
{

    public function testDummyToArray(): void
    {
        $dummy = InvoiceDrug::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(InvoiceDrug::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = InvoiceDrug::createDummy();
        $actual = Executor::parseResponseArray(InvoiceDrug::dummyArray, InvoiceDrug::class);
        $this->assertEquals($expected, $actual);
    }
}
