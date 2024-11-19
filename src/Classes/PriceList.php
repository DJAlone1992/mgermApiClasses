<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class PriceList extends IdNameClass
{
    public const dummyArray
    = [
        'nameObj'  => [
            'nominativeCase'    => '[Прайс-лист]',
            'genitiveCase'      => '[Прайс-листа]',
            'dativeCase'        => '[Прайс-листу]',
            'accusativeCase'    => '[Прайс-лист]',
            'creativeCase'      => '[Прайс-листом]',
            'prepositionalCase' => '[Прайс-листе]',
        ],
        'name'     => '[Прайс-лист]',
        'id'       => 1,
        'services' => [],
    ];
    /**
     * @var Service[]
     */
    private array $services = [];

    public static function createDummy(): static
    {
        $me = new static();
        $me->factory(1, '[Прайс-лист]');
        $me->getNameObj()
            ->setGenitiveCase('[Прайс-листа]')
            ->setDativeCase('[Прайс-листу]')
            ->setAccusativeCase('[Прайс-лист]')
            ->setCreativeCase('[Прайс-листом]')
            ->setPrepositionalCase('[Прайс-листе]');
        return $me;
    }
    public static function SelfFactory(?int $id, ?string $name): static
    {
        $me = new static();
        $me->factory($id, $name);
        return $me;
    }

    public function appendService(Service $service): static
    {
        $this->services[] = $service->setPriceListId($this->getId());
        return $this;
    }
    /**
     * @return Service[]
     */
    public function getServices(): array
    {
        return $this->services;
    }
    /**
     * @param Service[] $services
     *
     * @return static
     */
    public function setServices(array $services): static
    {
        $this->services = $services;

        return $this;
    }
}
