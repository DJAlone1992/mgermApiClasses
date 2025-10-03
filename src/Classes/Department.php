<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\CaseString;
use MgermApiClasses\Base\IdNameClass;

/**
 * Класс для работы с отделением MGERM
 */
class Department extends IdNameClass
{
    public const dummyArray =
    [
        'nameObj' => [
            'nominativeCase'    => 'Отделение',
            'genitiveCase'      => 'Отделения',
            'dativeCase'        => 'Отделению',
            'accusativeCase'    => 'Отделение',
            'creativeCase'      => 'Отделением',
            'prepositionalCase' => 'Отделении',
        ],
        'shortNameObj' => [
            'nominativeCase' => 'Отд.',
            'genitiveCase' => 'Отд.',
            'dativeCase' => 'Отд.',
            'accusativeCase' => 'Отд.',
            'creativeCase' => 'Отд.',
            'prepositionalCase' => 'Отд.',
        ],
        'shortName' => 'Отд.',
        'phone' => 'Телефон отделения',
        'address' => 'Адрес отделения',
        'name'    => 'Отделение',
        'id'      => 1,
    ];
    private CaseString $shortNameObj;
    /**
     ** Телефон отделения
     * @var string|null|null
     */
    private ?string $phone = null;

    /**
     ** Адрес отделения
     * @var string|null|null
     */
    private ?string $address = null;

    public function __construct()
    {
        parent::__construct();
        $this->shortNameObj = new CaseString();
    }
    public function getShortNameObj(): CaseString
    {
        return $this->shortNameObj;
    }
    public function getShortName(): ?string
    {
        return $this->shortNameObj->getNominativeCase();
    }
    public function setShortName(?string $shortName): static
    {
        $this->shortNameObj->setNominativeCase($shortName);
        return $this;
    }
    public function setShortNameObj(CaseString $shortNameObj): static
    {
        $this->shortNameObj = $shortNameObj;
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
    public static function SelfFactory(?int $id, ?string $name): static
    {
        $department = new static();
        $department->setId($id)->setName($name);
        return $department;
    }
    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        if ($imitateReal) {
            $me = self::SelfFactory(1, 'Поликлиническое отделение');
            $me->getNameObj()
                ->setGenitiveCase('Поликлинического отделения')
                ->setDativeCase('Поликлиническому отделению')
                ->setAccusativeCase('Поликлиническое отделение')
                ->setCreativeCase('Поликлиническим отделением')
                ->setPrepositionalCase('Поликлиническом отделении');
            $me
                ->getShortNameObj()
                ->setNominativeCase('Поликл. отд.')
                ->setGenitiveCase('Поликл. отд.')
                ->setDativeCase('Поликл. отд.')
                ->setAccusativeCase('Поликл. отд.')
                ->setCreativeCase('Поликл. отд.')
                ->setPrepositionalCase('Поликл. отд.');
            $me->setPhone('+79998887766');
            $me->setAddress('г. Москва, ул. Пушкина, д. 1');
        } else {
            $me = self::SelfFactory(1, 'Отделение');
            $me->getNameObj()
                ->setGenitiveCase('Отделения')
                ->setDativeCase('Отделению')
                ->setAccusativeCase('Отделение')
                ->setCreativeCase('Отделением')
                ->setPrepositionalCase('Отделении');
            $me->getShortNameObj()
                ->setNominativeCase('Отд.')
                ->setGenitiveCase('Отд.')
                ->setDativeCase('Отд.')
                ->setAccusativeCase('Отд.')
                ->setCreativeCase('Отд.')
                ->setPrepositionalCase('Отд.');
            $me->setPhone('Телефон отделения');
            $me->setAddress('Адрес отделения');
        }
        return $me;
    }
}
