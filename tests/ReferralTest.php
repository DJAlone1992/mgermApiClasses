<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Referral;
use MgermApiClasses\Services\Serializer;
use PHPUnit\Framework\TestCase;

class ReferralTest extends TestCase
{
    private Referral $dummy;
    private array $serializedDummyNoIndents = [];
    private Serializer $serializer;
    private array $serializedDummy  = [];

    private function init()
    {

        $this->dummy = Referral::createDummy();
        $this->serializer = new Serializer();
        $this->serializedDummy = $this->serializer->prepareArray($this->dummy);
        $this->serializedDummyNoIndents = $this->serializer->noIndents($this->serializedDummy);
    }
    public function testDeserialization()
    {
        $this->init();
        $newReferral = $this->serializer->parseArray($this->serializedDummy, Referral::class);
        $this->assertEquals($this->serializedDummy, $this->serializer->prepareArray($newReferral));
    }

    public function testNoIndents()
    {
        $this->init();
        $newReferral = $this->serializer->noIndents($this->serializer->prepareArray($this->dummy));

        $this->assertEquals($this->serializedDummyNoIndents, $newReferral);
    }
    public function testReverseIndents()
    {
        $this->init();
        $newReferral = $this->serializer->prepareArray($this->dummy);

        $this->assertEquals($newReferral, $this->serializer->reverseIndents($this->serializedDummyNoIndents));
    }

    public function testDeserializationNoIndents()
    {
        $this->init();
        $indentation = $this->serializer->reverseIndents($this->serializedDummyNoIndents);
        $newReferral = $this->serializer->parseArray($indentation, Referral::class);
        $this->assertEquals($this->serializer->prepareArray($this->dummy), $this->serializer->prepareArray($newReferral));
    }
}
