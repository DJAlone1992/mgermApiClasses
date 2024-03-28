<?php

namespace MgermApiClasses;

use MgermApiClasses\Enum\ContactType;
use MgermApiClasses\lib\BaseClass;

/**
 * Класс пациента из MGERM
 */
class Patient extends Person
{
    /**
     * @var int|null|null
     */
    private ?int $cardNumber = null;
    /**
     * @var int|null|null
     */
    private ?int $cardYear = null;
    /**
     * @var string|null|null
     */
    private ?string $phone = null;

    /**
     * Get the value of cardNumber
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set the value of cardNumber
     *
     * @return  self
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get the value of cardYear
     */
    public function getCardYear()
    {
        return $this->cardYear;
    }

    /**
     * Set the value of cardYear
     *
     * @return  self
     */
    public function setCardYear($cardYear)
    {
        $this->cardYear = $cardYear;

        return $this;
    }



    public static function createDummy(): static
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
            ->setSex(1)
            ->setId(1)
            ->appendContactFactory(ContactType::Phone, '+7999888--66')
            ->appendContactFactory(ContactType::DefaultEmail, 'patient@patient.ru')
            ->appendContactFactory(ContactType::Email, 'add@patient.ru');
        return $patient;
    }
    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {

        $this->phone = $phone;

        return $this;
    }
}
