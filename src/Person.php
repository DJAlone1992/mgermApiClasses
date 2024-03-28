<?php

namespace MgermApiClasses;

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
     * @var string
     */
    private string $lastName;
    /**
     * @var string
     */
    private string $firstName;
    /**
     * @var string|null|null
     */
    private ?string $secondName = null;
    /**
     * @var Sex|null|null
     */
    private ?Sex $sex = null;
    /**
     * @var DateTime|null|null
     */
    private ?DateTime $birthDay = null;
    /**
     * @var Contact[]|null|array $contacts
     */
    private ?array $contacts = null;

    public function addContact(Contact $contact): static
    {
        if (is_null($this->contacts)) {
            $this->contacts = [];
        }
        $this->contacts[] = $contact;
        return $this;
    }

    public function appendContactFactory(int|ContactType $contactType, string $value): static
    {
        $contact = new Contact();
        $contact
            ->setType($contactType)
            ->setValue($value);
        $this->contacts[] = $contact;
        return $this;
    }
    /**
     * Get the value of lastName
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Set the value of secondName
     *
     * @return  self
     */
    public function setSecondName(string $secondName): static
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * Get the value of sex
     */
    public function getSex(): ?Sex
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */
    public function setSex(int|Sex $sex)
    {
        if (is_int($sex)) {
            $sex = Sex::from($sex);
        }
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of birthDay
     */
    public function getBirthDay(): DateTime
    {
        return $this->birthDay;
    }

    /**
     * Set the value of birthDay
     *
     * @return  self
     */
    public function setBirthDay(string|int|DateTime $birthDay)
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
     * Get the value of firstName
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }


    /**
     * Get the value of secondName
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
}
