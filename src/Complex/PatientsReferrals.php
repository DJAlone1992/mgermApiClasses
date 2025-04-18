<?php

namespace MgermApiClasses\Complex;

use DateTime;
use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Patient;
use MgermApiClasses\Classes\Referral;

/**
 * Направления, сгруппированные по пациенту
 */
class PatientsReferrals extends BaseClass
{
    public const dummyArray =
    [
        'patient' => Patient::dummyArray,
        'referrals' => [
            0 => Referral::dummyArray
        ],
        'id' => Patient::dummyArray['id'],
        'firstReferral' => Referral::dummyArray
    ];
    /**
     * @var Patient|null
     */
    private ?Patient $patient = null;
    /**
     * @var Referral[] $referrals
     */
    private array $referrals = [];
    /**
     * @param Referral[] $referrals
     *
     * @return static
     */
    public function setReferrals(array $referrals): static
    {
        $this->referrals = $referrals;
        return $this;
    }
    /**
     * @param Referral $referral
     *
     * @return static
     */
    public function appendReferral(Referral $referral): static
    {
        if ($referral->getPatient()->getId() == $this->patient->getId() || !$this->patient) {
            $this->referrals[] = $referral;
        }
        return $this;
    }
    /**
     ** Направления
     * @return Referral[]
     */
    public function getReferrals(): array
    {
        return $this->referrals;
    }
    /**
     * @param Patient $patient
     *
     * @return static
     */
    public function setPatient(Patient $patient): static
    {
        $this->patient = $patient;
        $this->setId($patient->getId());
        return $this;
    }
    /**
     ** Данные пациента
     * @return Patient
     */
    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    /**
     * Создает экземпляр класса из объекта направления
     * @param Referral $referral
     *
     * @return static
     */
    public static function createFromReferral(Referral $referral): static
    {
        $me = new static();
        $me->setPatient($referral->getPatient());
        $me->appendReferral($referral);
        return $me;
    }

    public static function createDummy(bool $imitateReal = false): static
    {
        return self::createFromReferral(Referral::createDummy($imitateReal));
    }

    /**
     ** Поиск в списке направлений самого раннего
     * @return Referral
     */
    public function getFirstReferral(): Referral
    {
        $minDateTime = new DateTime('+20 years');
        $selected = null;
        foreach ($this->referrals as $referral) {
            $refDateTime = new DateTime($referral->getDate()->format('Y-m-d') . ' ' . $referral->getTimeStart()->format('H:i:s'));
            if ($refDateTime < $minDateTime) {
                $minDateTime = $refDateTime;
                $selected = $referral;
            }
        }
        return $selected;
    }
}
