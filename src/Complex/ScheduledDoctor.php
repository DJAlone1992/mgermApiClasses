<?php

namespace MgermApiClasses\Complex;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Doctor;
use MgermApiClasses\Classes\Schedule\Cell;
use MgermApiClasses\Classes\Service;

class ScheduledDoctor extends BaseClass
{
    public const dummyArray =
    [
        'doctor' => Doctor::dummyArray,
        'cells' => [
            0 => Cell::dummyArray,
        ],
        'services' => [
            0 => Service::dummyArray
        ],
        'interval' => true,
        'intervalDuration' => 60,
        'id' => 1
    ];
    /**
     * @var Doctor|null|null
     */
    private $doctor;
    /**
     * @var Cell[]|null|null
     */
    private $cells;
    /**
     * @var Service[]|null|null
     */
    private $services;
    /**
     * @var bool
     */
    private $interval = false;
    /**
     * @var int|null|null
     */
    private $intervalDuration;

    /**
     * @param Service $service
     *
     * @return static
     */
    public function appendService(Service $service)
    {
        if (is_null($this->services)) {
            $this->services = [];
        }
        $this->services[] = $service;
        return $this;
    }
    /**
     * @param Cell $cell
     *
     * @return static
     */
    public function appendCell(Cell $cell)
    {
        if (is_null($this->cells)) {
            $this->cells = [];
        }
        $this->cells[] = $cell;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIntervalDuration(): ?int
    {
        return $this->intervalDuration;
    }


    /**
     * @param int|null $intervalDuration
     *
     * @return static
     */
    public function setIntervalDuration(?int $intervalDuration)
    {
        $this->intervalDuration = $intervalDuration;

        return $this;
    }


    /**
     * @return bool
     */
    public function getInterval(): bool
    {
        return boolval($this->interval);
    }

    /**
     * @param bool $interval
     *
     * @return static
     */
    public function setInterval(bool $interval)
    {
        $this->interval = $interval;

        return $this;
    }


    /**
     * @return Service[]|null
     */
    public function getServices(): ?array
    {
        return $this->services;
    }


    /**
     * @param Service[]|null $services
     *
     * @return static
     */
    public function setServices(?array $services)
    {
        $this->services = $services;

        return $this;
    }


    /**
     * @return Cell[]|null
     */
    public function getCells(): ?array
    {
        return $this->cells;
    }


    /**
     * @param Cell[]|null $cells
     *
     * @return static
     */
    public function setCells(?array $cells)
    {
        $this->cells = $cells;

        return $this;
    }


    /**
     * @return Doctor|null
     */
    public function getDoctor(): ?Doctor
    {
        return $this->doctor;
    }


    /**
     * @param Doctor|null $doctor
     *
     * @return static
     */
    public function setDoctor(?Doctor $doctor)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * @return static
     */
    public static function createDummy()
    {
        $me = new static();
        $doctor = Doctor::createDummy();
        $me->setId(1)
            ->setInterval(true)
            ->setDoctor($doctor)
            ->appendCell(Cell::createDummy())
            ->appendService(Service::createDummy())
            ->setIntervalDuration(60);
        return $me;
    }
}
