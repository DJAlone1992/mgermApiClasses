<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class PriceList extends IdNameClass
{
    /**
     * @var Service[]
     */
    private array $services = [];

    public static function createDummy(): static
    {
        $me = new static();
        $me->factory(1, '[Прайс-лист]');
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
