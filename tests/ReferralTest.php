<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Referral;
use MgermApiClasses\Serializer;
use PHPUnit\Framework\TestCase;

class ReferralTest extends TestCase
{
    public function testDeserialization()
    {
        $referral = Referral::createDummy();
        $serializer = new Serializer();
        $newReferral = $serializer->parseArray($serializer->prepareArray($referral), Referral::class);
        $this->assertEquals($serializer->prepareArray($referral), $serializer->prepareArray($newReferral));
    }
}
