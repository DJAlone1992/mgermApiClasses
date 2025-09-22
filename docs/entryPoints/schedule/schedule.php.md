[Назад к описанию функций](/docs/usage.md)

# /schedule.php

Точка входа, по которой можно получить полное расписание

## Параметры

Метод: GET
Параметры:

- scheduleType (int) - Тип выводимого расписания. [Константы](/src/Enum/ScheduleObjects.php)
- department (int) - Индекс подразделения, для которого выводить расписание. Если не указан - то все подразделения
- date (dateString) - Дата для вывода расписания. Если не указана - то текущая дата
- object (int) - Индекс врача или кабинета, для которого выводить расписание. Если не указан - то все врачи/кабинеты

### Ответ

Формат: JSON
Структура соответствует классам взаимодействия
Основное тело - массив [<Индекс> => [MgermApiClasses\Complex\ScheduledDepartment](/src/Complex/ScheduledDepartment.php)]

В теле запроса добавлены исключения и дополнения:

- Из объекта [MgermApiClasses\Classes\Referral](/src/Classes/Referral.php) убрано:
   - department - Подразделение, есть выше по структуре
   - doctor - Врач, есть выше по структуре
   - hospital - Данные ЛПУ, известны заранее
   - cabinet - Кабинет, всегда пустой
- Из объекта [MgermApiClasses\Classes\Record](/src/Classes/Record.php) убрано:
   - formalizedData - Формализованные данные. Не имеют смысла в данном контексте

#### Пример ответа в формате JSON

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
					"isReserved": false,
					"isBlocked": true,
					"free": false,
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
	"indexing": false,
	"id": 1
}
```

[Назад к описанию функций](/docs/usage.md)
