<?php

namespace MgermApiClasses;

use DateTime;
use MgermApiClasses\Enum\Sex;

/**
 * Супер-класс обозначающий человека
 */
class Person
{
    private ?int $id = null;
    private string $lastName;
    private string $firstName;
    private ?string $secondName = null;
    private ?Sex $sex = null;
    private ?DateTime $birthDay = null;

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
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function _toArray(): array
    {
        $data = [];
        if ($this->id) {
            $data['id'] = $this->id;
        }
        if ($this->lastName) {
            $data['lastName'] = $this->lastName;
        }
        if ($this->firstName) {
            $data['firstName'] = $this->firstName;
        }
        if ($this->secondName) {
            $data['secondName'] = $this->secondName;
        }
        if ($this->sex) {
            $data['sex'] = $this->sex->value;
        }
        if ($this->birthDay) {
            $data['birthDay'] = $this->birthDay->format('Y-m-d');
        }
        return $data;
    }
}
