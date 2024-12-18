<?php

namespace MgermApiClasses\Base;

abstract class IdNameClass extends BaseClass
{

    private ?CaseString $nameObj = null;

    public function __construct()
    {
        $this->nameObj = new CaseString();
    }
    /**
     ** Наименование
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
     ** Наименование в именительном падеже
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->nameObj->getNominativeCase();
    }
    /**
     * @param int|null $id
     * @param string|null $name
     *
     * @return static
     */
    public function factory(?int $id, ?string $name): static
    {
        $this->setId($id)->setName($name);
        return $this;
    }

    /**
     * SelfFactory
     * Создание экземпляра объекта
     * @param  int|null $id
     * @param  string|null $name
     * @return static
     */
    abstract public static function SelfFactory(?int $id, ?string $name): static;
}
