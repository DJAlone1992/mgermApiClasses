<?php

namespace MgermApiClasses\Complex;

use DateTime;
use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Patient;
use MgermApiClasses\Classes\Record;

class PatientsRecords extends BaseClass{

    public const dummyArray=[
        'patient'=>Patient::dummyArray,
        'records'=>[
            0=>Record::dummyArray,
        ],
        'id'=>Patient::dummyArray['id'],
        'firstRecord'=>Record::dummyArray
    ];
    /**
     * @var Patient|null|null
     */
    private ?Patient $patient = null;
    /**
     * @var Record[] $records
     */
    private array $records=[];

    /**
     * @param Record[] $records
     *
     * @return static
     */
    public function setRecords(array $records){
        $this->records = $records;
        return $this;
    }
    /**
     * @return static
     */
    public function appendRecord(Record $record){
        if($record->getPatient()->getId()==$this->patient->getId() || !$this->patient){
 $this->records[]=$record;
        }
        return $this;
    }

    /**
     ** Записи
     * @return Record[]
     */
    public function getRecords():array{
        return $this->records;
    }

    /**
     * @param Patient $patient
     *
     * @return static
     */
    public function setPatient(Patient $patient){
        $this->patient = $patient;
        $this->setId($patient->getId());
        return $this;

    }
    public function getPatient():?Patient{
        return $this->patient;
    }

    /**
     * @return static
     */
    public static function createFromRecord(Record $record){
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
    public function getFirstRecord():?Record{
        $minDateTime = new DateTime('+20 years');
        $selected = null;
        foreach($this->records as $record){
            $recordDate = $record->getSignatureDateTime()??$record->getCreationDateTime();
            if( $recordDate < $minDateTime){
                $minDateTime = $recordDate;
                $selected = $record;
            }
        }
        return $selected;
    }
}