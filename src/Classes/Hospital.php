<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Base\CaseString;

/**
 * Информация об ЛПУ
 */
class Hospital extends BaseClass
{
    public const dummyArray
    = [
        'nameObj' => [
            'nominativeCase' => '[Наименование клиники]'
        ],
        'name' => '[Наименование клиники]',
        'phone' => '+79998887755',
        'address' => '[Адрес клиники]'
    ];
    /**
     * @var CaseString|null
     */
    private ?CaseString $nameObj = null;
    /**
     ** Адрес ЛПУ
     * @var string|null|null
     */
    private ?string $address = null;
    /**
     ** Телефон ЛПУ
     * @var string|null|null
     */
    private ?string $phone = null;

    public function __construct()
    {
        $this->nameObj = new CaseString();
    }
    /**
     ** Наименование ЛПУ
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->nameObj->getNominativeCase();
    }


    /**
     * @param string|null $name
     *
     * @return static
     */
    public function setName(?string $name): static
    {
        $this->nameObj->setNominativeCase($name);

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
    /**
     * @return CaseString|null
     */
    public function getNameObj(): ?CaseString
    {
        return $this->nameObj;
    }

    /**
     * @param CaseString|null $nameObj
     *
     * @return static
     */
    public function setNameObj(?CaseString $nameObj): static
    {
        $this->nameObj = $nameObj;

        return $this;
    }
}
