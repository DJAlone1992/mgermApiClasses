<?php

namespace MgermApiClasses\Complex;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Doctor;
use MgermApiClasses\Classes\Referral;
use MgermApiClasses\Classes\Schedule\Cell;
use MgermApiClasses\Classes\Service;

class ScheduledDoctor extends BaseClass
{
    public const dummyArray =
    [
        'doctor' => Doctor::dummyArray,
        'cells' => Cell::dummyArrayAll,
        'services' => [
            0 => Service::dummyArray
        ],
        'interval' => true,
        'intervalDuration' => 60,
        'id' => 1,
        'callOnly' => false,
    ];
    /**
     *
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
     ** Длительность интервала приема
     * @var int|null|null
     */
    private $intervalDuration;

    /**
     * @var bool
     */
    private $isCallOnly = false;
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
    public function setServices(?array $services)
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
    public function setMinimumServicesPeriods(int $periods)
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
    public function setMinimumServiceDuration(int $duration)
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
    public function setCells(?array $cells)
    {
        $this->cells = $cells;

        return $this;
    }


    /**
     ** Данные врача
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
    public static function createDummy(bool $imitateReal = false)
    {
        $me = new static();
        $doctor = Doctor::createDummy($imitateReal);
        $me->setId(1)
            ->setInterval(true)
            ->setDoctor($doctor)
            ->setCells(Cell::createDummyAll($imitateReal))
            ->appendService(Service::createDummy($imitateReal))
            ->setIntervalDuration(60);
        return $me;
    }

    /**
     * Устанавливает признак врача, что к нему запись только по звонку
     * @return static
     */
    public function setCallOnly()
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
    public function unsetCallOnly()
    {
        $this->isCallOnly = false;
        return $this;
    }
}
