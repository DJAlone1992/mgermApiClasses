# /drug_store/contract.php

Точка входа для получения информации о контракте. Препараты входящие в контракт и их поставка.

## Параметры

Метод: GET

Параметры:

- jsonParameters (int) - Параметры [кодирования](https://www.php.net/manual/ru/function.json-encode.php) JSON ответа
- mgermID (int) - Идентификатор контракта в МИС
- externalReceiver - Внешний получатель (запланированный параметр. При соответствии параметра заранее обговоренному поведению, может изменить выходные данные)

## Ответ

Объект типа [MgermApiClasses/Classes/DrugStore/ContractTable.php](/src/Classes/DrugStore/ContractTable.php)
