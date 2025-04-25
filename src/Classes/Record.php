<?php

namespace MgermApiClasses\Classes;

use DateTime;
use Exception;
use MgermApiClasses\Base\BaseClass;

class Record extends BaseClass
{
    public const dummyArray = [
        'id' => 1,
        'patient' => Patient::dummyArray,
        'isArchived' => false,
        'documentType' => 1,
        'recordTypeId' => 1,
        'creationDateTime' => '2020-10-20 11:12:13',
        'creator' => Doctor::dummyArray,
        'author' => Doctor::dummyArray,
        'signatureDateTime' => '2020-10-20 12:13:14',
        'isDigest' => true,
        'isDeleted' => false,
        'isIncorrect' => false,
    ];
    /**
     * @var \MgermApiClasses\Classes\Patient|null
     */
    private $patient;
    /**
     ** Запись заархивирована
     * @var bool
     */
    private $isArchived = false;
    /**
     ** Тип документа
     * @var int
     */
    private $documentType = 1;
    /**
     ** Тип записи
     * @var int
     */
    private $recordTypeId = 0;
    /**
     ** Дата создания записи
     * @var DateTime
     */
    private $creationDateTime;
    /**
     ** Номер истории болезни
     * @var int|null|null
     */
    private $hospitalizationNumber;
    /**
     * @var \MgermApiClasses\Classes\Doctor|null
     */
    private $creator;
    /**
     ** Неформализованный текст записи
     * @var string|null|null
     */
    private $text;
    /**
     ** Формализованные данные
     * @var array|null|null
     */
    private $formalizedData;
    /**
     * @var \MgermApiClasses\Classes\Doctor|null
     */
    private $author;
    /**
     ** Дата подписания записи
     * @var DateTime|null|null
     */
    private $signatureDateTime;
    /**
     ** Запись подписана
     * @var bool
     */
    private $isDigest = false;
    /**
     ** Запись удалена
     * @var bool
     */
    private $isDeleted = false;
    /**
     ** Запись неверна
     * @var bool
     */
    private $isIncorrect = false;
    /**
     ** Идентификатор связанной записи
     * @var int|null|null
     */
    private $linkedRecordID;

    /**
     * @var \MgermApiClasses\Classes\Record|null
     */
    private $linkedRecord;
    /**
     ** JSON данные
     * @var array|null|null
     */
    private $jsonData;

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        $record = new static();
        $record
            ->setId(1)
            ->setPatient(Patient::createDummy($imitateReal))
            ->setIsArchived(false)
            ->setDocumentType(1)
            ->setRecordTypeId(1)
            ->setCreationDateTime('2020-10-20 11:12:13')
            ->setCreator(Doctor::createDummy($imitateReal))
            ->setAuthor(Doctor::createDummy($imitateReal))
            ->setSignatureDateTime('2020-10-20 12:13:14')
            ->setIsDigest(true)
            ->setIsDeleted(false)
            ->setIsIncorrect(false);
        return $record;
    }
    public function getIsArchived(): bool
    {
        return $this->isArchived;
    }
    /**
     * @return static
     */
    public function setIsArchived(?bool $isArchived)
    {
        $this->isArchived = boolval($isArchived);
        return $this;
    }
    /**
     ** Пациент, которому принадлежит запись
     * @return Patient|null
     */
    public function getPatient(): ?Patient
    {
        return $this->patient;
    }
    /**
     * @return static
     */
    public function setPatient(?Patient $patient)
    {
        $this->patient = $patient;
        return $this;
    }
    public function getDocumentType(): int
    {
        return $this->documentType;
    }
    /**
     * @return static
     */
    public function setDocumentType(?int $documentType)
    {
        $this->documentType = $documentType ?? 1;
        return $this;
    }
    public function getRecordTypeId(): int
    {
        return $this->recordTypeId;
    }
    /**
     * @return static
     */
    public function setRecordTypeId(int $recordTypeId)
    {
        $this->recordTypeId = $recordTypeId;
        return $this;
    }
    public function getCreationDateTime(): DateTime
    {
        return $this->creationDateTime;
    }
    /**
     * @param null|string|int|\DateTime $creationDateTime
     * @return static
     */
    public function setCreationDateTime($creationDateTime)
    {
        if (is_string($creationDateTime)) {
            $creationDateTime = new DateTime($creationDateTime);
        }
        if (is_int($creationDateTime)) {
            $creationDateTime = new DateTime(date('Y-m-d H:i:s', $creationDateTime));
        }

        $this->creationDateTime = $creationDateTime;
        return $this;
    }
    public function getHospitalizationNumber(): ?int
    {
        return $this->hospitalizationNumber;
    }
    /**
     * @return static
     */
    public function setHospitalizationNumber(?int $hospitalizationNumber)
    {
        $this->hospitalizationNumber = $hospitalizationNumber;
        return $this;
    }
    /**
     ** Создатель записи
     * @return Doctor|null
     */
    public function getCreator(): ?Doctor
    {
        return $this->creator;
    }
    /**
     * @return static
     */
    public function setCreator(?Doctor $creator)
    {
        $this->creator = $creator;
        return $this;
    }
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * @return static
     */
    public function setText(?string $text)
    {
        $this->text = $text;
        return $this;
    }
    public function getFormalizedData(): ?array
    {
        return $this->formalizedData;
    }
    /**
     * @return static
     */
    public function setFormalizedData(?array $formalizedData)
    {
        $this->formalizedData = $formalizedData;
        return $this;
    }
    /**
     ** Автор записи
     * @return Doctor|null
     */
    public function getAuthor(): ?Doctor
    {
        return $this->author;
    }
    /**
     * @return static
     */
    public function setAuthor(?Doctor $author)
    {
        $this->author = $author;
        return $this;
    }
    public function getSignatureDateTime(): ?DateTime
    {
        return $this->signatureDateTime;
    }
    /**
     * @param null|string|int|\DateTime $signatureDateTime
     * @return static
     */
    public function setSignatureDateTime($signatureDateTime)
    {
        if (is_string($signatureDateTime)) {
            $signatureDateTime = new DateTime($signatureDateTime);
        }
        if (is_int($signatureDateTime)) {
            $signatureDateTime = new DateTime(date('Y-m-d H:i:s', $signatureDateTime));
        }
        $this->signatureDateTime = $signatureDateTime;
        return $this;
    }
    public function getIsDigest(): bool
    {
        return $this->isDigest;
    }
    /**
     * @return static
     */
    public function setIsDigest(?bool $isDigest)
    {
        $this->isDigest = boolval($isDigest);
        return $this;
    }
    public function getIsDeleted(): bool
    {
        return $this->isDeleted;
    }
    /**
     * @return static
     */
    public function setIsDeleted(?bool $isDeleted)
    {
        $this->isDeleted = boolval($isDeleted);
        return $this;
    }
    public function getIsIncorrect(): bool
    {
        return $this->isIncorrect;
    }
    /**
     * @return static
     */
    public function setIsIncorrect(?bool $isIncorrect)
    {
        $this->isIncorrect = boolval($isIncorrect);
        return $this;
    }
    public function getLinkedRecordID(): ?int
    {
        return $this->linkedRecordID;
    }
    /**
     * @return static
     */
    public function setLinkedRecordID(?int $linkedRecordID)
    {
        $this->linkedRecordID = $linkedRecordID;
        return $this;
    }
    public function getJsonData(): ?array
    {
        return $this->jsonData;
    }
    /**
     * @param string|mixed[]|null $jsonData
     * @return static
     */
    public function setJsonData($jsonData)
    {
        if (is_string($jsonData)) {
            try {
                $parsed = json_decode($jsonData, true, 512, 0);
            } catch (Exception $exception) {
                $parsed = null;
            }
            $jsonData = $parsed;
        }
        $this->jsonData = $jsonData;
        return $this;
    }

    /**
     * @return static
     */
    public function setLinkedRecord(Record $linkedRecord)
    {
        $this->linkedRecord = $linkedRecord;
        return $this;
    }

    public function getLinkedRecord(): ?Record
    {
        return $this->linkedRecord;
    }
}
