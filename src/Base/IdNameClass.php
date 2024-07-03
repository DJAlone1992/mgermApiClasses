<?php

namespace MgermApiClasses\Base;

abstract class IdNameClass extends BaseClass
{
    /**
     * @var string|null
     */
    private $name;

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
    public function setName(?string $name)
    {
        $this->name = $name;

        return $this;
    }
    /**
     * @param int|null $id
     * @param string|null $name
     *
     * @return static
     */
    public function factory(?int $id, ?string $name)
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
    abstract public static function SelfFactory(?int $id, ?string $name);
}
