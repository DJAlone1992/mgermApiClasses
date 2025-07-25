<?php

namespace MgermApiClasses\Complex;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Schedule\Cell;
use MgermApiClasses\Classes\Service;

abstract class ScheduledObject extends BaseClass
{

    /**
     * @var Cell[]|null|null
     */
    protected ?array $cells = null;
    /**
     * @var Service[]|null|null
     */
    protected ?array $services = null;
    /**
     * @var bool
     */
    protected bool $interval = false;
    /**
     ** Длительность интервала приема
     * @var int|null|null
     */
    protected ?int $intervalDuration = null;

    protected bool $isCallOnly = false;
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
     ** Список услуг
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
     * Установка минимального количества периодов для всех услуг врача
     * @param int $periods Количество периодов
     *
     * @return static
     */
    public function setMinimumServicesPeriods(int $periods): static
    {
        $doctorMinimumDuration = $this->intervalDuration * $periods;
        $this->setMinimumServiceDuration($doctorMinimumDuration);
        return $this;
    }

    /**
     * Установка минимальной длительности приема
     * @param int $duration Минимальная длительность приема в минутах
     *
     * @return static
     */
    public function setMinimumServiceDuration(int $duration): static
    {
        foreach ($this->services as $service) {
            if ($service->getDuration() < $duration) {
                $service->setDuration($duration);
            }
        }
        return $this;
    }

    /**
     ** Ячейки для записи
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
     * Устанавливает признак врача, что к нему запись только по звонку
     * @return static
     */
    public function setCallOnly(): static
    {
        $this->isCallOnly = true;
        return $this;
    }
    /**
     ** Запись только по звонку
     * @return bool
     */
    public function isCallOnly(): bool
    {
        return $this->isCallOnly;
    }
    /**
     * Удаляет признак врача, что к нему запись только по звонку
     * @return static
     */
    public function unsetCallOnly(): static
    {
        $this->isCallOnly = false;
        return $this;
    }
}
