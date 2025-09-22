<?php

namespace MgermApiClasses\Simple;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Interfaces\PatientNecessaryNotificationDataInterface;

class Patient extends BaseClass implements PatientNecessaryNotificationDataInterface
{
    public const dummyArray
    = [
        'id' => 1,
        'phone' => '[Телефон пациента]'
    ];
    public static function createDummy(bool $imitateReal = false): static
    {
        $patient = new static();
        if ($imitateReal) {
            $patient
                ->setPhone('+79998887766')
                ->setId(1);
        } else {
            $patient
                ->setPhone('[Телефон пациента]')
                ->setId(1);
        }
        return $patient;
    }
    /**
     ** Телефон пациента
     * @var string|null|null
     */
    private ?string $phone = null;
    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     *
     * @return static
     */
    public function setPhone(?string $phone): static
    {

        $this->phone = $phone;

        return $this;
    }
}
