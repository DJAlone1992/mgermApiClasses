<?php

namespace MgermApiClasses\Base;

abstract class IdNameClass extends BaseClass
{
    /**
     * @var string|null
     */
    private ?string $name = null;

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
