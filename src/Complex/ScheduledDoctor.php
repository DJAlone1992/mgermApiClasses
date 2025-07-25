<?php

namespace MgermApiClasses\Complex;

use MgermApiClasses\Classes\Doctor;
use MgermApiClasses\Classes\Schedule\Cell;
use MgermApiClasses\Classes\Service;

class ScheduledDoctor extends ScheduledObject
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
}
