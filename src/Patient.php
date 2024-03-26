<?php

namespace MgermApiClasses;

/**
 * Класс пациента из MGERM
 */
class Patient extends Person
{
    private ?int $cardNumber = null;
    private ?int $cardYear = null;
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

    /**
     * createFromMgermResponse
     * Создание экземпляра объекта из ответа MGERM
     * @param  array $data
     * @return static
     */
    public static function  createFromMgermResponse($data): static
    {
        $patient = new static();
        $patient
            ->setId($data['patientID'])
            ->setLastName($data['patientLastName'])
            ->setFirstName($data['patientFirstName'])
            ->setBirthDay($data['patientBirthday'])
            ->setSex($data['patientSex']);

        if (isset($data['patientSecondName'])) {
            $patient->setSecondName($data['patientSecondName']);
        }
        if (isset($data['patientCardNumber'])) {
            $patient->setCardNumber($data['patientCardNumber']);
        }
        if (isset($data['patientCardYear'])) {
            $patient->setCardYear($data['patientCardYear']);
        }
        return $patient;
    }

    /**
     * createDummy
     * Создание экземпляра объекта с тестовым наполнением параметров
     * @return static
     */
    public static function createDummy(): static
    {
        $patient = new static();
        $patient
            ->setCardNumber('1234')
            ->setCardYear('11')
            ->setPhone('+79998887766')
            ->setLastName('Фамилия пациента')
            ->setFirstName('Имя пациента')
            ->setSecondName('Фамилия пациента')
            ->setBirthDay('1991-01-01')
            ->setSex(1);
        return $patient;
    }
    public function _toArray(): array
    {
        $data = parent::_toArray();
        if ($this->cardNumber) {
            $data['cardNumber'] = $this->cardNumber;
        }
        if ($this->cardYear) {
            $data['cardYear'] = $this->cardYear;
        }
        return $data;
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
