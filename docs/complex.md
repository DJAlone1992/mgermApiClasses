# Комплексные классы

## MgermApiClasses\Complex\PatientsReferrals

Класс для передачи всех направлений пациента сгруппированных по пациенту.
Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

| Поле      | Тип                                                                              | Описание           | Доступные методы |
| --------- | -------------------------------------------------------------------------------- | ------------------ | ---------------- |
| patient   | [MgermApiClasses\Classes\Patient](standart.md#mgermapiclassesclassespatient)     | Данные пациента    | set / get        |
| referrals | [MgermApiClasses\Classes\Referral](standart.md#mgermapiclassesclassesreferral)[] | Список направлений | set / get        |

### Описание дополнительных функций

| Функция            | Аргументы функции                                                                       | Тип возвращаемого значение                                                     | Описание                                                            | Дополнительная информация     |
| ------------------ | --------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------ | ------------------------------------------------------------------- | ----------------------------- |
| appendReferral     | referral:[MgermApiClasses\Classes\Referral](standart.md#mgermapiclassesclassesreferral) | static                                                                         | Добавление нового направления в список                              |                               |
| createFromReferral | referral:[MgermApiClasses\Classes\Referral](standart.md#mgermapiclassesclassesreferral) | static                                                                         | Преобразует направление в класс. Добавляется только это направление | Может быть вызвано статически |
| getFirstReferral   | -                                                                                       | [MgermApiClasses\Classes\Referral](standart.md#mgermapiclassesclassesreferral) | Получает первое направление по дате и времени                       |                               |

### Тестовый набор данных для класса в формате JSON

```json
{
	"referrals": [
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
	],
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
	"firstReferral": {
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
	},
	"id": 1
}
```

## MgermApiClasses\Complex\PatientsRecords

Класс для передачи всех записей пациента сгруппированных по пациенту.
Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

| Поле    | Тип                                                                          | Описание        | Доступные методы |
| ------- | ---------------------------------------------------------------------------- | --------------- | ---------------- |
| patient | [MgermApiClasses\Classes\Patient](standart.md#mgermapiclassesclassespatient) | Данные пациента | set / get        |
| records | [MgermApiClasses\Classes\Record](standart.md#mgermapiclassesclassesrecord)[] | Список записей  | set / get        |

### Описание дополнительных функций

| Функция          | Аргументы функции                                                                 | Тип возвращаемого значение                                                 | Описание                                                       | Дополнительная информация     |
| ---------------- | --------------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------- | ----------------------------- |
| appendRecord     | record:[MgermApiClasses\Classes\Record](standart.md#mgermapiclassesclassesrecord) | static                                                                     | Добавление новой записи в список                               |                               |
| createFromRecord | record:[MgermApiClasses\Classes\Record](standart.md#mgermapiclassesclassesrecord) | static                                                                     | Преобразует направление в класс. Добавляется только эта запись | Может быть вызвано статически |
| getFirstRecord   | -                                                                                 | [MgermApiClasses\Classes\Record](standart.md#mgermapiclassesclassesrecord) | Получает первую запись по дате и времени                       |                               |

### Тестовый набор данных для класса в формате JSON

```json
{
	"records": [
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
	],
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
	"firstRecord": {
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
	},
	"id": 1
}
```

## MgermApiClasses\Complex\ScheduledDoctor

Класс для передачи врача с его расписанием.
Является наследником [MgermApiClasses\Complex\ScheduledObject](abstract.md#mgermapiclassescomplexscheduledobject)

### Описание полей

| Поле   | Тип                                                                        | Описание     | Доступные методы |
| ------ | -------------------------------------------------------------------------- | ------------ | ---------------- |
| doctor | [MgermApiClasses\Classes\Doctor](standart.md#mgermapiclassesclassesdoctor) | Данные врача | set / get        |

### Тестовый набор данных для класса в формате JSON

```json
{
	"intervalDuration": 60,
	"interval": true,
	"services": [
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
	],
	"cells": [
		{
			"free": true,
			"interval": true,
			"timeStart": "1999-09-09 09:09:00",
			"timeEnd": "1999-09-09 10:10:00",
			"date": "1999-09-09 00:00:00"
		}
	],
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
	"id": 1
}
```

## MgermApiClasses\Complex\ScheduledDepartment

Класс для передачи подразделения со списком врачей с их расписанием.
Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

| Поле       | Тип                                                                                             | Описание                       | Доступные методы |
| ---------- | ----------------------------------------------------------------------------------------------- | ------------------------------ | ---------------- |
| department | [MgermApiClasses\Classes\Department](standart.md#mgermapiclassesclassesdepartment)              | Данные подразделения           | set / get        |
| doctors    | [MgermApiClasses\Complex\ScheduledDoctor](complex.md#mgermapiclassescomplexscheduleddoctor)[]   | Список врачей с расписанием    | set / get        |
| cabinets   | [MgermApiClasses\Complex\ScheduledCabinet](complex.md#mgermapiclassescomplexscheduledcabinet)[] | Список кабинетов с расписанием | set / get        |

### Описание дополнительных функций

| Функция               | Аргументы функции                                                                                    | Тип возвращаемого значение | Описание                                      | Дополнительная информация |
| --------------------- | ---------------------------------------------------------------------------------------------------- | -------------------------- | --------------------------------------------- | ------------------------- |
| appendDoctor          | doctor:[MgermApiClasses\Complex\ScheduledDoctor](complex.md#mgermapiclassescomplexscheduleddoctor)   | static                     | Добавление нового врача в список              |                           |
| appendCabinet         | doctor:[MgermApiClasses\Complex\ScheduledCabinet](complex.md#mgermapiclassescomplexscheduledcabinet) | static                     | Добавление нового кабинета в список           |
| appendScheduledObject | object:[MgermApiClasses\Complex\ScheduledObject](abstract.md#mgermapiclassescomplexscheduledobject)  | static                     | Добавление нового кабинета или врача в список |                           |

### Тестовый набор данных для класса в формате JSON

```json
{
	"doctors": [
		{
			"intervalDuration": 60,
			"interval": true,
			"services": [
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
			],
			"cells": [
				{
					"free": true,
					"interval": true,
					"timeStart": "1999-09-09 09:09:00",
					"timeEnd": "1999-09-09 10:10:00",
					"date": "1999-09-09 00:00:00"
				}
			],
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
			"id": 1
		}
	],
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
	"id": 1
}
```

## MgermApiClasses\Complex\ScheduledCabinet

Класс для передачи кабинета с его расписанием.
Является наследником [MgermApiClasses\Complex\ScheduledObject](abstract.md#mgermapiclassescomplexscheduledobject)

### Описание полей

| Поле    | Тип                                                                          | Описание        | Доступные методы |
| ------- | ---------------------------------------------------------------------------- | --------------- | ---------------- |
| cabinet | [MgermApiClasses\Classes\Cabinet](standart.md#mgermapiclassesclassescabinet) | Данные кабинета | set / get        |

### Тестовый набор данных для класса в формате JSON

```json
{
	"intervalDuration": 60,
	"interval": true,
	"services": [
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
	],
	"cells": [
		{
			"isBreak": false,
			"isProlongation": false,
			"isReserved": false,
			"isBlocked": false,
			"free": true,
			"interval": true,
			"timeStart": "1999-09-09 09:09:00",
			"timeEnd": "1999-09-09 10:10:00",
			"date": "1999-09-09 00:00:00"
		},
		{
			"isBreak": false,
			"isProlongation": false,
			"isReserved": true,
			"isBlocked": false,
			"free": false,
			"interval": true,
			"timeStart": "1999-09-09 09:09:00",
			"timeEnd": "1999-09-09 10:10:00",
			"date": "1999-09-09 00:00:00"
		},
		{
			"isBreak": false,
			"isProlongation": false,
			"isReserved": false,
			"isBlocked": true,
			"free": false,
			"interval": true,
			"timeStart": "1999-09-09 09:09:00",
			"timeEnd": "1999-09-09 10:10:00",
			"date": "1999-09-09 00:00:00"
		},
		{
			"isBreak": true,
			"isProlongation": false,
			"isReserved": false,
			"isBlocked": false,
			"free": false,
			"interval": true,
			"timeStart": "1999-09-09 09:09:00",
			"timeEnd": "1999-09-09 10:10:00",
			"date": "1999-09-09 00:00:00"
		},
		{
			"isBreak": false,
			"referralID": 123,
			"isProlongation": true,
			"isReserved": false,
			"isBlocked": false,
			"free": false,
			"interval": true,
			"timeStart": "1999-09-09 09:09:00",
			"timeEnd": "1999-09-09 10:10:00",
			"date": "1999-09-09 00:00:00"
		},
		{
			"isBreak": false,
			"isProlongation": false,
			"isReserved": false,
			"isBlocked": false,
			"free": false,
			"interval": true,
			"referral": {
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
				"record": {
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
				"id": 1
			},
			"timeStart": "1999-09-09 09:09:00",
			"timeEnd": "1999-09-09 10:10:00",
			"date": "1999-09-09 00:00:00"
		}
	],
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
	"callOnly": false,
	"id": 1
}
```
