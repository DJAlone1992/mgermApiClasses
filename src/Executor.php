<?php

namespace MgermApiClasses;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Base\CaseString;
use MgermApiClasses\Classes\Department;
use MgermApiClasses\Classes\Doctor;
use MgermApiClasses\Classes\Patient;
use MgermApiClasses\Classes\Referral;
use MgermApiClasses\Complex\PatientsReferrals;
use MgermApiClasses\Services\BaseClassDescriptor;
use MgermApiClasses\Services\RecordsArrayToPatientsRecordsArrayConverter;
use MgermApiClasses\Services\ReferralArrayToPatientsReferralArrayConverter;
use MgermApiClasses\Services\Serializer;

/**
 * Универсальный класс обработки
 */
class Executor
{
    public static function prepareResponseArray(BaseClass $class): array
    {
        $serializer = new Serializer();
        return $serializer->prepareArray($class);
    }

    public static function responseArrayToNoIndents(array $responseArray): array
    {
        $serializer = new Serializer();
        return $serializer->noIndents($responseArray);
    }

    public static function responseNoIndentsArrayToResponseArray(array $noIndentsResponseArray): array
    {
        $serializer = new Serializer();
        return $serializer->reverseIndents($noIndentsResponseArray);
    }

    public static function parseResponseArray(array $responseArray, string $className): BaseClass
    {
        $serializer = new Serializer();
        return $serializer->parseArray($responseArray, $className);
    }

    public static function parseReferralResponseArray(array $responseArray): Referral
    {
        return self::parseResponseArray($responseArray, Referral::class);
    }
    public static function parsePatientResponseArray(array $responseArray): Patient
    {
        return self::parseResponseArray($responseArray, Patient::class);
    }
    public static function parsePatientsReferralsResponseArray(array $responseArray): PatientsReferrals
    {
        return self::parseResponseArray($responseArray, PatientsReferrals::class);
    }

    public static function convertReferralArrayToPatientsReferralsArray(array $referral): array
    {
        return ReferralArrayToPatientsReferralArrayConverter::convert($referral);
    }
    public static function convertPatientsReferralsArrayToReferralArray(array $patientsReferral): array
    {
        return ReferralArrayToPatientsReferralArrayConverter::reverse($patientsReferral);
    }
    public static function convertRecordsArrayToPatientsRecordsArray(array $records): array
    {
        return RecordsArrayToPatientsRecordsArrayConverter::convert($records);
    }
    public static function convertPatientsRecordsArrayToRecordsArray(array $patientsRecords): array
    {
        return RecordsArrayToPatientsRecordsArrayConverter::reverse($patientsRecords);
    }
    public static function createDummyReferral(): Referral
    {
        return Referral::createDummy();
    }

    public static function mgermUsersArrayToDoctorsArray(array $mgermUsers): array
    {
        $result = [];
        foreach ($mgermUsers as $mgermUser) {
            $doctor = new Doctor();
            $doctor
                ->setId($mgermUser['ind'])
                ->specialtyFactory($mgermUser['spec'], $mgermUser['spec_name'])
                ->departmentFactory($mgermUser['dep'], $mgermUser['dep_name'])
                ->setLastName($mgermUser['last_name'])
                ->setFirstName($mgermUser['first_name'])
                ->setSecondName($mgermUser['second_name'])
                ->setSex($mgermUser['gender'])
                ->setBirthDay($mgermUser['birthday']);

            //TODO
            $result[] = $doctor;
        }
        return $result;
    }

    public static function mgermDepartmentsArrayToDepartmentsArray(array $mgermDepartments): array
    {
        $result = [];
        foreach ($mgermDepartments as $mgermDepartment) {
            $result[] = (new Department)->setId($mgermDepartment['ind'])->setName($mgermDepartment['name']);
        }
        return $result;
    }

    /**
     * Получение массива описания полей
     * @param BaseClass|CaseString $class
     *
     * @return array
     */
    public static function getDescriptionArray(BaseClass|CaseString $class): array
    {
        return BaseClassDescriptor::getDescription($class);
    }

    /**
     * Получение HTML для отображения описания полей
     * @param BaseClass|CaseString $class
     *
     * @return string
     */
    public static function getDescriptionHtml(BaseClass|CaseString $class): string
    {
        return BaseClassDescriptor::getDescriptionHtml($class);
    }
}
