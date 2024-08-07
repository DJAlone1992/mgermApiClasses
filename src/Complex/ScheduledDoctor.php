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
    private ?Doctor $doctor = null;
    /**
     * @var Cell[]|null|null
     */
    private ?array $cells = null;
    /**
     * @var Service[]|null|null
     */
    private ?array $services = null;
    /**
     * @var bool
     */
    private bool $interval = false;
    /**
     * @var int|null|null
     */
    private ?int $intervalDuration = null;

    /**
     * @param Service $service
     *
     * @return static
     */
    public function appendService(Service $service): static
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
    public function appendCell(Cell $cell): static
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
    public function setIntervalDuration(?int $intervalDuration): static
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
    public function setInterval(bool $interval): static
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
    public function setServices(?array $services): static
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
    public function setCells(?array $cells): static
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
    public function setDoctor(?Doctor $doctor): static
    {
        $this->doctor = $doctor;

        return $this;
    }

    public static function createDummy(): static
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
