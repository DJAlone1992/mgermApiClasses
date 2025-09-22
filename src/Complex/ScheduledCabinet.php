<?php

namespace MgermApiClasses\Complex;

use MgermApiClasses\Classes\Cabinet;
use MgermApiClasses\Classes\Schedule\Cell;
use MgermApiClasses\Classes\Service;

class ScheduledCabinet extends ScheduledObject
{

    public const dummyArray = [
        'cabinet' => Cabinet::dummyArray,
        'cells' => Cell::dummyArrayAll,
        'services' => [
            0 => Service::dummyArray
        ],
        'interval' => true,
        'intervalDuration' => 60,
        'id' => 1,
        'callOnly' => false,
    ];

    private ?Cabinet $cabinet = null;

    /**
     ** Данные кабинета
     * @return Cabinet|null
     */
    public function getCabinet(): ?Cabinet
    {
        return $this->cabinet;
    }
    /**
     * @param Cabinet|null $cabinet
     *
     * @return static
     */
    public function setCabinet(?Cabinet $cabinet)
    {
        $this->cabinet = $cabinet;
        return $this;
    }

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        $me = new static();
        $cabinet = Cabinet::createDummy($imitateReal);
        $me->setId(1)
            ->setInterval(true)
            ->setCabinet($cabinet)
            ->setCells(Cell::createDummyAll($imitateReal))
            ->appendService(Service::createDummy($imitateReal))
            ->setIntervalDuration(60);
        return $me;
    }
}
