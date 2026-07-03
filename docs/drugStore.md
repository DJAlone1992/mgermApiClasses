# Классы аптечных объектов

[Назад в меню](../README.md)

## MgermApiClasses\Classes\DrugStore\Contract

Класс для описания контракта на закупку препаратов (общая информация)

Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

Поле       | Тип                                                                            | Описание                                        | Доступные методы
---------- | ------------------------------------------------------------------------------ | ----------------------------------------------- | ----------------
id         | int                                                                            | Идентификатор контракта                         | set / get
type       | [MgermApiClasses\Classes\Constant](standart.md#mgermapiclassesclassesconstant) | Тип контракта                                   | set / get
source     | [MgermApiClasses\Classes\Constant](abstract.md#mgermapiclassesbasecasestring)  | Источник финансирования                         | set / get
status     | [MgermApiClasses\Classes\Constant](abstract.md#mgermapiclassesbasecasestring)  | Статус                                          | set / get
vendor     | [MgermApiClasses\Classes\Constant](abstract.md#mgermapiclassesbasecasestring)  | Поставщик                                       | set / get
number     | string                                                                         | Номер контракта                                 | set / get
parusID    | string                                                                         | Идентификатор контракта в системе Парус         | set / get
startDate  | DateTime                                                                       | Дата начала контракта                           | set / get
finishDate | DateTime                                                                       | Дата окончания контракта                        | set / get
createdAt  | DateTime                                                                       | Дата создания контракта                         | set / get
sum        | int                                                                            | Сумма контракта (в копейках)                    | set / get
totals     | array                                                                          | Массив из income,left,all                       | set / get
income     | int                                                                            | Сумма, поставленная по препаратам (в копейках)  | set / get
left       | int                                                                            | Осталось к поставке (в копейках)                | set / get
all        | int                                                                            | Всего сумма контракта по препаратам(в копейках) | set / get

## MgermApiClasses\Classes\DrugStore\ContractTable

Класс для отображения информации по контракту на закупку препаратов

Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

Поле             | Тип                                                                                                            | Описание                                                                           | Доступные методы
---------------- | -------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- | ----------------
id               | int                                                                                                            | Идентификатор контракта                                                            | set / get
incomeDrugs      | array<[MgermApiClasses\Classes\DrugStore\InvoiceDrug](drugStore.md#mgermapiclassesclassesdrugstoreinvocedrug)> | Массив информации о препаратах в контракте                                         | set / get
receivedDrugs    | array<[MgermApiClasses\Classes\DrugStore\InvoiceDrug](drugStore.md#mgermapiclassesclassesdrugstoreinvocedrug)> | Массив информации о принятых препаратах по контракту                               | set / get
contractSum      | int                                                                                                            | Сумма контракта в копейках                                                         | set / get
countDifference  | int                                                                                                            | Разница между количеством препаратов в контракте и фактическим количеством прихода | set / get
sumDifference    | int                                                                                                            | Разница между суммой контракта и фактической суммой прихода в копейках             | set / get
totalIncomeCount | int                                                                                                            | Количество прихода                                                                 | set / get
totalIncomeSum   | int                                                                                                            | Сумма прихода в копейках                                                           | set / get

## MgermApiClasses\Classes\DrugStore\InvoiceDrug

Класс для поставки препарата. Включает информацию о самом препарате и о данных прихода

Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

Поле           | Тип                                                                                        | Описание                             | Доступные методы
-------------- | ------------------------------------------------------------------------------------------ | ------------------------------------ | ----------------
id             | int                                                                                        | Идентификатор поставки препарата     | set / get
drug           | [MgermApiClasses\Classes\DrugStore\Drug](drugStore.md#mgermapiclassesclassesdrugstoredrug) | Информация о лекарственном препарате | set / get
quantity       | int                                                                                        | Количество (1 шт = 10000)            | set / get
sum            | int                                                                                        | Сумма в копейках (1 р = 100)         | set / get
price          | int                                                                                        | Цена в копейках (1 р = 100)          | set / get
expirationDate | DateTime                                                                                   | Дата окончания срока годности        | set / get
fundingSource  | Constant                                                                                   | var Constant                         | set / get
manufacturer   | Constant                                                                                   | var Constant                         | set / get
createdAt      | DateTime                                                                                   | Дата создания накладной              | set / get
incomeDate     | DateTime                                                                                   | Дата прихода                         | set / get
invoiceNumber  | string                                                                                     | Номер накладной                      | set / get
invoiceID      | int                                                                                        | Идентификатор накладной              | set / get

### Описание дополнительных функций

Функция          | Аргументы функции | Тип возвращаемого значение | Описание                      | Дополнительная информация
---------------- | ----------------- | -------------------------- | ----------------------------- | -------------------------
getQuantityFloat | -                 | float                      | Получение количества в штуках |
getSumFloat      | -                 | float                      | Получение суммы в рублях      |
getPriceFloat    | -                 | float                      | Получение цены в рублях       |

## MgermApiClasses\Classes\DrugStore\Drug

Класс данных препарата

Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

Поле          | Тип                                                                            | Описание                                                   | Доступные методы
------------- | ------------------------------------------------------------------------------ | ---------------------------------------------------------- | ----------------
id            | int                                                                            | Идентификатор препарата                                    | set / get
fullDrugName  | string                                                                         | Полное название препарата                                  | set / get
name          | string                                                                         | Название препарата                                         | set / get
inn           | string                                                                         | Международное непатентованное наименование (МНН)           | set / get
latinName     | string                                                                         | Латинское название                                         | set / get
latinInn      | string                                                                         | Латинское международное непатентованное наименование (МНН) | set / get
group         | [MgermApiClasses\Classes\Constant](standart.md#mgermapiclassesclassesconstant) | Группа учета                                               | set / get
isVed         | bool                                                                           | Является ЖНВЛП                                             | set / get
dosageInUnits | int                                                                            | Дозировка в единицах измерения (1 ед = 100)                | set / get
dosageUnit    | string                                                                         | Наименование единицы измерения                             | set / get
releaseForm   | string                                                                         | Форма выпуска препарата                                    | set / get
boxMeasure    | [MgermApiClasses\Classes\Constant](standart.md#mgermapiclassesclassesconstant) | Мера упаковки                                              | set / get
unitMeasure   | [MgermApiClasses\Classes\Constant](standart.md#mgermapiclassesclassesconstant) | Единица фасовки                                            | set / get

[Назад в меню](../README.md)
