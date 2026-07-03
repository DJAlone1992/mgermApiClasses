<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Constant;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ConstantTest extends TestCase
{

    public function testDummyToArray(): void
    {
        $dummy = Constant::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Constant::dummyArray, $actual);
    }

    public function testArrayToDummy(): void
    {
        $expected = Constant::createDummy();
        $actual = Executor::parseResponseArray(Constant::dummyArray, Constant::class);
        $this->assertEquals($expected, $actual);
    }
}
