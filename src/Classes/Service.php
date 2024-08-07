<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Service extends IdNameClass
{
    public const dummyArray    = [
        'nameObj' => [
            'nominativeCase' => '[Услуга]'
        ],
        'name' => '[Услуга]',
        'code' => '[Код услуги]',
        'priceListId' => 0,
        'id' => 1,
        'floatPrice' => 123.45,
        'price' => 12345
    ];
    private int $price = 0;
    private float $floatPrice = 0;
    private ?string $code = null;
    private ?int $priceListId = 0;

    public function getFloatPrice(): float
    {
        return $this->floatPrice;
    }
    public function getPrice(): int
    {
        return $this->price;
    }
    public function setFloatPrice(float $floatPrice): static
    {
        $this->floatPrice = $floatPrice;
        $this->price =        round($floatPrice, 2, PHP_ROUND_HALF_DOWN) * 100;
        return $this;
    }
    public function setPrice(int $price): static
    {
        $this->price = $price;
        $this->floatPrice = (float) round($this->price  / 100, 2, PHP_ROUND_HALF_DOWN);
        return $this;
    }

    /**
     * @return static
     */
    public static function createDummy()
    {
        $me = new static();
        $me->setId(1)->setName('[Услуга]')->setFloatPrice('123.45')->setCode('[Код услуги]');
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
