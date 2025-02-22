<?php

namespace MgermApiClasses\Classes;

use DateTime;
use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Base\CaseString;
use MgermApiClasses\Enum\ContactType;
use MgermApiClasses\Enum\Sex;

/**
 * Супер-класс обозначающий человека
 */
abstract class Person extends BaseClass
{

    /**
     * @var CaseString|null
     */
    private ?CaseString $lastNameObj = null;
    /**
     * @var CaseString|null
     */
    private ?CaseString $firstNameObj = null;
    /**
     * @var CaseString|null
     */
    private ?CaseString $secondNameObj = null;
    /**
     ** Пол (число)
     * @var int|null
     */
    private ?int $sex = null;
    /**
     ** Пол (латиница)
     * @var string|null
     */
    private ?string $sexName = "unknown";
    /**
     ** Дата рождения
     *# |date('d.m.Y')
     * @var DateTime|null|null
     */
    private ?DateTime $birthDay = null;
    /**
     * @var Contact[] $contacts
     */
    private array $contacts = [];

    /**
     * @var int
     */
    private int $contactsCount = 0;

    public function __construct()
    {
        $this->lastNameObj = new CaseString();
        $this->secondNameObj = new CaseString();
        $this->firstNameObj = new CaseString();
    }
    /**
     * @param Contact|null $contact
     *
     * @return static
     */
    public function addContact(?Contact $contact): static
    {

        $this->contacts[] = $contact;
        $this->contactsCount++;
        return $this;
    }

    /**
     * @param int|null $contactType
     * @param string|null $value
     *
     * @return static
     */
    public function appendContactFactory(?int $contactType, ?string $value): static
    {
        if (is_null($value) || is_null($contactType)) {
            return $this;
        }
        $contact = new Contact();
        $contact
            ->setType($contactType)
            ->setValue($value);
        $this->addContact($contact);
        return $this;
    }
    /**
     ** Количество указанных контактов
     * @return int
     */
    public function getContactsCount(): int
    {
        return $this->contactsCount;
    }
    /**
     * @param int $contactsCount
     *
     * @return static
     */
    public function setContactsCount(int $contactsCount): static
    {
        $this->contactsCount = $contactsCount;
        return $this;
    }
    /**
     ** Фамилия
     * @return CaseString|null
     */
    public function getLastNameObj(): ?CaseString
    {
        return $this->lastNameObj;
    }


    /**
     * @param CaseString|null $lastNameObj
     *
     * @return static
     */
    public function setLastNameObj(?CaseString $lastNameObj): static
    {
        $this->lastNameObj = $lastNameObj;

        return $this;
    }


    /**
     * @param CaseString|null $firstNameObj
     *
     * @return static
     */
    public function setFirstNameObj(?CaseString $firstNameObj): static
    {
        $this->firstNameObj = $firstNameObj;

        return $this;
    }


    /**
     * @param CaseString|null $secondNameObj
     *
     * @return static
     */
    public function setSecondNameObj(?CaseString $secondNameObj): static
    {
        $this->secondNameObj = $secondNameObj;

        return $this;
    }


    /**
     * @return int|null
     */
    public function getSex(): ?int
    {
        return $this->sex;
    }
    /**
     * @return string|null
     */
    public function getSexName(): ?string
    {
        return $this->sexName;
    }

    public function setSexName(?string $sexName): static
    {
        $this->sexName = $sexName;
        return $this;
    }
    /**
     * @param int|null $sex
     *
     * @return static
     */
    public function setSex(?int $sex): static
    {
        if (is_null($sex) || $sex < 1 || $sex > 2) {
            $sex = Sex::Unknown;
        }
        $this->sex = $sex;
        $this->sexName = Sex::Names[$sex];

        return $this;
    }


    /**
     * @return DateTime|null
     */
    public function getBirthDay(): ?DateTime
    {
        return $this->birthDay;
    }



    /**
     * @param null|string|int|DateTime $birthDay
     *
     * @return static
     */
    public function setBirthDay(null|string|int|DateTime $birthDay): static
    {
        if (is_string($birthDay)) {
            $birthDay = new DateTime($birthDay);
        }
        if (is_int($birthDay)) {
            $birthDay = new DateTime(date('Y-m-d', $birthDay));
        }
        $this->birthDay = $birthDay;

        return $this;
    }


    /**
     ** Имя
     * @return CaseString|null
     */
    public function getFirstNameObj(): ?CaseString
    {
        return $this->firstNameObj;
    }


    /**
     ** Отчество
     * @return CaseString|null
     */
    public function getSecondNameObj(): ?CaseString
    {
        return $this->secondNameObj;
    }



    /**
     ** Контакты
     * @return  Contact[]
     */
    public function getContacts(): array
    {
        return $this->contacts ?? [];
    }

    /**
     * Set $contacts
     *
     * @param  Contact[] $contacts
     *
     * @return  self
     */
    public function setContacts(array $contacts): static
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     ** ФИО в именительном падеже
     * @return string
     */
    public function getFullName(): string
    {
        return $this->getLastNameObj()->getNominativeCase() . ' ' . $this->getFirstNameObj()->getNominativeCase() . ' ' . $this->getSecondNameObj()->getNominativeCase();
    }

    /**
     ** Фамилия и инициалы в именительном падеже
     * @return string
     */
    public function getLastNameWithInitials(): string
    {
        return
            $this->getLastNameObj()->getNominativeCase() . ' ' . mb_substr((string) $this->getFirstNameObj()->getNominativeCase(), 0, 1) . '. ' . mb_substr((string) $this->getSecondNameObj()->getNominativeCase(), 0, 1) . '.';
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastNameObj->setNominativeCase($lastName);
        return $this;
    }
    /**
     ** Фамилия в именительном падеже
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastNameObj->getNominativeCase();
    }
    public function setFirstName(?string $firstName): static
    {
        $this->firstNameObj->setNominativeCase($firstName);
        return $this;
    }
    /**
     ** Имя в именительном падеже
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstNameObj->getNominativeCase();
    }
    public function setSecondName(?string $secondName): static
    {
        $this->secondNameObj->setNominativeCase($secondName);
        return $this;
    }
    /**
     ** Отчество в именительном падеже
     * @return string|null
     */
    public function getSecondName(): ?string
    {
        return $this->secondNameObj->getNominativeCase();
    }
}
