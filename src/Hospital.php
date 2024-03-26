<?php

namespace MgermApiClasses;

class Hospital
{
    private ?string $name = null;
    private ?string $address = null;
    private ?string $phone = null;

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
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
    public function _toArray(): array
    {
        $data = [];
        if ($this->name) {
            $data['name'] = $this->name;
        }
        if ($this->address) {
            $data['address'] = $this->address;
        }
        if ($this->phone) {
            $data['phone'] = $this->phone;
        }

        return $data;
    }
    /**
     * createFromMgermResponse
     * Создание экземпляра объекта из ответа MGERM
     * @param  array $data
     * @return static
     */
    public static function createFromMgermResponse($data): static
    {
        $hospital = new static();


        if (isset($data['hospitalName'])) {
            $hospital->setName($data['hospitalName']);
        }
        if (isset($data['hospitalAddress'])) {
            $hospital->setAddress($data['hospitalAddress']);
        }
        if (isset($data['hospitalPhone'])) {
            $hospital->setPhone($data['hospitalPhone']);
        }
        return $hospital;
    }
    /**
     * createDummy
     * Создание экземпляра объекта с тестовым наполнением параметров
     * @return static
     */
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
