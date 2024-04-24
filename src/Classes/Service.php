<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Service extends IdNameClass
{

    private int $price = 0;
    private ?string $code = null;
    private ?int $priceListId = 0;

    public function getFloatPrice(): float
    {
        return (float) round($this->price  / 100, 2, PHP_ROUND_HALF_DOWN);
    }
    public function setPrice(float $price): static
    {
        $price = round($price, 2, PHP_ROUND_HALF_DOWN);
        $this->price = $price * 100;
        return $this;
    }

    public static function createDummy(): static
    {
        $me = new static();
        $me->setId(1)->setName('[Услуга]')->setPrice('123.45');
        return $me;
    }
    public static function    SelfFactory(?int $id, ?string $name): static
    {
        $me = new static();
        $me->factory($id, $name);
        return $me;
    }


    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }


    /**
     * @param string|null $code
     *
     * @return static
     */
    public function setCode(?string $code): static
    {
        $this->code = $code;

        return $this;
    }


    /**
     * @return int|null
     */
    public function getPriceListId(): ?int
    {
        return $this->priceListId;
    }


    /**
     * @param int|null $priceListId
     *
     * @return static
     */
    public function setPriceListId(?int $priceListId): static
    {
        $this->priceListId = $priceListId;

        return $this;
    }
}
