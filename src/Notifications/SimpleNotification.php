<?php

namespace MgermApiClasses\Notifications;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Simple\Patient;

class SimpleNotification extends BaseClass
{
    public const dummyArray = [
        'message' => 'Текст сообщения',
        'patient' => Patient::dummyArray
    ];

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        $me = new static();
        $me->setMessage('Текст сообщения')->setPatient(Patient::createDummy($imitateReal));
        return $me;
    }

    /**
     ** Текст сообщения
     * @var string
     */
    private $message;
    /**
     ** Упрощенные данные пациента
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
    public function setMessage(string $message)
    {
        $this->message = $message;
        return $this;
    }
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     ** Создание уведомления из данных
     * @param string $message Текст сообщения
     * @param string $phone Номер телефона
     * @param int $patientID ID пациента
     *
     * @return static
     */
    public static function createFromData(string $message, string $phone, int $patientID)
    {
        $me = new static();
        $patient = new Patient();
        $patient->setId($patientID)->setPhone($phone);
        $me->setMessage($message)->setPatient($patient);
        return $me;
    }
}
