<?php

namespace MgermApiClasses\Services;

use MgermApiClasses\Classes\Record;
use MgermApiClasses\Complex\PatientsRecords;

class RecordsArrayToPatientsRecordsArrayConverter
{
    /**
     * Конвертация массива записей в массив пациентов с записями
     * @param Record[] $records
     *
     * @return array
     */
    public static function convert(array $records): array
    {
        $result = [];
        /** @var Record $record */
        foreach ($records as $record) {
            $pid = $record->getPatient()->getId();
            if (isset($result[$pid])) {
                $result[$pid]->appendRecord($record);
            } else {
                $result[$pid] = PatientsRecords::createFromRecord($record);
            }
        }
        return $result;
    }

    /**
     * Конвертация массива пациентов с записями в массив записей
     * @param PatientsRecords[] $patientsRecordsArray
     *
     * @return array
     */
    public static function reverse(array $patientsRecordsArray): array
    {
        $result = [];
        /** @var PatientsRecords $patientsRecords */
        foreach ($patientsRecordsArray as $patientsRecords) {
            $result = array_merge($result, $patientsRecords->getRecords());
        }
        return $result;
    }
}
