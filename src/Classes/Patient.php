<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Enum\ContactType;
use MgermApiClasses\Enum\Sex;
use MgermApiClasses\lib\BaseClass;

/**
 * Класс пациента из MGERM
 */
class Patient extends Person
{
    public const dummyArray
    = [
        'lastNameObj' => [
            'nominativeCase' => 'Фамилия пациента'
        ],
        'lastName' => 'Фамилия пациента',
        'firstNameObj' => [
            'nominativeCase' => 'Имя пациента'
        ],
        'firstName' => 'Имя пациента',
        'secondNameObj' => [
            'nominativeCase' => 'Отчество пациента'
        ],
        'secondName' => 'Отчество пациента',
        'sex' => 1,
        'id' => 1,
        'birthDay' => '1991-01-01 00:00:00',
        'phone' => '+79998887766',
        'cardYear' => 11,
        'cardNumber' => 1234,
        'contactsCount' => 3,
        'sexName' => 'male',
        'contacts' => [
            [
                'value' => '+7999888--66',
                'type' => 2
            ],
            [
                'value' => 'patient@patient.ru',
                'type' => 3
            ],
            [
                'value' => 'add@patient.ru',
                'type' => 4
            ]
        ]
    ];
    /**
     * @var int|null|null
     */
    private $cardNumber;
    /**
     * @var int|null|null
     */
    private $cardYear;
    /**
     * @var string|null|null
     */
    private $phone;


    /**
     * @return int|null
     */
    public function getCardNumber(): ?int
    {
        return $this->cardNumber;
    }


    /**
     * @param int|null $cardNumber
     *
     * @return static
     */
    public function setCardNumber(?int $cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }


    /**
     * @return int|null
     */
    public function getCardYear(): ?int
    {
        return $this->cardYear;
    }


    /**
     * @param int|null $cardYear
     *
     * @return static
     */
    public function setCardYear(?int $cardYear)
    {
        $this->cardYear = $cardYear;

        return $this;
    }



    /**
     * @return static
     */
    public static function createDummy()
    {
        $patient = new static();
        $patient
            ->setCardNumber('1234')
            ->setCardYear('11')
            ->setPhone('+79998887766')
            ->setLastName('Фамилия пациента')
            ->setFirstName('Имя пациента')
            ->setSecondName('Отчество пациента')
            ->setBirthDay('1991-01-01')
            ->setSex(Sex::Male)
            ->setId(1)
            ->appendContactFactory(ContactType::Phone, '+7999888--66')
            ->appendContactFactory(ContactType::DefaultEmail, 'patient@patient.ru')
            ->appendContactFactory(ContactType::Email, 'add@patient.ru');
        return $patient;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }


    /**
     * @param string|null $phone
     *
     * @return static
     */
    public function setPhone(?string $phone)
    {

        $this->phone = $phone;

        return $this;
    }
}
