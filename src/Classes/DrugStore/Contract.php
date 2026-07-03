<?php

namespace MgermApiClasses\Classes\DrugStore;

use DateTime;
use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Constant;

class Contract extends BaseClass
{
    public const dummyArray = [
        'id' => 3346,
        'type' => [
            'id' => 1,
            'text' => 'Разовый договор',
            'value' => '6',
            'group' => 'Drugstore->contract_type'
        ],
        'source' => [
            'id' => 1,
            'text' => 'Внебюджетные средства',
            'value' => '3',
            'group' => 'Drugstore->source'
        ],
        'status' => [
            'id' => 1,
            'text' => 'Список препаратов подтвержден',
            'value' => '3',
            'group' => 'Drugstore->contract_status'
        ],
        'vendor' => [
            'id' => 1,
            'text' => 'ООО "НОРДФАРМ"',
            'value' => '249',
            'group' => 'Drugstore->vendor'
        ],
        'number' => '73436',
        'parusID' => '',
        'startDate' => '2025-05-22 00:00:00',
        'finishDate' => '2025-05-23 00:00:00',
        'createdAt' => '2025-05-21 13:28:01',
        'sum' => 98784_00,
        'income' => 98784_00,
        'left' => 0,
        'all' => 98784_00,
        'totals' => [
            'income' => 98784_00,
            'left' => 0,
            'all' => 98784_00
        ]
    ];
    /**
     ** Тип договора
     * @var Constant
     * @see medis_drug_store.contracts.type
     * @see medis_interface.default_constants group = 'Drugstore->contract_type'
     */
    private ?Constant $type = null;
    /**
     ** Источник финансирования договора
     * @var Constant
     * @see medis_drug_store.contracts.fin_source
     * @see medis_interface.default_constants group = 'Drugstore->source'
     */
    private ?Constant $source = null;
    /**
     ** Статус договора
     * @var Constant
     * @see medis_drug_store.contracts.current_status
     * @see medis_interface.default_constants group = 'Drugstore->contract_status'
     */
    private ?Constant $status = null;
    /**
     ** Поставщик договора
     * @var Constant
     * @see medis_drug_store.contracts.vendor
     * @see medis_interface.default_constants group = 'Drugstore->vendor'
     */
    private ?Constant $vendor = null;
    /**
     ** Номер договора
     * @var string
     * @see medis_drug_store.contracts.number
     */
    private ?string $number = null;
    /**
     ** ID договора в системе Парус
     * @var string
     * @see medis_drug_store.contracts.parus_id //Не реализовано
     */
    private ?string $parusID = null;
    /**
     ** Дата начала договора
     * @var DateTime
     * @see medis_drug_store.contracts.date_start
     */
    private ?DateTime $startDate = null;
    /**
     ** Дата конца договора
     * @var DateTime
     * @see medis_drug_store.contracts.date_finish
     */
    private ?DateTime $finishDate = null;
    /**
     ** Дата создания договора
     * @var DateTime
     * @see medis_drug_store.contracts.creation_date
     */
    private ?DateTime $createdAt = null;
    /**
     ** Сумма договора в копейках
     * @var int
     * @see medis_drug_store.contracts.summ * 100
     */
    private ?int $sum = null;
    /**
     ** Суммы договора по данным препаратов
     * @var array
     */
    private ?array $totals = null;
    /**
     ** Приход
     * @var float
     */
    private ?float $income = null;
    /**
     ** Остаток к поставке
     * @var float
     */
    private ?float $left = null;
    /**
     ** Всего
     * @var float
     */
    private ?float $all = null;

    public function getType(): ?Constant
    {
        return $this->type;
    }

    public function setType(?Constant $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getSource(): ?Constant
    {
        return $this->source;
    }

    public function setSource(?Constant $source): static
    {
        $this->source = $source;
        return $this;
    }

    public function getStatus(): ?Constant
    {
        return $this->status;
    }

    public function setStatus(?Constant $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getVendor(): ?Constant
    {
        return $this->vendor;
    }

    public function setVendor(?Constant $vendor): static
    {
        $this->vendor = $vendor;
        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): static
    {
        $this->number = $number;
        return $this;
    }

    public function getParusID(): ?string
    {
        return $this->parusID;
    }

    public function setParusID(?string $parusID): static
    {
        $this->parusID = $parusID;
        return $this;
    }

    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(DateTime|string|null $startDate): static
    {
        if ($startDate === null) {
            $this->startDate = null;
            return $this;
        }
        if (is_string($startDate)) {
            try {
                $startDate = new DateTime($startDate);
            } catch (\Exception $e) {
                $this->startDate = null;
                return $this;
            }
        }
        $this->startDate = $startDate;
        return $this;
    }

    public function getFinishDate(): ?DateTime
    {
        return $this->finishDate;
    }

    public function setFinishDate(DateTime|string|null $finishDate): static
    {
        if ($finishDate === null) {
            $this->finishDate = null;
            return $this;
        }
        if (is_string($finishDate)) {
            try {
                $finishDate = new DateTime($finishDate);
            } catch (\Exception $e) {
                $this->finishDate = null;
                return $this;
            }
        }
        $this->finishDate = $finishDate;
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime|string|null $createdAt): static
    {
        if ($createdAt === null) {
            $this->createdAt = null;
            return $this;
        }
        if (is_string($createdAt)) {
            try {
                $createdAt = new DateTime($createdAt);
            } catch (\Exception $e) {
                $this->createdAt = null;
                return $this;
            }
        }
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getSum(): ?int
    {
        return $this->sum;
    }

    public function setSum(?int $sum): static
    {
        $this->sum = $sum;
        return $this;
    }

    public function getTotals(): ?array
    {
        return $this->totals;
    }

    public function setTotals(?array $totals): static
    {
        $this->totals = $totals;
        if (is_array($totals)) {
            if (isset($totals['income'])) {
                $this->income = $totals['income'];
            }
            if (isset($totals['left'])) {
                $this->left = $totals['left'];
            }
            if (isset($totals['all'])) {
                $this->all = $totals['all'];
            }
        } else {
            $this->income = null;
            $this->left = null;
            $this->all = null;
        }
        return $this;
    }

    public function getIncome(): ?float
    {
        return $this->income;
    }

    public function setIncome(?float $income): static
    {
        $this->income = $income;
        if ($this->totals === null) {
            $this->totals = [];
        }
        $this->totals['income'] = $income;
        return $this;
    }

    public function getLeft(): ?float
    {
        return $this->left;
    }

    public function setLeft(?float $left): static
    {
        $this->left = $left;
        if ($this->totals === null) {
            $this->totals = [];
        }
        $this->totals['left'] = $left;
        return $this;
    }

    public function getAll(): ?float
    {
        return $this->all;
    }

    public function setAll(?float $all): static
    {
        $this->all = $all;
        if ($this->totals === null) {
            $this->totals = [];
        }
        $this->totals['all'] = $all;
        return $this;
    }

    public static function createDummy(bool $imitateReal = false): static
    {
        $me = new static();
        $me->setId(3346)
            ->setType((new Constant())->setId(1)->setText('Разовый договор')->setValue(6)->setGroup('Drugstore->contract_type'))
            ->setSource((new Constant())->setId(1)->setText('Внебюджетные средства')->setValue(3)->setGroup('Drugstore->source'))
            ->setStatus((new Constant())->setId(1)->setText('Список препаратов подтвержден')->setValue(3)->setGroup('Drugstore->contract_status'))
            ->setVendor((new Constant())->setId(1)->setText('ООО "НОРДФАРМ"')->setValue(249)->setGroup('Drugstore->vendor'))
            ->setNumber('73436')
            ->setParusID('')
            ->setStartDate(new DateTime('2025-05-22 00:00:00'))
            ->setFinishDate(new DateTime('2025-05-23 00:00:00'))
            ->setCreatedAt(new DateTime('2025-05-21 13:28:01'))
            ->setSum(98784_00)
            ->setTotals([
                'income' => 98784_00,
                'left' => 0,
                'all' => 98784_00
            ]);
        return $me;
    }
}
