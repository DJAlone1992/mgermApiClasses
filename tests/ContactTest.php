<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Contact;
use MgermApiClasses\Executor;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{

    public function testDummyToArray()
    {
        $dummy = Contact::createDummy();
        $actual = Executor::prepareResponseArray($dummy);
        $this->assertEquals(Contact::dummyArray, $actual);
    }

    public function testArrayToDummy()
    {
        $expected = Contact::createDummy();
        $actual = Executor::parseResponseArray(Contact::dummyArray, Contact::class);
        $this->assertEquals($expected, $actual);
    }
}
