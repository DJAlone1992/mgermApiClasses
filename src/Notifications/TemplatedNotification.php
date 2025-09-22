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

    public static function createDummy(bool $imitateReal = false): static
    {
        $me = new static();
        $me->setTemplate('Привет, {{ firstName }}!')->setPatient(Patient::createDummy($imitateReal));
        return $me;
    }
    /**
     ** Шаблон сообщения
     * @var string
     */
    private string $template;
    /**
     ** Пациент
     * @var Patient
     */
    private Patient $patient;

    public function setPatient(Patient $patient): static
    {
        $this->patient = $patient;
        return $this;
    }
    public function getPatient(): Patient
    {
        return $this->patient;
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
