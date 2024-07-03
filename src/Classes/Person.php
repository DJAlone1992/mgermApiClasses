<?php

namespace MgermApiClasses\Classes;

use DateTime;
use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Enum\ContactType;
use MgermApiClasses\Enum\Sex;

/**
 * Супер-класс обозначающий человека
 */
abstract class Person extends BaseClass
{

    /**
     * @var string|null
     */
    private $lastName;
    /**
     * @var string|null
     */
    private $firstName;
    /**
     * @var string|null|null
     */
    private $secondName;
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
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }


    /**
     * @param string|null $lastName
     *
     * @return static
     */
    public function setLastName(?string $lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }


    /**
     * @param string|null $firstName
     *
     * @return static
     */
    public function setFirstName(?string $firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }


    /**
     * @param string|null $secondName
     *
     * @return static
     */
    public function setSecondName(?string $secondName)
    {
        $this->secondName = $secondName;

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
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }


    /**
     * Get the value of secondName
     */
    /**
     * @return string|null
     */
    public function getSecondName(): ?string
    {
        return $this->secondName;
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
        return $this->getLastName() . ' ' . $this->getFirstName() . ' ' . $this->getSecondName();
    }

    public function getLastNameWithInitials(): string
    {
        return
            $this->getLastName() . ' ' . mb_substr($this->getFirstName(), 0, 1) . '. ' . mb_substr($this->getSecondName(), 0, 1) . '.';
    }
}
