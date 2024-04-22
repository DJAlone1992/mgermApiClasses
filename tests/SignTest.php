<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Classes\Referral;
use MgermApiClasses\Executor;
use MgermApiClasses\Security\DataSigner;
use MgermApiClasses\Services\Serializer;
use PHPUnit\Framework\TestCase;

class SignTest extends TestCase
{

    // Signing an empty array returns an array with 'signTimestamp', 'salt', and 'signature' keys
    public function test_sign_empty_array()
    {
        $data = [];
        $result = DataSigner::sign($data);

        $this->assertArrayHasKey('signTimestamp', $result);
        $this->assertArrayHasKey('salt', $result);
        $this->assertArrayHasKey('signature', $result);
    }

    // Signing an array with a large number of keys and values returns an array with 'signTimestamp', 'salt', and 'signature' keys
    public function test_sign_large_array()
    {
        $data = Executor::prepareResponseArray(Referral::createDummy());
        $result = DataSigner::sign($data);

        $this->assertArrayHasKey('signTimestamp', $result);
        $this->assertArrayHasKey('salt', $result);
        $this->assertArrayHasKey('signature', $result);
    }

    public function test_validate()
    {
        $data =  Executor::prepareResponseArray(Referral::createDummy());
        $result = DataSigner::sign($data);
        $this->assertEquals(true, DataSigner::validate($result));
    }
}
