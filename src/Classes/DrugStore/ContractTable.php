<?php

namespace MgermApiClasses\Classes\DrugStore;

use MgermApiClasses\Base\BaseClass;

class ContractTable extends BaseClass
{
    public const dummyArray = [
        'id' => 3346,
        'incomeDrugs' => [
            InvoiceDrug::dummyArray
        ],
        'receivedDrugs' => [
            InvoiceDrug::IncomeDummyArray
        ],
        'contractSum' => 98784_00,
        'countDifference' => 0,
        'sumDifference' => 0,
        'totalIncomeCount' => 1,
        'totalIncomeSum' => 98784_00
    ];
    /**
     ** Массив информации о препаратах в контракте
     * @var InvoiceDrug[]|null
     */
    private ?array $incomeDrugs = null;
    /**
     ** Массив информации о принятых препаратах по контракту
     * @var InvoiceDrug[]|null
     */
    private ?array $receivedDrugs = null;

    /**
     ** Сумма контракта в копейках
     * @var int
     */
    private ?int $contractSum = null;
    /**
     ** Разница между количеством препаратов в контракте и фактическим количеством прихода
     * @var int
     */
    private ?int $countDifference = null;
    /**
     ** Разница между суммой контракта и фактической суммой прихода в копейках
     * @var int
     */
    private ?int $sumDifference = null;
    /**
     ** Количество прихода
     * @var int
     */
    private ?int $totalIncomeCount = null;
    /**
     ** Сумма прихода в копейках
     * @var int
     */
    private ?int $totalIncomeSum = null;

    public function setContractSum(?int $contractSum): static
    {
        $this->contractSum = $contractSum;
        return $this;
    }
    public function getContractSum(): ?int
    {
        return $this->contractSum;
    }
    public function setCountDifference(?int $countDifference): static
    {
        $this->countDifference = $countDifference;
        return $this;
    }
    public function getCountDifference(): ?int
    {
        return $this->countDifference;
    }
    public function setSumDifference(?int $sumDifference): static
    {
        $this->sumDifference = $sumDifference;
        return $this;
    }
    public function getSumDifference(): ?int
    {
        return $this->sumDifference;
    }
    public function setTotalIncomeCount(?int $totalIncomeCount): static
    {
        $this->totalIncomeCount = $totalIncomeCount;
        return $this;
    }
    public function getTotalIncomeCount(): ?int
    {
        return $this->totalIncomeCount;
    }
    public function setTotalIncomeSum(?int $totalIncomeSum): static
    {
        $this->totalIncomeSum = $totalIncomeSum;
        return $this;
    }
    public function getTotalIncomeSum(): ?int
    {
        return $this->totalIncomeSum;
    }
    public function setIncomeDrugs(?array $drugs): static
    {
        $this->incomeDrugs = $drugs;
        return $this;
    }
    public function getIncomeDrugs(): ?array
    {
        return $this->incomeDrugs;
    }
    public function addIncomeDrug(InvoiceDrug $drug): static
    {
        if ($this->incomeDrugs === null) {
            $this->incomeDrugs = [];
        }
        $this->incomeDrugs[] = $drug;
        return $this;
    }
    public function setReceivedDrugs(?array $drugs): static
    {
        $this->receivedDrugs = $drugs;
        return $this;
    }
    public function getReceivedDrugs(): ?array
    {
        return $this->receivedDrugs;
    }
    public function addReceivedDrug(InvoiceDrug $drug): static
    {
        if ($this->receivedDrugs === null) {
            $this->receivedDrugs = [];
        }
        $this->receivedDrugs[] = $drug;
        return $this;
    }
    public static function createDummy(bool $imitateReal = false): static
    {
        return (new static)
            ->setId(3346)
            ->setContractSum(98784_00)
            ->addIncomeDrug(InvoiceDrug::createDummy($imitateReal))
            ->addReceivedDrug(InvoiceDrug::incomeCreateDummy($imitateReal))
            ->setCountDifference(0)
            ->setSumDifference(0)
            ->setTotalIncomeCount(1)
            ->setTotalIncomeSum(98784_00);
    }
}
