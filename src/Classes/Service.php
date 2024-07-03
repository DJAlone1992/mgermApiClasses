<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Service extends IdNameClass
{

    /**
     * @var int
     */
    private $price = 0;
    /**
     * @var string|null
     */
    private $code;
    /**
     * @var int|null
     */
    private $priceListId = 0;

    public function getFloatPrice(): float
    {
        return (float) round($this->price  / 100, 2, PHP_ROUND_HALF_DOWN);
    }
    /**
     * @return static
     */
    public function setPrice(float $price)
    {
        $price = round($price, 2, PHP_ROUND_HALF_DOWN);
        $this->price = $price * 100;
        return $this;
    }

    /**
     * @return static
     */
    public static function createDummy()
    {
        $me = new static();
        $me->setId(1)->setName('[Услуга]')->setPrice('123.45');
        return $me;
    }
    /**
     * @return static
     */
    public static function    SelfFactory(?int $id, ?string $name)
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
    public function setCode(?string $code)
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
    public function setPriceListId(?int $priceListId)
    {
        $this->priceListId = $priceListId;

        return $this;
    }
}
