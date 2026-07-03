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
        'contractSum' => 9878400,
        'countDifference' => 0,
        'sumDifference' => 0,
        'totalIncomeCount' => 1,
        'totalIncomeSum' => 9878400
    ];
    /**
     ** Массив информации о препаратах в контракте
     * @var InvoiceDrug[]|null
     */
    private $incomeDrugs;
    /**
     ** Массив информации о принятых препаратах по контракту
     * @var InvoiceDrug[]|null
     */
    private $receivedDrugs;

    /**
     ** Сумма контракта в копейках
     * @var int
     */
    private $contractSum;
    /**
     ** Разница между количеством препаратов в контракте и фактическим количеством прихода
     * @var int
     */
    private $countDifference;
    /**
     ** Разница между суммой контракта и фактической суммой прихода в копейках
     * @var int
     */
    private $sumDifference;
    /**
     ** Количество прихода
     * @var int
     */
    private $totalIncomeCount;
    /**
     ** Сумма прихода в копейках
     * @var int
     */
    private $totalIncomeSum;

    /**
     * @return static
     */
    public function setContractSum(?int $contractSum)
    {
        $this->contractSum = $contractSum;
        return $this;
    }
    public function getContractSum(): ?int
    {
        return $this->contractSum;
    }
    /**
     * @return static
     */
    public function setCountDifference(?int $countDifference)
    {
        $this->countDifference = $countDifference;
        return $this;
    }
    public function getCountDifference(): ?int
    {
        return $this->countDifference;
    }
    /**
     * @return static
     */
    public function setSumDifference(?int $sumDifference)
    {
        $this->sumDifference = $sumDifference;
        return $this;
    }
    public function getSumDifference(): ?int
    {
        return $this->sumDifference;
    }
    /**
     * @return static
     */
    public function setTotalIncomeCount(?int $totalIncomeCount)
    {
        $this->totalIncomeCount = $totalIncomeCount;
        return $this;
    }
    public function getTotalIncomeCount(): ?int
    {
        return $this->totalIncomeCount;
    }
    /**
     * @return static
     */
    public function setTotalIncomeSum(?int $totalIncomeSum)
    {
        $this->totalIncomeSum = $totalIncomeSum;
        return $this;
    }
    public function getTotalIncomeSum(): ?int
    {
        return $this->totalIncomeSum;
    }
    /**
     * @return static
     */
    public function setIncomeDrugs(?array $drugs)
    {
        $this->incomeDrugs = $drugs;
        return $this;
    }
    public function getIncomeDrugs(): ?array
    {
        return $this->incomeDrugs;
    }
    /**
     * @return static
     */
    public function addIncomeDrug(InvoiceDrug $drug)
    {
        if ($this->incomeDrugs === null) {
            $this->incomeDrugs = [];
        }
        $this->incomeDrugs[] = $drug;
        return $this;
    }
    /**
     * @return static
     */
    public function setReceivedDrugs(?array $drugs)
    {
        $this->receivedDrugs = $drugs;
        return $this;
    }
    public function getReceivedDrugs(): ?array
    {
        return $this->receivedDrugs;
    }
    /**
     * @return static
     */
    public function addReceivedDrug(InvoiceDrug $drug)
    {
        if ($this->receivedDrugs === null) {
            $this->receivedDrugs = [];
        }
        $this->receivedDrugs[] = $drug;
        return $this;
    }
    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        return (new static)
            ->setId(3346)
            ->setContractSum(9878400)
            ->addIncomeDrug(InvoiceDrug::createDummy($imitateReal))
            ->addReceivedDrug(InvoiceDrug::incomeCreateDummy($imitateReal))
            ->setCountDifference(0)
            ->setSumDifference(0)
            ->setTotalIncomeCount(1)
            ->setTotalIncomeSum(9878400);
    }
}
