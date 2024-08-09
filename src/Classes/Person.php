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
    private $lastNameObj;
    /**
     * @var CaseString|null
     */
    private $firstNameObj;
    /**
     * @var CaseString|null
     */
    private $secondNameObj;
    /**
     * @var int|null
     */
    private $sex;
    /**
     * @var string|null
     */
    private $sexName = "unknown";
    /**
     * @var DateTime|null|null
     */
    private $birthDay;
    /**
     * @var Contact[]|null|array $contacts
     */
    private $contacts;

    /**
     * @var int
     */
    private $contactsCount = 0;

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
    public function addContact(?Contact $contact)
    {
        if (is_null($this->contacts)) {
            $this->contacts = [];
        }
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
    public function appendContactFactory(?int $contactType, ?string $value)
    {
        $contact = new Contact();
        $contact
            ->setType($contactType)
            ->setValue($value);
        $this->addContact($contact);
        return $this;
    }
    /**
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
    public function setContactsCount(int $contactsCount)
    {
        $this->contactsCount = $contactsCount;
        return $this;
    }
    /**
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
    public function setLastNameObj(?CaseString $lastNameObj)
    {
        $this->lastNameObj = $lastNameObj;

        return $this;
    }


    /**
     * @param CaseString|null $firstNameObj
     *
     * @return static
     */
    public function setFirstNameObj(?CaseString $firstNameObj)
    {
        $this->firstNameObj = $firstNameObj;

        return $this;
    }


    /**
     * @param CaseString|null $secondNameObj
     *
     * @return static
     */
    public function setSecondNameObj(?CaseString $secondNameObj)
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

    /**
     * @return static
     */
    public function setSexName(?string $sexName)
    {
        $this->sexName = $sexName;
        return $this;
    }
    /**
     * @param int|null $sex
     *
     * @return static
     */
    public function setSex(?int $sex)
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
    public function setBirthDay($birthDay)
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
     * @return CaseString|null
     */
    public function getFirstNameObj(): ?CaseString
    {
        return $this->firstNameObj;
    }


    /**
     * Get the value of secondNameObj
     */
    /**
     * @return CaseString|null
     */
    public function getSecondNameObj(): ?CaseString
    {
        return $this->secondNameObj;
    }



    /**
     * Get $contacts
     *
     * @return  Contact[]
     */
    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    /**
     * Set $contacts
     *
     * @param  Contact[]|null $contacts
     *
     * @return  self
     */
    public function setContacts(array $contacts)
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->getLastNameObj()->getNominativeCase() . ' ' . $this->getFirstNameObj()->getNominativeCase() . ' ' . $this->getSecondNameObj()->getNominativeCase();
    }

    public function getLastNameWithInitials(): string
    {
        return
            $this->getLastNameObj()->getNominativeCase() . ' ' . mb_substr($this->getFirstNameObj()->getNominativeCase(), 0, 1) . '. ' . mb_substr($this->getSecondNameObj()->getNominativeCase(), 0, 1) . '.';
    }

    /**
     * @return static
     */
    public function setLastName(?string $lastName)
    {
        $this->lastNameObj->setNominativeCase($lastName);
        return $this;
    }
    public function getLastName(): ?string
    {
        return $this->lastNameObj->getNominativeCase();
    }
    /**
     * @return static
     */
    public function setFirstName(?string $firstName)
    {
        $this->firstNameObj->setNominativeCase($firstName);
        return $this;
    }
    public function getFirstName(): ?string
    {
        return $this->firstNameObj->getNominativeCase();
    }
    /**
     * @return static
     */
    public function setSecondName(?string $secondName)
    {
        $this->secondNameObj->setNominativeCase($secondName);
        return $this;
    }
    public function getSecondName(): ?string
    {
        return $this->secondNameObj->getNominativeCase();
    }
}
