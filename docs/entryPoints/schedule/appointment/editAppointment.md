[Назад к описанию всех режимов работы с направлением](/docs/entryPoints/schedule/appointment.php.md)

[Назад к описанию функций](/docs/usage.md)

# Корректировка направления

## Параметры

Метод: POST
Параметры:
|Наименование|Обязательный|Тип|Формат|Описание|
|--|--|--|--|--|
|action|✔|const| =editAppointment|Тип операции|
|recordID|✔|int||Идентификатор записи направления|
|cancelReason|✔|string||Описание причины отмены направления|
|date|✔|string |[Y-m-d (PHP)](https://www.php.net/manual/ru/datetime.format.php) |Дата записи|
|doctorID|✔|int| |ID врача|
|department|✔|int| |Отделение записи|
|time|✔|string| [H:i:s (PHP)](https://www.php.net/manual/ru/datetime.format.php)|Время начала записи|
|time_end|✔|string| [H:i:s (PHP)](https://www.php.net/manual/ru/datetime.format.php)|Время окончания записи|
|service|✔|int| |Идентификатор услуги|
|comment||string| |Комментарий|
|patientLastName|✔|string| |Фамилия пациента|
|patientFirstName|✔| string| |Имя пациента|
|patientSecondName|✔| string| |Отчество пациента|
|patientBirthDay|✔| string| |Дата рождения пациента|
|patientPhone|✔|string |+7xxxyyyyyyy [E164](https://github.com/giggsey/libphonenumber-for-php/blob/master/docs/PhoneNumberUtil.md#format) |Номер телефона пациента|
### Ответ

Успешное создание направления

```json
{
    "status":"success",
    "record":<Идентификатор записи направления>
}
```

Ошибка

```json
{
    "status":"error",
    "reason":<Описание типа ошибки при создании>,
    "code":<Код ошибки при создании>,
}
```

Коды ошибок:

- -1 - Запись на дату в прошлом
- -2 - Ячейка занята
- -3 - У пациента уже есть направление к другому врачу на это же время
- -4 - Номер телефона пациента не распознан

[Назад к описанию всех режимов работы с направлением](/docs/entryPoints/schedule/appointment.php.md)

[Назад к описанию функций](/docs/usage.md)
