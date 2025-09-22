<?php

namespace MgermApiClasses\Notifications;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Patient;

class TemplatedNotification extends BaseClass
{
    public const dummyArray = [
        'template' => 'Привет, {{ firstName }}!',
        'patient' => Patient::dummyArray,
    ];

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        $me = new static();
        $me->setTemplate('Привет, {{ firstName }}!')->setPatient(Patient::createDummy($imitateReal));
        return $me;
    }
    /**
     ** Шаблон сообщения
     * @var string
     */
    private $template;
    /**
     ** Пациент
     * @var Patient
     */
    private $patient;

    /**
     * @return static
     */
    public function setPatient(Patient $patient)
    {
        $this->patient = $patient;
        return $this;
    }
    public function getPatient(): Patient
    {
        return $this->patient;
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
