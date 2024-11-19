<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Enum\ContactType;
use MgermApiClasses\Enum\Sex;

/**
 * Класс пациента из MGERM
 */
class Patient extends Person
{
    public const dummyArray
    = [
        'lastNameObj'   => [
            'nominativeCase'    => '[Фамилия пациента]',
            'genitiveCase'      => '[Фамилии пациента]',
            'dativeCase'        => '[Фамилии пациента]',
            'accusativeCase'    => '[Фамилию пациента]',
            'creativeCase'      => '[Фамилией пациента]',
            'prepositionalCase' => '[Фамилии пациента]',
        ],
        'lastName'      => '[Фамилия пациента]',
        'firstNameObj'  => [
            'nominativeCase'    => '[Имя пациента]',
            'genitiveCase'      => '[Имени пациента]',
            'dativeCase'        => '[Имя пациента]',
            'accusativeCase'    => '[Имя пациента]',
            'creativeCase'      => '[Именем пациента]',
            'prepositionalCase' => '[Имени пациента]',
        ],
        'firstName'     => '[Имя пациента]',
        'secondNameObj' => [
            'nominativeCase'    => '[Отчество пациента]',
            'genitiveCase'      => '[Отчества пациента]',
            'dativeCase'        => '[Отчество пациента]',
            'accusativeCase'    => '[Отчество пациента]',
            'creativeCase'      => '[Отчеством пациента]',
            'prepositionalCase' => '[Отчестве пациента]',
        ],
        'secondName'    => '[Отчество пациента]',
        'sex'           => Sex::Male,
        'sexName'       => Sex::Names[Sex::Male],
        'id'            => 1,
        'birthDay'      => '1991-01-01 00:00:00',
        'phone'         => '[Телефон пациента]',
        'cardYear'      => 11,
        'cardNumber'    => 1234,
        'contactsCount' => 3,
        'sexName'       => 'male',
        'contacts'      => [
            [
                'value' => '+7999888--66',
                'type'  => 2,
            ],
            [
                'value' => 'patient@patient.ru',
                'type'  => 3,
            ],
            [
                'value' => 'add@patient.ru',
                'type'  => 4,
            ],
        ],
        'fullCardNumber' => '1234/11'
    ];
    /**
     ** Номер амбулаторной карты
     * @var int|null|null
     */
    private $cardNumber;
    /**
     ** Год заведения амбулаторной карты
     * @var int|null|null
     */
    private $cardYear;
    /**
     ** Телефон пациента
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
    public static function createDummy(bool $imitateReal = false)
    {
        $patient = new static();
        if ($imitateReal) {
            $patient
                ->setCardNumber('1234')
                ->setCardYear('11')
                ->setPhone('+79998887766')
                ->setLastName('Иванов')
                ->setFirstName('Иван]')
                ->setSecondName('Иванович')
                ->setBirthDay('1991-01-01')
                ->setSex(Sex::Male)
                ->setId(1)
                ->appendContactFactory(ContactType::Phone, '+7999888--66')
                ->appendContactFactory(ContactType::DefaultEmail, 'patient@patient.ru')
                ->appendContactFactory(ContactType::Email, 'add@patient.ru');
            $patient->getLastNameObj()
                ->setGenitiveCase('Иванова')
                ->setDativeCase('Иванову')
                ->setAccusativeCase('Иванова')
                ->setCreativeCase('Ивановым')
                ->setPrepositionalCase('Иванове');
            $patient->getFirstNameObj()
                ->setGenitiveCase('Ивана')
                ->setDativeCase('Ивану')
                ->setAccusativeCase('Ивана')
                ->setCreativeCase('Иваном')
                ->setPrepositionalCase('Иване');
            $patient->getSecondNameObj()
                ->setGenitiveCase('Ивановича')
                ->setDativeCase('Ивановичу')
                ->setAccusativeCase('Ивановича')
                ->setCreativeCase('Ивановичем')
                ->setPrepositionalCase('Ивановиче');
        } else {
            $patient
                ->setCardNumber('1234')
                ->setCardYear('11')
                ->setPhone('[Телефон пациента]')
                ->setLastName('[Фамилия пациента]')
                ->setFirstName('[Имя пациента]')
                ->setSecondName('[Отчество пациента]')
                ->setBirthDay('1991-01-01')
                ->setSex(Sex::Male)
                ->setId(1)
                ->appendContactFactory(ContactType::Phone, '+7999888--66')
                ->appendContactFactory(ContactType::DefaultEmail, 'patient@patient.ru')
                ->appendContactFactory(ContactType::Email, 'add@patient.ru');
            $patient->getLastNameObj()
                ->setGenitiveCase('[Фамилии пациента]')
                ->setDativeCase('[Фамилии пациента]')
                ->setAccusativeCase('[Фамилию пациента]')
                ->setCreativeCase('[Фамилией пациента]')
                ->setPrepositionalCase('[Фамилии пациента]');
            $patient->getFirstNameObj()
                ->setGenitiveCase('[Имени пациента]')
                ->setDativeCase('[Имя пациента]')
                ->setAccusativeCase('[Имя пациента]')
                ->setCreativeCase('[Именем пациента]')
                ->setPrepositionalCase('[Имени пациента]');
            $patient->getSecondNameObj()
                ->setGenitiveCase('[Отчества пациента]')
                ->setDativeCase('[Отчество пациента]')
                ->setAccusativeCase('[Отчество пациента]')
                ->setCreativeCase('[Отчеством пациента]')
                ->setPrepositionalCase('[Отчестве пациента]');
        }
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

    /**
     ** Полный номер амбулаторной карты пациента
     * @return string
     */
    public function getFullCardNumber(): string
    {
        return $this->getCardNumber() . '/' . $this->getCardYear();
    }
}
