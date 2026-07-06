<?php

namespace MgermApiClasses\Classes\DrugStore;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Constant;

class Drug extends BaseClass
{
    public const dummyArray = [
        'id' => 2759,
        'fullDrugName' => 'Natrii chloridum (Natrii chloridum) 9 mg/ml 200 ml № 28 раствор',
        'name' => 'Натрия хлорид',
        'inn' => 'Натрия хлорид',
        'latinName' => 'Natrii chloridum',
        'latinInn' => 'Natrii chloridum',
        'isVed' => true,
        'group' => [
            'id' => 1,
            'text' => 'Общая группа медикаментов',
            'group' => 'Drugstore->drug_groups',
            'value' => '116'
        ],
        'dosageUnit' => 'мл',
        'dosageInUnits' => 200_00,
        'releaseForm' => 'флакон',
        'boxMeasure' => [
            'id' => 1,
            'text' => 'флакон',
            'group' => 'Drugstore->measurement_unit_code',
            'value' => '25'
        ],
        'unitMeasure' => [
            'id' => 1,
            'text' => 'флакон',
            'group' => 'Drugstore->measurement_unit_code',
            'value' => '25'
        ]
    ];
    /**
     ** Код параметров упаковки
     * @var int
     * @see medis_drug_store.invoice.kodmedupak09
     */
    private ?int $packageID = null;
    /**
     ** Полное название препарата
     * @var string
     */
    private ?string $fullDrugName = null;
    /**
     ** Название препарата
     * @var string
     * @see medis_drug_store.drugs.nazvmed01
     */

    private ?string $name = null;
    /**
     ** Международное непатентованное наименование (МНН)
     * @var string
     * @see medis_drug_store.drugs.nazvnepatmed01
     */
    private ?string $inn = null;

    /**
     ** Латинское название
     * @var string
     * @see medis_drug_store.drugs.latin_name
     */
    private ?string $latinName = null;

    /**
     ** Латинское международное непатентованное наименование (МНН)
     * @var string
     * @see medis_drug_store.drugs.MNN_latin
     */
    private ?string $latinInn = null;
    /**
     ** Группа учета
     * @var Constant
     * @see medis_drug_store.drugs.uchetgrup01
     * @see medis_interface.default_constants group = 'Drugstore->drug_groups'
     */
    private ?Constant $group = null;
    /**
     ** Является ЖНВЛП
     * @var bool
     * @see medis_drug_store.drugs.zhnvlp
     */
    private bool $isVed = false;

    /**
     ** Дозировка в единицах измерения (1 ед = 100)
     * @var int
     * @see medis_drug_store.package_parameters.dose_number * 100
     */
    private ?int $dosageInUnits = null;

    /**
     ** Наименование единицы измерения
     * @var string
     * @see medis_drug_store.package_parameters.dosage
     */
    private ?string $dosageUnit = null;
    /**
     ** Форма выпуска препарата
     * @var string
     * @see medis_drug_store.package_parameters.package_type
     */
    private ?string $releaseForm = null;
    /**
     ** Мера упаковки
     * @var Constant
     * @see medis_drug_store.package_parameters.box_mesure
     * @see medis_interface.default_constants group = 'Drugstore->measurement_unit_code'
     */
    private ?Constant $boxMeasure = null;
    /**
     ** Единица фасовки
     * @var Constant
     * @see medis_drug_store.package_parameters.unit_mesure
     * @see medis_interface.default_constants group = 'Drugstore->measurement_unit_code'
     */
    private ?Constant $unitMeasure = null;

    public function getPackageID(): ?int
    {
        return $this->packageID;
    }
    public function setPackageID(?int $packageID): static
    {
        $this->packageID = $packageID;
        return $this;
    }
    public function getFullDrugName(): ?string
    {
        return $this->fullDrugName;
    }
    public function setFullDrugName(?string $fullName): static
    {
        $this->fullDrugName = $fullName;
        return $this;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }
    public function getInn(): ?string
    {
        return $this->inn;
    }
    public function setInn(?string $inn): static
    {
        $this->inn = $inn;
        return $this;
    }
    public function getLatinName(): ?string
    {
        return $this->latinName;
    }
    public function setLatinName(?string $latinName): static
    {
        $this->latinName = $latinName;
        return $this;
    }
    public function getLatinInn(): ?string
    {
        return $this->latinInn;
    }
    public function setLatinInn(?string $latinInn): static
    {
        $this->latinInn = $latinInn;
        return $this;
    }
    public function getIsVed(): bool
    {
        return $this->isVed;
    }
    public function setIsVed(bool $isVed): static
    {
        $this->isVed = $isVed;
        return $this;
    }
    public function getDosageInUnits(): ?int
    {
        return $this->dosageInUnits;
    }
    public function setDosageInUnits(?int $dosageInUnits): static
    {
        $this->dosageInUnits = $dosageInUnits;
        return $this;
    }
    public function getDosageUnit(): ?string
    {
        return $this->dosageUnit;
    }
    public function setDosageUnit(?string $dosageUnit): static
    {
        $this->dosageUnit = $dosageUnit;
        return $this;
    }
    public function getReleaseForm(): ?string
    {
        return $this->releaseForm;
    }
    public function setReleaseForm(?string $releaseForm): static
    {
        $this->releaseForm = $releaseForm;
        return $this;
    }
    public function getGroup(): ?Constant
    {
        return $this->group;
    }
    public function setGroup(?Constant $group): static
    {
        $this->group = $group;
        return $this;
    }
    public function getBoxMeasure(): ?Constant
    {
        return $this->boxMeasure;
    }
    public function setBoxMeasure(?Constant $boxMeasure): static
    {
        $this->boxMeasure = $boxMeasure;
        return $this;
    }
    public function getUnitMeasure(): ?Constant
    {
        return $this->unitMeasure;
    }
    public function setUnitMeasure(?Constant $unitMeasure): static
    {
        $this->unitMeasure = $unitMeasure;
        return $this;
    }
    public static function createDummy(bool $imitateReal = false): static
    {
        $me = new static();
        $me
            ->setId(2759)
            ->setFullDrugName('Natrii chloridum (Natrii chloridum) 9 mg/ml 200 ml № 28 раствор')
            ->setName('Натрия хлорид')
            ->setInn('Натрия хлорид')
            ->setLatinName('Natrii chloridum')
            ->setLatinInn('Natrii chloridum')
            ->setIsVed(true)
            ->setGroup((new Constant)
                    ->setId(1)
                    ->setText('Общая группа медикаментов')
                    ->setGroup('Drugstore->drug_groups')
                    ->setValue(116)
            )
            ->setDosageUnit('мл')
            ->setDosageInUnits(200_00)
            ->setReleaseForm('флакон')
            ->setBoxMeasure((new Constant)
                    ->setId(1)
                    ->setText('флакон')
                    ->setGroup('Drugstore->measurement_unit_code')
                    ->setValue(25)
            )
            ->setUnitMeasure((new Constant)
                    ->setId(1)
                    ->setText('флакон')
                    ->setGroup('Drugstore->measurement_unit_code')
                    ->setValue(25)
            );
        return $me;
    }
}
