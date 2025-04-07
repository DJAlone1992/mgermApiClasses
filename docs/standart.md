# Классы простых объектов

## MgermApiClasses\Classes\Contact
Класс для описания данных подразделения. Является наследником MgermApiClasses\Base\BaseClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id|int|Идентификатор контакта|set / get|
|value|string|Значение контакта|set / get|
|type|int|Тип контакта|set / get|
#### Доступные значения для типа контактов
* 1 - Мобильный телефон
* 2 - Телефон
* 3 - Email по умолчанию
* 4 - Email
* 5 - ID Telegram (не используется)
* 6 - ID Vk (не используется)
* 0 - Неизвестно
### Тестовый набор данных для класса в формате JSON
``` json
{
    "value": "+79999999999",
    "type": 1
}
```
## MgermApiClasses\Classes\Department
Класс для описания данных подразделения. Является наследником MgermApiClasses\Base\IdNameClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id|int|Идентификатор подразделения|set / get|
|nameObj|MgermApiClasses\Base\CaseString|Наименование подразделения|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "nameObj": {
        "nominativeCase": "Поликлиническое отделение",
        "genitiveCase": "Поликлинического отделения",
        "dativeCase": "Поликлиническому отделению",
        "accusativeCase": "Поликлиническое отделение",
        "creativeCase": "Поликлиническим отделением",
        "prepositionalCase": "Поликлиническом отделении"
    },
    "name": "Поликлиническое отделение",
    "id": 1
}
```
## MgermApiClasses\Classes\Specialty
Класс для описания данных специальности. Является наследником MgermApiClasses\Base\IdNameClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id|int|Идентификатор специальности|set / get|
|nameObj|MgermApiClasses\Base\CaseString|Наименование специальности|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "nameObj": {
        "nominativeCase": "Врач общей практики",
        "genitiveCase": "Врача общей практики",
        "dativeCase": "Врачу общей практики",
        "accusativeCase": "Врача общей практики",
        "creativeCase": "Врачом общей практики",
        "prepositionalCase": "Враче общей практики"
    },
    "name": "Врач общей практики",
    "id": 1
}
```
## MgermApiClasses\Classes\Guid
Класс для описания данных группы пользователя.
Является наследником MgermApiClasses\Base\IdNameClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id|int|Идентификатор  группы пользователя|set / get|
|nameObJ|MgermApiClasses\Base\CaseStrinJ|Наименование  группы пользователя|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "nameObj": {
        "nominativeCase": "Врач-специалист",
        "genitiveCase": "Врача-специалиста",
        "dativeCase": "Врачу-специалисту",
        "accusativeCase": "Врача-специалиста",
        "creativeCase": "Врачом-специалистом",
        "prepositionalCase": "Враче-специалисте"
    },
    "name": "Врач-специалист",
    "id": 11
}
```
## MgermApiClasses\Classes\Cabinet
Класс для описания данных кабинета.
Является наследником MgermApiClasses\Base\IdNameClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id	|int	|Идентификатор  кабинета	|set / get|
|nameObj|MgermApiClasses\Base\CaseString|Наименование  кабинета|set / get|
|number|int|Номер кабинета|set / get|
|department|MgermApiClasses\Classes\Department|Подразделение, в котором  находится кабинет|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "department": {
        "nameObj": {
            "nominativeCase": "Поликлиническое отделение",
            "genitiveCase": "Поликлинического отделения",
            "dativeCase": "Поликлиническому отделению",
            "accusativeCase": "Поликлиническое отделение",
            "creativeCase": "Поликлиническим отделением",
            "prepositionalCase": "Поликлиническом отделении"
        },
        "name": "Поликлиническое отделение",
        "id": 1
    },
    "number": 100,
    "nameObj": {
        "nominativeCase": "Процедурный кабинет",
        "genitiveCase": "Процедурного кабинета",
        "dativeCase": "Процедурному кабинету",
        "accusativeCase": "Процедурный кабинет",
        "creativeCase": "Процедурным кабинетом",
        "prepositionalCase": "Процедурном кабинете"
    },
    "name": "Процедурный кабинет",
    "id": 1
}
```
## MgermApiClasses\Classes\Patient
Класс для описания данных пациента.
Является наследником MgermApiClasses\Classes\Person
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|cardNumber|int|Номер карты пациента|set / get|
|cardYear|int|Год заведения карты ( последние 2 цифры года)|set / get|
|phone|string|Номер телефона пациента|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "cardNumber": 1234,
    "cardYear": 11,
    "phone": "+79998887766",
    "fullCardNumber": "1234\/11",
    "contactsCount": 3,
    "lastNameObj": {
        "nominativeCase": "Иванов",
        "genitiveCase": "Иванова",
        "dativeCase": "Иванову",
        "accusativeCase": "Иванова",
        "creativeCase": "Ивановым",
        "prepositionalCase": "Иванове"
    },
    "sex": 1,
    "sexName": "male",
    "birthDay": "1991-01-01 00:00:00",
    "firstNameObj": {
        "nominativeCase": "Иван",
        "genitiveCase": "Ивана",
        "dativeCase": "Ивану",
        "accusativeCase": "Ивана",
        "creativeCase": "Иваном",
        "prepositionalCase": "Иване"
    },
    "secondNameObj": {
        "nominativeCase": "Иванович",
        "genitiveCase": "Ивановича",
        "dativeCase": "Ивановичу",
        "accusativeCase": "Ивановича",
        "creativeCase": "Ивановичем",
        "prepositionalCase": "Ивановиче"
    },
    "contacts": [
        {
            "value": "+7999888--66",
            "type": 2
        },
        {
            "value": "patient@patient.ru",
            "type": 3
        },
        {
            "value": "add@patient.ru",
            "type": 4
        }
    ],
    "lastName": "Иванов",
    "firstName": "Иван",
    "secondName": "Иванович",
    "id": 1
}
```
## MgermApiClasses\Classes\Hospital
Класс для описания данных ЛПУ.
Является наследником MgermApiClasses\Base\IdNameClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id|int|Идентификатор  ЛПУ. Смысла не имеет|set / get|
|nameObj|MgermApiClasses\Base\CaseString|Наименование  ЛПУ|set / get|
|address|string|Адрес ЛПУ|set / get|
|phone|string|Номер телефона ЛПУ|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "name": "Клиника \"Здоровье\"",
    "address": "Москва, ул. Пушкина, д. 896",
    "phone": "+79998887755",
    "nameObj": {
        "nominativeCase": "Клиника \"Здоровье\"",
        "genitiveCase": "Клиники \"Здоровье\"",
        "dativeCase": "Клинике \"Здоровье\"",
        "accusativeCase": "Клинику \"Здоровье\"",
        "creativeCase": "Клиникой \"Здоровье\"",
        "prepositionalCase": "Клинике \"Здоровье\""
    },
    "id": 1
}
```
## MgermApiClasses\Classes\Doctor
Класс для описания данных врача.
Является наследником MgermApiClasses\Classes\Person
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|specialty|MgermApiClasses\Classes\Specialty|Специальность врача|set / get|
|department|MgermApiClasses\Classes\Department|Подразделение врача|set / get|
|guid|MgermApiClasses\Classes\Guid|Группа пользователя врача|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "specialty": {
        "nameObj": {
            "nominativeCase": "Врач общей практики",
            "genitiveCase": "Врача общей практики",
            "dativeCase": "Врачу общей практики",
            "accusativeCase": "Врача общей практики",
            "creativeCase": "Врачом общей практики",
            "prepositionalCase": "Враче общей практики"
        },
        "name": "Врач общей практики",
        "id": 1
    },
    "department": {
        "nameObj": {
            "nominativeCase": "Поликлиническое отделение",
            "genitiveCase": "Поликлинического отделения",
            "dativeCase": "Поликлиническому отделению",
            "accusativeCase": "Поликлиническое отделение",
            "creativeCase": "Поликлиническим отделением",
            "prepositionalCase": "Поликлиническом отделении"
        },
        "name": "Поликлиническое отделение",
        "id": 1
    },
    "guid": {
        "nameObj": {
            "nominativeCase": "Врач-специалист",
            "genitiveCase": "Врача-специалиста",
            "dativeCase": "Врачу-специалисту",
            "accusativeCase": "Врача-специалиста",
            "creativeCase": "Врачом-специалистом",
            "prepositionalCase": "Враче-специалисте"
        },
        "name": "Врач-специалист",
        "id": 11
    },
    "contactsCount": 0,
    "lastNameObj": {
        "nominativeCase": "Петров",
        "genitiveCase": "Петрова",
        "dativeCase": "Петрову",
        "accusativeCase": "Петрова",
        "creativeCase": "Петровым",
        "prepositionalCase": "Петрове"
    },
    "sex": 1,
    "sexName": "male",
    "birthDay": "1992-02-02 00:00:00",
    "firstNameObj": {
        "nominativeCase": "Петр",
        "genitiveCase": "Петра",
        "dativeCase": "Петру",
        "accusativeCase": "Петра",
        "creativeCase": "Петром",
        "prepositionalCase": "Петре"
    },
    "secondNameObj": {
        "nominativeCase": "Петрович",
        "genitiveCase": "Петровича",
        "dativeCase": "Петровичу",
        "accusativeCase": "Петровича",
        "creativeCase": "Петровичем",
        "prepositionalCase": "Петровиче"
    },
    "contacts": [],
    "lastName": "Петров",
    "firstName": "Петр",
    "secondName": "Петрович",
    "id": 2
}
```
## MgermApiClasses\Classes\PriceList
Класс для описания данных прайс-листа.
Является наследником MgermApiClasses\Base\IdNameClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id|int|Идентификатор  прайс-листа|set / get|
|nameObj|MgermApiClasses\Base\CaseString|Наименование  прайс-листа|set / get|
|services|MgermApiClasses\Classes\Service[]|Список услуг|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "services": [],
    "nameObj": {
        "nominativeCase": "Консультации специалистов",
        "genitiveCase": "Консультаций специалистов",
        "dativeCase": "Консультации специалистов",
        "accusativeCase": "Консультации специалистов",
        "creativeCase": "Консультациями специалистов",
        "prepositionalCase": "Консультациях специалистов"
    },
    "name": "Консультации специалистов",
    "id": 1
}
```
## MgermApiClasses\Classes\Service
Класс для описания данных услуги.
Является наследником MgermApiClasses\Base\IdNameClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id|int|Идентификатор  услуги|set / get|
|nameObj|MgermApiClasses\Base\CaseString|Наименование  услуги|set / get|
|price|int|Стоимость услуги в копейках|set / get|
|floatPrice|float|Стоимость услуги в рублях|set / get|
|code|string|Код услуги|set / get|
|priceListId|int|Идентификатор прайс-листа|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "floatPrice": 123.45,
    "price": 12345,
    "code": "B01.026.001",
    "priceListId": 0,
    "nameObj": {
        "nominativeCase": "Прием (осмотр, консультация) врача общей практики (семейного врача) первичный",
        "genitiveCase": "Приема (осмотр, консультация) врача общей практики (семейного врача) первичного",
        "dativeCase": "Прием (осмотр, консультация) врача общей практики (семейного врача) первичный",
        "accusativeCase": "Прием (осмотр, консультация) врача общей практики (семейного врача) первичный",
        "creativeCase": "Приемом (осмотр, консультация) врача общей практики (семейного врача) первичным",
        "prepositionalCase": "Приеме (осмотр, консультация) врача общей практики (семейного врача) первичном"
    },
    "name": "Прием (осмотр, консультация) врача общей практики (семейного врача) первичный",
    "id": 1
}
```
## MgermApiClasses\Classes\Record
Класс для описания данных медицинской записи.
Является наследником MgermApiClasses\Base\BaseClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id|int|Идентификатор  записи|set / get|
|patient|MgermApiClasses\Classes\Patient|Данные пациента|set / get|
|isArchived|bool|Признак архивной записи|set / get|
|documentType|int|Тип документа: 1 - Амбулаторная карта 2 - История болезни	|set / get|
|recordTypeId|int|Идентификатор типа записи|set / get|
|creationDateTime|DateTime|Дата и время создания записи|set / get|
|hospitalizationNumber|int|Идентификатор истории болезни|set / get|
|creator|MgermApiClasses\Classes\Doctor|Идентификатор врача, создавший запись|set / get|
|text|string|Текст записи|set / get|
|formalizedData|array|Массив данных записи|set / get|
|author|MgermApiClasses\Classes\Doctor|Идентификатор врача, подписавший запись|set / get|
|signatureDateTime|DateTime|Дата и время подписания записи|set / get|
|isDigest|bool|Признак того, что запись была подписана	|set / get|
|isDeleted|bool|Признак удаленной записи|set / get|
|isIncorrect|bool|Признак того, что запись отмечена как неверная|set / get|
|linkedRecordID|int|Идентификатор связанной записи|set / get|
|linkedRecord|MgermApiClasses\Classes\Record|Данные связанной записи|set / get|
|jsonData|array|Дополнительные данные записи|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "isArchived": false,
    "patient": {
        "cardNumber": 1234,
        "cardYear": 11,
        "phone": "+79998887766",
        "fullCardNumber": "1234\/11",
        "contactsCount": 3,
        "lastNameObj": {
            "nominativeCase": "Иванов",
            "genitiveCase": "Иванова",
            "dativeCase": "Иванову",
            "accusativeCase": "Иванова",
            "creativeCase": "Ивановым",
            "prepositionalCase": "Иванове"
        },
        "sex": 1,
        "sexName": "male",
        "birthDay": "1991-01-01 00:00:00",
        "firstNameObj": {
            "nominativeCase": "Иван",
            "genitiveCase": "Ивана",
            "dativeCase": "Ивану",
            "accusativeCase": "Ивана",
            "creativeCase": "Иваном",
            "prepositionalCase": "Иване"
        },
        "secondNameObj": {
            "nominativeCase": "Иванович",
            "genitiveCase": "Ивановича",
            "dativeCase": "Ивановичу",
            "accusativeCase": "Ивановича",
            "creativeCase": "Ивановичем",
            "prepositionalCase": "Ивановиче"
        },
        "contacts": [
            {
                "value": "+7999888--66",
                "type": 2
            },
            {
                "value": "patient@patient.ru",
                "type": 3
            },
            {
                "value": "add@patient.ru",
                "type": 4
            }
        ],
        "lastName": "Иванов",
        "firstName": "Иван",
        "secondName": "Иванович",
        "id": 1
    },
    "documentType": 1,
    "recordTypeId": 1,
    "creationDateTime": "2020-10-20 11:12:13",
    "creator": {
        "specialty": {
            "nameObj": {
                "nominativeCase": "Врач общей практики",
                "genitiveCase": "Врача общей практики",
                "dativeCase": "Врачу общей практики",
                "accusativeCase": "Врача общей практики",
                "creativeCase": "Врачом общей практики",
                "prepositionalCase": "Враче общей практики"
            },
            "name": "Врач общей практики",
            "id": 1
        },
        "department": {
            "nameObj": {
                "nominativeCase": "Поликлиническое отделение",
                "genitiveCase": "Поликлинического отделения",
                "dativeCase": "Поликлиническому отделению",
                "accusativeCase": "Поликлиническое отделение",
                "creativeCase": "Поликлиническим отделением",
                "prepositionalCase": "Поликлиническом отделении"
            },
            "name": "Поликлиническое отделение",
            "id": 1
        },
        "guid": {
            "nameObj": {
                "nominativeCase": "Врач-специалист",
                "genitiveCase": "Врача-специалиста",
                "dativeCase": "Врачу-специалисту",
                "accusativeCase": "Врача-специалиста",
                "creativeCase": "Врачом-специалистом",
                "prepositionalCase": "Враче-специалисте"
            },
            "name": "Врач-специалист",
            "id": 11
        },
        "contactsCount": 0,
        "lastNameObj": {
            "nominativeCase": "Петров",
            "genitiveCase": "Петрова",
            "dativeCase": "Петрову",
            "accusativeCase": "Петрова",
            "creativeCase": "Петровым",
            "prepositionalCase": "Петрове"
        },
        "sex": 1,
        "sexName": "male",
        "birthDay": "1992-02-02 00:00:00",
        "firstNameObj": {
            "nominativeCase": "Петр",
            "genitiveCase": "Петра",
            "dativeCase": "Петру",
            "accusativeCase": "Петра",
            "creativeCase": "Петром",
            "prepositionalCase": "Петре"
        },
        "secondNameObj": {
            "nominativeCase": "Петрович",
            "genitiveCase": "Петровича",
            "dativeCase": "Петровичу",
            "accusativeCase": "Петровича",
            "creativeCase": "Петровичем",
            "prepositionalCase": "Петровиче"
        },
        "contacts": [],
        "lastName": "Петров",
        "firstName": "Петр",
        "secondName": "Петрович",
        "id": 2
    },
    "author": {
        "specialty": {
            "nameObj": {
                "nominativeCase": "Врач общей практики",
                "genitiveCase": "Врача общей практики",
                "dativeCase": "Врачу общей практики",
                "accusativeCase": "Врача общей практики",
                "creativeCase": "Врачом общей практики",
                "prepositionalCase": "Враче общей практики"
            },
            "name": "Врач общей практики",
            "id": 1
        },
        "department": {
            "nameObj": {
                "nominativeCase": "Поликлиническое отделение",
                "genitiveCase": "Поликлинического отделения",
                "dativeCase": "Поликлиническому отделению",
                "accusativeCase": "Поликлиническое отделение",
                "creativeCase": "Поликлиническим отделением",
                "prepositionalCase": "Поликлиническом отделении"
            },
            "name": "Поликлиническое отделение",
            "id": 1
        },
        "guid": {
            "nameObj": {
                "nominativeCase": "Врач-специалист",
                "genitiveCase": "Врача-специалиста",
                "dativeCase": "Врачу-специалисту",
                "accusativeCase": "Врача-специалиста",
                "creativeCase": "Врачом-специалистом",
                "prepositionalCase": "Враче-специалисте"
            },
            "name": "Врач-специалист",
            "id": 11
        },
        "contactsCount": 0,
        "lastNameObj": {
            "nominativeCase": "Петров",
            "genitiveCase": "Петрова",
            "dativeCase": "Петрову",
            "accusativeCase": "Петрова",
            "creativeCase": "Петровым",
            "prepositionalCase": "Петрове"
        },
        "sex": 1,
        "sexName": "male",
        "birthDay": "1992-02-02 00:00:00",
        "firstNameObj": {
            "nominativeCase": "Петр",
            "genitiveCase": "Петра",
            "dativeCase": "Петру",
            "accusativeCase": "Петра",
            "creativeCase": "Петром",
            "prepositionalCase": "Петре"
        },
        "secondNameObj": {
            "nominativeCase": "Петрович",
            "genitiveCase": "Петровича",
            "dativeCase": "Петровичу",
            "accusativeCase": "Петровича",
            "creativeCase": "Петровичем",
            "prepositionalCase": "Петровиче"
        },
        "contacts": [],
        "lastName": "Петров",
        "firstName": "Петр",
        "secondName": "Петрович",
        "id": 2
    },
    "signatureDateTime": "2020-10-20 12:13:14",
    "isDigest": true,
    "isDeleted": false,
    "isIncorrect": false,
    "id": 1
}
```
## MgermApiClasses\Classes\Referral
Класс для описания данных направления.
Является наследником MgermApiClasses\Base\DateTimeStartTimeEndClass
### Описание полей
| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
|id|int|Идентификатор  записи направления|set / get|
|patient|MgermApiClasses\Classes\Patient|Данные пациента|set / get|
|doctor|MgermApiClasses\Classes\Doctor|Данные врача, к которому направлен пациент|set / get|
|department|MgermApiClasses\Classes\Department|Данные отделения, в которое  направлен пациент|set / get|
|hospital|MgermApiClasses\Classes\Hospital|Данные ЛПУ|set / get|
|service|MgermApiClasses\Classes\Service|Услуга, на которую направлен пациент|set / get|
|cabinet|MgermApiClasses\Classes\Cabinet|Кабинет, в который направлен пациент|set / get|
### Тестовый набор данных для класса в формате JSON
``` json
{
    "department": {
        "nameObj": {
            "nominativeCase": "Поликлиническое отделение",
            "genitiveCase": "Поликлинического отделения",
            "dativeCase": "Поликлиническому отделению",
            "accusativeCase": "Поликлиническое отделение",
            "creativeCase": "Поликлиническим отделением",
            "prepositionalCase": "Поликлиническом отделении"
        },
        "name": "Поликлиническое отделение",
        "id": 1
    },
    "doctor": {
        "specialty": {
            "nameObj": {
                "nominativeCase": "Врач общей практики",
                "genitiveCase": "Врача общей практики",
                "dativeCase": "Врачу общей практики",
                "accusativeCase": "Врача общей практики",
                "creativeCase": "Врачом общей практики",
                "prepositionalCase": "Враче общей практики"
            },
            "name": "Врач общей практики",
            "id": 1
        },
        "department": {
            "nameObj": {
                "nominativeCase": "Поликлиническое отделение",
                "genitiveCase": "Поликлинического отделения",
                "dativeCase": "Поликлиническому отделению",
                "accusativeCase": "Поликлиническое отделение",
                "creativeCase": "Поликлиническим отделением",
                "prepositionalCase": "Поликлиническом отделении"
            },
            "name": "Поликлиническое отделение",
            "id": 1
        },
        "guid": {
            "nameObj": {
                "nominativeCase": "Врач-специалист",
                "genitiveCase": "Врача-специалиста",
                "dativeCase": "Врачу-специалисту",
                "accusativeCase": "Врача-специалиста",
                "creativeCase": "Врачом-специалистом",
                "prepositionalCase": "Враче-специалисте"
            },
            "name": "Врач-специалист",
            "id": 11
        },
        "contactsCount": 0,
        "lastNameObj": {
            "nominativeCase": "Петров",
            "genitiveCase": "Петрова",
            "dativeCase": "Петрову",
            "accusativeCase": "Петрова",
            "creativeCase": "Петровым",
            "prepositionalCase": "Петрове"
        },
        "sex": 1,
        "sexName": "male",
        "birthDay": "1992-02-02 00:00:00",
        "firstNameObj": {
            "nominativeCase": "Петр",
            "genitiveCase": "Петра",
            "dativeCase": "Петру",
            "accusativeCase": "Петра",
            "creativeCase": "Петром",
            "prepositionalCase": "Петре"
        },
        "secondNameObj": {
            "nominativeCase": "Петрович",
            "genitiveCase": "Петровича",
            "dativeCase": "Петровичу",
            "accusativeCase": "Петровича",
            "creativeCase": "Петровичем",
            "prepositionalCase": "Петровиче"
        },
        "contacts": [],
        "lastName": "Петров",
        "firstName": "Петр",
        "secondName": "Петрович",
        "id": 2
    },
    "patient": {
        "cardNumber": 1234,
        "cardYear": 11,
        "phone": "+79998887766",
        "fullCardNumber": "1234\/11",
        "contactsCount": 3,
        "lastNameObj": {
            "nominativeCase": "Иванов",
            "genitiveCase": "Иванова",
            "dativeCase": "Иванову",
            "accusativeCase": "Иванова",
            "creativeCase": "Ивановым",
            "prepositionalCase": "Иванове"
        },
        "sex": 1,
        "sexName": "male",
        "birthDay": "1991-01-01 00:00:00",
        "firstNameObj": {
            "nominativeCase": "Иван",
            "genitiveCase": "Ивана",
            "dativeCase": "Ивану",
            "accusativeCase": "Ивана",
            "creativeCase": "Иваном",
            "prepositionalCase": "Иване"
        },
        "secondNameObj": {
            "nominativeCase": "Иванович",
            "genitiveCase": "Ивановича",
            "dativeCase": "Ивановичу",
            "accusativeCase": "Ивановича",
            "creativeCase": "Ивановичем",
            "prepositionalCase": "Ивановиче"
        },
        "contacts": [
            {
                "value": "+7999888--66",
                "type": 2
            },
            {
                "value": "patient@patient.ru",
                "type": 3
            },
            {
                "value": "add@patient.ru",
                "type": 4
            }
        ],
        "lastName": "Иванов",
        "firstName": "Иван",
        "secondName": "Иванович",
        "id": 1
    },
    "hospital": {
        "name": "Клиника \"Здоровье\"",
        "address": "Москва, ул. Пушкина, д. 896",
        "phone": "+79998887755",
        "nameObj": {
            "nominativeCase": "Клиника \"Здоровье\"",
            "genitiveCase": "Клиники \"Здоровье\"",
            "dativeCase": "Клинике \"Здоровье\"",
            "accusativeCase": "Клинику \"Здоровье\"",
            "creativeCase": "Клиникой \"Здоровье\"",
            "prepositionalCase": "Клинике \"Здоровье\""
        },
        "id": 1
    },
    "service": {
        "floatPrice": 123.45,
        "price": 12345,
        "code": "B01.026.001",
        "priceListId": 0,
        "nameObj": {
            "nominativeCase": "Прием (осмотр, консультация) врача общей практики (семейного врача) первичный",
            "genitiveCase": "Приема (осмотр, консультация) врача общей практики (семейного врача) первичного",
            "dativeCase": "Прием (осмотр, консультация) врача общей практики (семейного врача) первичный",
            "accusativeCase": "Прием (осмотр, консультация) врача общей практики (семейного врача) первичный",
            "creativeCase": "Приемом (осмотр, консультация) врача общей практики (семейного врача) первичным",
            "prepositionalCase": "Приеме (осмотр, консультация) врача общей практики (семейного врача) первичном"
        },
        "name": "Прием (осмотр, консультация) врача общей практики (семейного врача) первичный",
        "id": 1
    },
    "cabinet": {
        "department": {
            "nameObj": {
                "nominativeCase": "Поликлиническое отделение",
                "genitiveCase": "Поликлинического отделения",
                "dativeCase": "Поликлиническому отделению",
                "accusativeCase": "Поликлиническое отделение",
                "creativeCase": "Поликлиническим отделением",
                "prepositionalCase": "Поликлиническом отделении"
            },
            "name": "Поликлиническое отделение",
            "id": 1
        },
        "number": 100,
        "nameObj": {
            "nominativeCase": "Процедурный кабинет",
            "genitiveCase": "Процедурного кабинета",
            "dativeCase": "Процедурному кабинету",
            "accusativeCase": "Процедурный кабинет",
            "creativeCase": "Процедурным кабинетом",
            "prepositionalCase": "Процедурном кабинете"
        },
        "name": "Процедурный кабинет",
        "id": 1
    },
    "timeStart": "1999-09-09 09:09:00",
    "timeEnd": "1999-09-09 10:10:00",
    "date": "1999-09-09 00:00:00",
    "id": 123456789
}
```