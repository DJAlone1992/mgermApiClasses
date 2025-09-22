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

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        $me = new static();
        $me->setTemplate('Привет, {{ firstName }}!')->setPatients([Patient::createDummy($imitateReal)]);
        return $me;
    }
    /**
     ** Шаблон сообщения
     * @var string
     */
    private $template;
    /**
     ** Массив пациентов
     * @var Patient[]
     */
    private $patients;

    /**
     * @return static
     */
    public function setPatients(array $patients)
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
    public function addPatient(Patient $patient)
    {
        if (!array_key_exists($patient->getId(), $this->patients)) {
            $this->patients[$patient->getId()] = $patient;
        }
        return $this;
    }
    /**
     * @return static
     */
    public function setTemplate(string $template)
    {
        $this->template = $template;
        return $this;
    }
    public function getTemplate(): string
    {
        return $this->template;
    }
}
