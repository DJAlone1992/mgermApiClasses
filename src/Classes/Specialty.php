<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Specialty extends IdNameClass
{
    public const dummyArray =
    [

        'nameObj' => [
            'nominativeCase'    => 'Специальность',
            'genitiveCase'      => 'Специальности',
            'dativeCase'        => 'Специальности',
            'accusativeCase'    => 'Специальность',
            'creativeCase'      => 'Специальностью',
            'prepositionalCase' => 'Специальности',
        ],
        'nsiCode' => '123',
        'nsiRoleCode' => '123',
        'name'    => 'Специальность',
        'isActive' => true,
        'id'      => 1,
    ];

    /**
     ** Код специальности по справочнику OID 1.2.643.5.1.13.13.11.1066
     * @var string|null
     */
    private $nsiCode;

    /**
     ** Код должности по справочнику OID 1.2.643.5.1.13.13.11.1002
     * @var string|null
     */
    private $nsiRoleCode;

    /**
     ** Признак активности
     * @var bool|null
     */
    private $isActive = true;

    /**
     * @return static
     */
    public static function SelfFactory(?int $id, ?string $name)
    {
        $specialty = new static();
        $specialty->setId($id)->setName($name);
        return $specialty;
    }
    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        if ($imitateReal) {
            $me = self::SelfFactory(1, 'Врач общей практики');
            $me->setNsiRoleCode(49)->setNsiCode(224);
            $me->getNameObj()
                ->setGenitiveCase('Врача общей практики')
                ->setDativeCase('Врачу общей практики')
                ->setAccusativeCase('Врача общей практики')
                ->setCreativeCase('Врачом общей практики')
                ->setPrepositionalCase('Враче общей практики');
        } else {
            $me = self::SelfFactory(1, 'Специальность');
            $me->setNsiCode('123')
                ->setNsiRoleCode('123');
            $me->getNameObj()
                ->setGenitiveCase('Специальности')
                ->setDativeCase('Специальности')
                ->setAccusativeCase('Специальность')
                ->setCreativeCase('Специальностью')
                ->setPrepositionalCase('Специальности');
        }
        return $me;
    }

    public function getNsiCode(): ?string
    {
        return $this->nsiCode;
    }
    /**
     * @return static
     */
    public function setNsiCode(?string $nsiCode)
    {
        $this->nsiCode = $nsiCode;
        return $this;
    }

    public function getNsiRoleCode(): ?string
    {
        return $this->nsiRoleCode;
    }

    /**
     * @return static
     */
    public function setNsiRoleCode(?string $nsiRoleCode)
    {
        $this->nsiRoleCode = $nsiRoleCode;
        return $this;
    }
    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }
    /**
     * @return static
     */
    public function setIsActive(?bool $isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }
}
