# /drug_store/contract.php

Точка входа для получения основной информации о контрактах

## Параметры

Метод: GET Параметры:

- jsonParameters (int) - Параметры [кодирования](https://www.php.net/manual/ru/function.json-encode.php) JSON ответа
- mgermID (int) - Идентификатор контракта в МИС
- parusID (string) - Идентификатор контракта в системе Парус (не используется)
- number (string) - Номер контракта
- status (int) - Статус договора (```/drug_store/constants.php?action=GetStatusesList```)
- type (int) - Тип договора (```/drug_store/constants.php?action=GetTypesList```)
- vendor (int) - Поставщик договора (```/drug_store/constants.php?action=GetVendorsList```)
- source (int) - Источник финансирования договора (```/drug_store/constants.php?action=GetSourcesList```)
- dateStartFrom (string) - Стартовая дата для поиска контракта по начальной дате (должна быть совместима с [форматами даты PHP](https://www.php.net/manual/ru/datetime.formats.php))
- dateStartTo (string)- Конечная дата для поиска контракта по начальной дате (должна быть совместима с [форматами даты PHP](https://www.php.net/manual/ru/datetime.formats.php))
- dateEndFrom (string)- Стартовая дата для поиска контракта по дате окончания (должна быть совместима с [форматами даты PHP](https://www.php.net/manual/ru/datetime.formats.php))
- dateEndTo (string)- Конечная дата для поиска контракта по дате окончания (должна быть совместима с [форматами даты PHP](https://www.php.net/manual/ru/datetime.formats.php))
- closed (int) - Признак закрытого контракта (0 - открыт, 1 -закрыт)

## Ответ

Массив объектов типа [MgermApiClasses/Classes/DrugStore/Contract.php](/src/Classes/DrugStore/Contract.php)

### Пример ответа в формате JSON

```json
{
  "0": {
    "type": {
      "value": "6",
      "text": "Разовый договор",
      "group": "Drugstore->contract_type"
    },
    "source": {
      "value": "3",
      "text": "Внебюджетные средства",
      "group": "Drugstore->source"
    },
    "status": {
      "value": "3",
      "text": "Список препаратов подтвержден",
      "group": "Drugstore->contract_status"
    },
    "vendor": {
      "value": "249",
      "text": "ООО \"НОРДФАРМ\"",
      "group": "Drugstore->vendor"
    },
    "number": "76565",
    "startDate": "2025-08-14 00:00:00",
    "finishDate": "2025-08-19 00:00:00",
    "createdAt": "2025-08-13 16:26:20",
    "sum": 82500,
    "totals": {
      "income": "82500.00",
      "left": "0.00",
      "all": "82500.00"
    },
    "income": 82500,
    "left": 0,
    "all": 82500,
    "id": 3472
  },
"signTimestamp": "<timestamp>",
  "salt": "<salt>",
  "signature": "<signature>"
}
```
