# /drug_store/constants.php

Точка входа для получения констант аптеки

Поддерживает 2 режима:

- Получение списка доступных действий
- Получение константы в группе

## Режим получения списка доступных действий

### Параметры

Метод: GET Параметры:

- jsonParameters (int) - Параметры [кодирования](https://www.php.net/manual/ru/function.json-encode.php) JSON ответа

### Ответ

Массив действий доступных для получения

```json
{
  "group": [
    "GetStatusesList",
    "GetVendorsList",
    "GetTypesList",
    "GetSourcesList"
  ]
}
```

## Режим получения констант

### Параметры

Метод: GET Параметры:

- action (string) - Действие на получение списка констант из списка режима получения списка доступных действий
- jsonParameters (int) - Параметры [кодирования](https://www.php.net/manual/ru/function.json-encode.php) JSON ответа

### Ответ

Подписанный JSON с списком констант: Основное тело - массив c индексом `constants` содержащий объекты [MgermApiClasses\Classes\Constant](/src/Classes/Constant.php)

#### Пример ответа

```json
{
  "constants": [
    {
      "value": "1",
      "text": "Открыт",
      "group": "Drugstore->statuses_group"
    },
    {
      "value": "2",
      "text": "Указан список препаратов",
      "group": "Drugstore->statuses_group"
    },
    {
      "value": "3",
      "text": "Список препаратов подтвержден",
      "group": "Drugstore->statuses_group"
    }
  ],
  "signTimestamp": "<timestamp>",
  "salt": "<salt>",
  "signature": "<signature>"
}
```
