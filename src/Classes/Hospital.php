<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\BaseClass;

class Hospital extends BaseClass
{
    /**
     * @var string|null|null
     */
    private ?string $name = null;
    /**
     * @var string|null|null
     */
    private ?string $address = null;
    /**
     * @var string|null|null
     */
    private ?string $phone = null;


    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }


    /**
     * @param string|null $name
     *
     * @return static
     */
    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }


    /**
     * @param string|null $address
     *
     * @return static
     */
    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
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

    public static function createDummy(): static
    {
        $hospital = new static();
        $hospital
            ->setName('[Наименование клиники]')
            ->setAddress('[Адрес клиники]')
            ->setPhone('+79998887755');

        return $hospital;
    }
}
