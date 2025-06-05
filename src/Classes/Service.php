<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Service extends IdNameClass
{
    public const dummyArray    = [
        'nameObj' => [
            'nominativeCase' => '[Услуга]',
            'genitiveCase'      => '[Услуги]',
            'dativeCase'        => '[Услугу]',
            'accusativeCase'    => '[Услугу]',
            'creativeCase'      => '[Услугой]',
            'prepositionalCase' => '[Услуге]',
        ],
        'name' => '[Услуга]',
        'code' => '[Код услуги]',
        'priceListId' => 0,
        'id' => 1,
        'floatPrice' => 123.45,
        'price' => 12345
    ];
    /**
     ** Цена услуги в копейках
     * @var int
     */
    private int $price = 0;
    /**
     ** Цена услуги в рублях и копейках
     * @var float
     */
    private float $floatPrice = 0;
    /**
     ** Код услуги
     * @var string|null|null
     */
    private ?string $code = null;
    /**
     ** Индекс прайс-листа
     * @var int|null
     */
    private ?int $priceListId = 0;

    private ?int $duration = null;

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

    public static function createDummy(bool $imitateReal = false): static
    {
        $me = new static();
        if ($imitateReal) {
            $me->setId(1)->setName('Прием (осмотр, консультация) врача общей практики (семейного врача) первичный')->setFloatPrice('123.45')->setCode('B01.026.001');
            $me->getNameObj()
                ->setGenitiveCase('Приема (осмотр, консультация) врача общей практики (семейного врача) первичного')
                ->setDativeCase('Прием (осмотр, консультация) врача общей практики (семейного врача) первичный')
                ->setAccusativeCase('Прием (осмотр, консультация) врача общей практики (семейного врача) первичный')
                ->setCreativeCase('Приемом (осмотр, консультация) врача общей практики (семейного врача) первичным')
                ->setPrepositionalCase('Приеме (осмотр, консультация) врача общей практики (семейного врача) первичном');
        } else {
            $me->setId(1)->setName('[Услуга]')->setFloatPrice('123.45')->setCode('[Код услуги]');
            $me->getNameObj()
                ->setGenitiveCase('[Услуги]')
                ->setDativeCase('[Услугу]')
                ->setAccusativeCase('[Услугу]')
                ->setCreativeCase('[Услугой]')
                ->setPrepositionalCase('[Услуге]');
        }
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

    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;
        return $this;
    }
    public function getDuration0(): ?int
    {
        return $this->duration;
    }
}
