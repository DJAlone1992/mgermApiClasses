<?php

namespace MgermApiClasses\Classes\DrugStore;

use DateTime;
use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Constant;

class InvoiceDrug extends BaseClass
{
    public const dummyArray = [
        'id' => 136443,
        'invoiceID' => 27952,
        'drug' => Drug::dummyArray,
        'quantity' => 36_0000,
        'sum' => 98784_00,
        'price' => 2744_00,
        'fundingSource' => [
            'id' => 1,
            'text' => 'Внебюджетные средства',
            'group' => 'Drugstore->source',
            'value' => '3'
        ],
        'manufacturer' => [
            'id' => 1,
            'text' => 'Эском НПК ОАО',
            'group' => 'Drugstore->manufacturer',
            'value' => '119'
        ],
        'createdAt' => '2025-05-21 13:28:01',
        'incomeDate'        => '2025-05-21 00:00:00',
        'invoiceNumber' => 'contract_3346',
        'quantityFloat' => 36.0,
        'sumFloat' => 98784.0,
        'priceFloat' => 2744.0
    ];
    public const IncomeDummyArray = [
        'id' => 136582,
        'invoiceID' => 27988,
        'drug' => Drug::dummyArray,
        'quantity' => 36_0000,
        'sum' => 98784_00,
        'price' => 2744_00,
        'fundingSource' => [
            'id' => 1,
            'text' => 'Внебюджетные средства',
            'group' => 'Drugstore->source',
            'value' => '3'
        ],
        'manufacturer' => [
            'id' => 1,
            'text' => 'Эском НПК ОАО',
            'group' => 'Drugstore->manufacturer',
            'value' => '119'
        ],
        'createdAt' => '2025-05-23 09:49:54',
        'incomeDate'        => '2025-05-22 00:00:00',
        'invoiceNumber' => '65/05',
        'quantityFloat' => 36.0,
        'sumFloat' => 98784.0,
        'priceFloat' => 2744.0
    ];
    /**
     ** Информация о лекарственном препарате
     * @var Drug
     * @see medis_drug_store.invoice.kodmedupak09
     */
    private ?Drug $drug = null;
    /**
     ** Количество (1 шт = 10000)
     * @var int
     * @see medis_drug_store.invoice.origin_count * 10000
     */
    private ?int $quantity = null;
    /**
     ** Сумма в копейках (1 р = 100)
     * @var int
     * @see medis_drug_store.invoice.origin_count * medis_drug_store.invoice.medcena09
     */
    private ?int $sum = null;
    /**
     ** Цена в копейках (1 р = 100)
     * @var int
     * @see medis_drug_store.invoice.medcena09 * 100
     */
    private ?int $price = null;
    /**
     ** Дата окончания срока годности
     * @var DateTime
     * @see medis_drug_store.invoice.medsrokgodn09
     */
    private ?DateTime $expirationDate = null;

    /**
     ** Источник финансирования
     * @var Constant
     * @see medis_drug_store.invoice.source_type_invoice
     * @see medis_interface.default_constants group = 'Drugstore->source'
     */
    private ?Constant $fundingSource = null;
    /**
     ** Производитель
     * @var Constant
     * @see medis_drug_store.invoice.manufacturer_id
     * @see medis_interface.default_constants group = 'Drugstore->manufacturer'
     */
    private ?Constant $manufacturer = null;
    /**
     ** Дата создания накладной
     * @var DateTime
     * @see medis_drug_store.invoice_in_caption.creation_date
     */
    private ?DateTime $createdAt = null;
    /**
     ** Дата прихода
     * @var DateTime
     * @see medis_drug_store.invoice_in_caption.nakladdata05
     */
    private ?DateTime $incomeDate = null;
    /**
     ** Номер накладной
     * @var string
     * @see medis_drug_store.invoice_in_caption.nakladnomer05
     */
    private ?string $invoiceNumber = null;
    /**
     ** Идентификатор накладной
     * @var int
     * @see medis_drug_store.invoice_in_caption.nakladin05
     */
    private ?int $invoiceID = null;

    /**
     * @return static
     */
    public function setDrug(?Drug $drug)
    {
        $this->drug = $drug;
        return $this;
    }
    public function getDrug(): ?Drug
    {
        return $this->drug;
    }
    /**
     * @return static
     */
    public function setQuantity(?int $quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }
    public function getQuantityFloat(): ?float
    {
        return $this->quantity === null ? null : $this->quantity / 10000;
    }
    /**
     * @return static
     */
    public function setSum(?int $sum)
    {
        $this->sum = $sum;
        return $this;
    }
    public function getSum(): ?int
    {
        return $this->sum;
    }
    public function getSumFloat(): ?float
    {
        return $this->sum === null ? null : $this->sum / 100;
    }
    /**
     * @return static
     */
    public function setPrice(?int $price)
    {
        $this->price = $price;
        return $this;
    }
    public function getPrice(): ?int
    {
        return $this->price;
    }
    public function getPriceFloat(): ?float
    {
        return $this->price === null ? null : $this->price / 100;
    }

    /**
     * @param \DateTime|string|null $expirationDate
     * @return static
     */
    public function setExpirationDate($expirationDate)
    {
        if ($expirationDate === null) {
            $this->expirationDate = null;
            return $this;
        }
        if (is_string($expirationDate)) {
            try {
                $expirationDate = new DateTime($expirationDate);
            } catch (\Exception $e) {
                $this->expirationDate = null;
                return $this;
            }
        }
        $this->expirationDate = $expirationDate;
        return $this;
    }
    public function getExpirationDate(): ?DateTime
    {
        return $this->expirationDate;
    }
    /**
     * @return static
     */
    public function setFundingSource(?Constant $fundingSource)
    {
        $this->fundingSource = $fundingSource;
        return $this;
    }
    public function getFundingSource(): ?Constant
    {
        return $this->fundingSource;
    }
    /**
     * @return static
     */
    public function setManufacturer(?Constant $manufacturer)
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }
    public function getManufacturer(): ?Constant
    {
        return $this->manufacturer;
    }
    /**
     * @param \DateTime|string|null $createdAt
     * @return static
     */
    public function setCreatedAt($createdAt)
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
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|string|null $incomeDate
     * @return static
     */
    public function setIncomeDate($incomeDate)
    {
        if ($incomeDate === null) {
            $this->incomeDate = null;
            return $this;
        }
        if (is_string($incomeDate)) {
            try {
                $incomeDate = new DateTime($incomeDate);
            } catch (\Exception $e) {
                $this->incomeDate = null;
                return $this;
            }
        }
        $this->incomeDate = $incomeDate;
        return $this;
    }
    public function getIncomeDate(): ?DateTime
    {
        return $this->incomeDate;
    }
    /**
     * @return static
     */
    public function setInvoiceNumber(?string $invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }
    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    /**
     * @return static
     */
    public function setInvoiceID(?int $invoiceID)
    {
        $this->invoiceID = $invoiceID;
        return $this;
    }

    public function getInvoiceID(): ?int
    {
        return $this->invoiceID;
    }


    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        return (new static)
            ->setId(136443)
            ->setDrug(Drug::createDummy($imitateReal))
            ->setInvoiceID(27952)
            ->setQuantity(36_0000)
            ->setSum(98784_00)
            ->setPrice(2744_00)
            ->setFundingSource((new Constant)->setId(1)->setText('Внебюджетные средства')->setGroup('Drugstore->source')->setValue(3))
            ->setManufacturer((new Constant)->setId(1)->setText('Эском НПК ОАО')->setGroup('Drugstore->manufacturer')->setValue(119))
            ->setCreatedAt(new DateTime('2025-05-21 13:28:01'))
            ->setIncomeDate(new DateTime('2025-05-21 00:00:00'))
            ->setInvoiceNumber('contract_3346');
    }
    /**
     * @return static
     */
    public static function incomeCreateDummy(bool $imitateReal = false)
    {
        return (new self)
            ->setId(136582)
            ->setDrug(Drug::createDummy($imitateReal))
            ->setInvoiceID(27988)
            ->setQuantity(36_0000)
            ->setSum(98784_00)
            ->setPrice(2744_00)
            ->setFundingSource((new Constant)->setId(1)->setText('Внебюджетные средства')->setGroup('Drugstore->source')->setValue(3))
            ->setManufacturer((new Constant)->setId(1)->setText('Эском НПК ОАО')->setGroup('Drugstore->manufacturer')->setValue(119))
            ->setCreatedAt(new DateTime('2025-05-23 09:49:54'))
            ->setIncomeDate(new DateTime('2025-05-22 00:00:00'))
            ->setInvoiceNumber('65/05');
    }
}
