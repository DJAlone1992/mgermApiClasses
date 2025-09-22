<?php

namespace MgermApiClasses\Complex;

use DateTime;
use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Patient;
use MgermApiClasses\Classes\Record;

class PatientsRecords extends BaseClass
{

    public const dummyArray = [
        'patient' => Patient::dummyArray,
        'records' => [
            0 => Record::dummyArray,
        ],
        'id' => Patient::dummyArray['id'],
        'firstRecord' => Record::dummyArray
    ];
    /**
     * @var Patient|null|null
     */
    private $patient;
    /**
     * @var Record[] $records
     */
    private array $records = [];

    /**
     * @param Record[] $records
     *
     * @return static
     */
    public function setRecords(array $records): static
    {
        $this->records = $records;
        return $this;
    }
    public function appendRecord(Record $record): static
    {
        if ($record->getPatient()->getId() == $this->patient->getId() || !$this->patient) {
            $record->setPatient(null);
            $this->records[] = $record;
        }
        return $this;
    }

    /**
     ** Записи
     * @return Record[]
     */
    public function getRecords(): array
    {
        return $this->records;
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
    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public static function createFromRecord(Record $record): static
    {
        $me = new static();
        $me->setPatient($record->getPatient());
        $me->appendRecord($record);
        return $me;
    }
    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        return self::createFromRecord(Record::createDummy($imitateReal));
    }

    /**
     ** Поиск самой ранней записи по дате подписания или создания
     * @return Record|null
     */
    public function getFirstRecord(): ?Record
    {
        $minDateTime = new DateTime('+20 years');
        $selected = null;
        foreach ($this->records as $record) {
            $recordDate = $record->getSignatureDateTime() ?? $record->getCreationDateTime();
            if ($recordDate < $minDateTime) {
                $minDateTime = $recordDate;
                $selected = $record;
            }
        }
        return $selected;
    }
}
