<?php

namespace MgermApiClasses\Base;

abstract class BaseClass
{
    /**
     ** Индекс
     * @var int|null
     */
    private $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     *
     * @return static
     */
    public function setId(?int $id)
    {
        $this->id = $id;

        return $this;
    }

    abstract public static function createDummy(bool $imitateReal = false): static;
}
