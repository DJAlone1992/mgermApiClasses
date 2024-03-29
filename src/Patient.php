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
     * @return string|null
     */
    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }


    /**
     * @param string|null $cardNumber
     *
     * @return static
     */
    public function setCardNumber(?string $cardNumber): static
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getCardYear(): ?string
    {
        return $this->cardYear;
    }


    /**
     * @param string|null $cardYear
     *
     * @return static
     */
    public function setCardYear(?string $cardYear): static
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
    public function setPhone(?string $phone): static
    {

        $this->phone = $phone;

        return $this;
    }
}
