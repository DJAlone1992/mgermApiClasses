<?php

namespace MgermApiClasses\Notifications\Complex;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Patient;

class TemplatedNotificationForMultiplePatients extends BaseClass
{
    public const dummyArray = [
        'template' => 'Привет, {{ firstName }}!',
        'patients' => [Patient::dummyArray],
    ];

    public static function createDummy(bool $imitateReal = false): static
    {
        $me = new static();
        $me->setTemplate('Привет, {{ firstName }}!')->setPatients([Patient::createDummy($imitateReal)]);
        return $me;
    }
    /**
     ** Шаблон сообщения
     * @var string
     */
    private string $template;
    /**
     ** Массив пациентов
     * @var Patient[]
     */
    private array $patients;

    public function setPatients(array $patients): static
    {
        $this->patients = $patients;
        return $this;
    }
    public function getPatients(): array
    {
        return $this->patients;
    }
    /**
     * Добавление пациента в массив для отправки
     * @param Patient $patient
     *
     * @return static
     */
    public function addPatient(Patient $patient): static
    {
        if (!array_key_exists($patient->getId(), $this->patients)) {
            $this->patients[$patient->getId()] = $patient;
        }
        return $this;
    }
    public function setTemplate(string $template): static
    {
        $this->template = $template;
        return $this;
    }
    public function getTemplate(): string
    {
        return $this->template;
    }
}
