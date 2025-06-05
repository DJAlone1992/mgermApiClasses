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
            'nominativeCase'    => '[Наименование клиники]',
            'genitiveCase'      => '[Наименования клиники]',
            'dativeCase'        => '[Наименованию клиники]',
            'accusativeCase'    => '[Наименование клиники]',
            'creativeCase'      => '[Наименованием клиники]',
            'prepositionalCase' => '[Наименовании клиники]',
        ],
        'name'    => '[Наименование клиники]',
        'phone'   => '[Телефон клиники]',
        'address' => '[Адрес клиники]',
        'id'      => 1,
    ];
    /**
     ** Наименование ЛПУ
     * @var CaseString|null
     */
    private $nameObj;
    /**
     ** Адрес ЛПУ
     * @var string|null|null
     */
    private $address;
    /**
     ** Телефон ЛПУ
     * @var string|null|null
     */
    private $phone;

    public function __construct()
    {
        $this->nameObj = new CaseString();
    }
    /**
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
    public function setName(?string $name)
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
    public function setAddress(?string $address)
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
    public function setPhone(?string $phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        $hospital = new static();
        if ($imitateReal) {
            $hospital
                ->setId(1)
                ->setName('Клиника "Здоровье"')
                ->setAddress('Москва, ул. Пушкина, д. 896')
                ->setPhone('+79998887755');
            $hospital->getNameObj()
                ->setGenitiveCase('Клиники "Здоровье"')
                ->setDativeCase('Клинике "Здоровье"')
                ->setAccusativeCase('Клинику "Здоровье"')
                ->setCreativeCase('Клиникой "Здоровье"')
                ->setPrepositionalCase('Клинике "Здоровье"');
        } else {
            $hospital
                ->setId(1)
                ->setName('[Наименование клиники]')
                ->setAddress('[Адрес клиники]')
                ->setPhone('[Телефон клиники]');
            $hospital->getNameObj()
                ->setGenitiveCase('[Наименования клиники]')
                ->setDativeCase('[Наименованию клиники]')
                ->setAccusativeCase('[Наименование клиники]')
                ->setCreativeCase('[Наименованием клиники]')
                ->setPrepositionalCase('[Наименовании клиники]');
        }
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
    public function setNameObj(?CaseString $nameObj)
    {
        $this->nameObj = $nameObj;

        return $this;
    }
}
