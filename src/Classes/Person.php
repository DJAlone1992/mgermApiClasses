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
    private ?string $lastName;
    /**
     * @var string|null
     */
    private ?string $firstName;
    /**
     * @var string|null|null
     */
    private ?string $secondName = null;
    /**
     * @var int|null
     */
    private ?int $sex = null;
    /**
     * @var DateTime|null|null
     */
    private ?DateTime $birthDay = null;
    /**
     * @var Contact[]|null|array $contacts
     */
    private ?array $contacts = null;

    /**
     * @var int
     */
    private int $contactsCount = 0;
    /**
     * @param Contact|null $contact
     *
     * @return static
     */
    public function addContact(?Contact $contact): static
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
    public function appendContactFactory(?int $contactType, ?string $value): static
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
    public function setContactsCount(int $contactsCount): static
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
    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }


    /**
     * @param string|null $firstName
     *
     * @return static
     */
    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }


    /**
     * @param string|null $secondName
     *
     * @return static
     */
    public function setSecondName(?string $secondName): static
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
    public function setContacts(array $contacts): static
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
