<?php

namespace MgermApiClasses\Classes\DrugStore;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Enum\DrugStore;

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
        'differenceTable' => [
            136443 => [
                'count' => 0,
                'countFloat' => 0,
                'sum' => 0,
                'sumFloat' => 0
            ]
        ],
        'contractSum' => 98784_00,
        'contractSumFloat' => 98784,
        'countDifference' => 0,
        'countDifferenceFloat' => 0,
        'sumDifference' => 0,
        'sumDifferenceFloat' => 0,
        'totalIncomeCount' => 10000,
        'totalIncomeCountFloat' => 1,
        'totalIncomeSum' => 98784_00,
        'totalIncomeSumFloat' => 98784
    ];
    /**
     ** Массив различий по каждому препарату
     * @var array
     */
    private array $differenceTable = [];

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

    public function getContractSumFloat(): ?float
    {
        return $this->contractSum === null ? null : $this->contractSum / DrugStore::RublesMultiplier;
    }
    public function getCountDifferenceFloat(): ?float
    {
        return $this->countDifference === null ? null : $this->countDifference / DrugStore::QuantityMultiplier;
    }
    public function getSumDifferenceFloat(): ?float
    {
        return $this->sumDifference === null ? null : $this->sumDifference / DrugStore::RublesMultiplier;
    }
    public function getTotalIncomeCountFloat(): ?float
    {
        return $this->totalIncomeCount === null ? null : $this->totalIncomeCount / DrugStore::QuantityMultiplier;
    }
    public function getTotalIncomeSumFloat(): ?float
    {
        return $this->totalIncomeSum === null ? null : $this->totalIncomeSum / DrugStore::RublesMultiplier;
    }
    public function getDifferenceTable(): array
    {
        return $this->differenceTable;
    }
    public function setDifferenceTable(array $differenceTable): static
    {
        $this->differenceTable = $differenceTable;
        return $this;
    }
    public function addDifferenceDrug(int $drugID, int $countDifference, int $sumDifference): static
    {
        $this->differenceTable[$drugID] = [
            'count' => $countDifference,
            'countFloat' => $countDifference / DrugStore::QuantityMultiplier,
            'sum' => $sumDifference,
            'sumFloat' => $sumDifference / DrugStore::RublesMultiplier
        ];
        return $this;
    }

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        return (new static)
            ->setId(3346)
            ->setContractSum(98784_00)
            ->addIncomeDrug(InvoiceDrug::createDummy($imitateReal))
            ->addReceivedDrug(InvoiceDrug::incomeCreateDummy($imitateReal))
            ->addDifferenceDrug(136443, 0, 0)
            ->setCountDifference(0)
            ->setSumDifference(0)
            ->setTotalIncomeCount(10000)
            ->setTotalIncomeSum(98784_00);
    }
}
