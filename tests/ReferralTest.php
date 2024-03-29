<?php

namespace MgermApiClasses\Tests;

use MgermApiClasses\Referral;
use MgermApiClasses\Serializer;
use PHPUnit\Framework\TestCase;

class ReferralTest extends TestCase
{
    private Referral $dummy;
    private array $serializedDummy = [
        'department_name' => '[Отделение, куда направлен пациент]',
        'department_id' => 1,
        'doctor_specialty_name' => 'Специальность врача',
        'doctor_specialty_id' => 2,
        'doctor_department_name' => 'Отделение врача',
        'doctor_department_id' => 1,
        'doctor_contactsCount' => 0,
        'doctor_lastName' => 'Фамилия врача',
        'doctor_sex' => 0,
        'doctor_birthDay' => '1992-02-02 00:00:00',
        'doctor_firstName' => 'Имя врача',
        'doctor_secondName' => 'Отчество врача',
        'doctor_id' => 2,
        'patient_cardNumber' => 1234,
        'patient_cardYear' => 11,
        'patient_phone' => '+79998887766',
        'patient_contactsCount' => 3,
        'patient_lastName' => 'Фамилия пациента',
        'patient_sex' => 0,
        'patient_birthDay' => '1991-01-01 00:00:00',
        'patient_firstName' => 'Имя пациента',
        'patient_secondName' => 'Отчество пациента',
        'patient_contacts_0_value' => '+7999888--66',
        'patient_contacts_0_type' => 0,
        'patient_contacts_1_value' => 'patient@patient.ru',
        'patient_contacts_1_type' => 0,
        'patient_contacts_2_value' => 'add@patient.ru',
        'patient_contacts_2_type' => 0,
        'patient_id' => 1,
        'referralDate' => '1999-09-09 00:00:00',
        'referralTimeStart' => '2024-03-29 09:09:00',
        'referralTimeEnd' => '2024-03-29 10:10:00',
        'hospital_name' => '[Наименование клиники]',
        'hospital_address' => '[Адрес клиники]',
        'hospital_phone' => '+79998887755',
        'id' => 123456789,
    ];
    private Serializer $serializer;
    private array $serializedDummyNoIndents = array(
        'department' =>
        array(
            'name' => '[Отделение, куда направлен пациент]',
            'id' => 1,
        ),
        'doctor' =>
        array(
            'specialty' =>
            array(
                'name' => 'Специальность врача',
                'id' => 2,
            ),
            'department' =>
            array(
                'name' => 'Отделение врача',
                'id' => 1,
            ),
            'contactsCount' => 0,
            'lastName' => 'Фамилия врача',
            'sex' => 0,
            'birthDay' => '1992-02-02 00:00:00',
            'firstName' => 'Имя врача',
            'secondName' => 'Отчество врача',
            'id' => 2,
        ),
        'patient' =>
        array(
            'cardNumber' => 1234,
            'cardYear' => 11,
            'phone' => '+79998887766',
            'contactsCount' => 3,
            'lastName' => 'Фамилия пациента',
            'sex' => 0,
            'birthDay' => '1991-01-01 00:00:00',
            'firstName' => 'Имя пациента',
            'secondName' => 'Отчество пациента',
            'contacts' =>
            array(
                0 =>
                array(
                    'value' => '+7999888--66',
                    'type' => 0,
                ),
                1 =>
                array(
                    'value' => 'patient@patient.ru',
                    'type' => 0,
                ),
                2 =>
                array(
                    'value' => 'add@patient.ru',
                    'type' => 0,
                ),
            ),
            'id' => 1,
        ),
        'referralDate' => '1999-09-09 00:00:00',
        'referralTimeStart' => '2024-03-29 09:09:00',
        'referralTimeEnd' => '2024-03-29 10:10:00',
        'hospital' =>
        array(
            'name' => '[Наименование клиники]',
            'address' => '[Адрес клиники]',
            'phone' => '+79998887755',
        ),
        'id' => 123456789,
    );

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
