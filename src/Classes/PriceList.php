<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class PriceList extends IdNameClass
{
    /**
     * @var Service[]
     */
    private $services = [];

    /**
     * @return static
     */
    public static function createDummy()
    {
        $me = new static();
        $me->factory(1, '[Прайс-лист]');
        return $me;
    }
    /**
     * @return static
     */
    public static function SelfFactory(?int $id, ?string $name)
    {
        $me = new static();
        $me->factory($id, $name);
        return $me;
    }

    /**
     * @return static
     */
    public function appendService(Service $service)
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
    public function setServices(array $services)
    {
        $this->services = $services;

        return $this;
    }
}
