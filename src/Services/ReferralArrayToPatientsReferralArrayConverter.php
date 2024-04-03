<?php

namespace MgermApiClasses\Services;

use MgermApiClasses\Complex\PatientsReferrals;
use MgermApiClasses\Classes\Referral;

/**
 * Статический набор функций для конвертации массива направлений в массив пациентов с направлениями и обратно
 */
class ReferralArrayToPatientsReferralArrayConverter
{
    /**
     * Конвертация массива направлений в массив пациентов с направлениями
     * @param Referral[] $referrals
     *
     * @return PatientsReferrals[]
     */
    public static function convert(array $referrals): array
    {
        $result = [];
        /** @var Referral $referral */
        foreach ($referrals as $referral) {
            $pid = $referral->getPatient()->getId();
            if (isset($result[$pid])) {
                $result[$pid]->appendReferral($referral);
            } else {
                $result[$pid] = PatientsReferrals::createFromReferral($referral);
            }
        }
        return $result;
    }

    /**
     * Конвертация массива пациентов с направлениями в массив направлений
     * @param PatientsReferrals[] $patientsReferrals
     *
     * @return Referral[]
     */
    public static function reverse(array $patientsReferrals): array
    {
        $result = [];
        /** @var PatientsReferrals $patientsReferral */
        foreach ($patientsReferrals as $patientsReferral) {
            $result = array_merge($result, $patientsReferral->getReferrals());
        }
        return $result;
    }
}
