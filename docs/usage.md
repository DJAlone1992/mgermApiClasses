# Методы взаимодействия

## Основное

Все методы адресуются по префиксу

```
http://<your-server-address>/_mgerm_external
```

Для аутентификации используется Bearer Token

## Описание точек входа

### /departments.php

Точка входа, для получения массива подразделений клиники

#### Параметры

Метод: GET
Параметры: НЕТ

#### Ответ

В ответ получается массив подразделений [MgermApiClasses\Classes\Department](/src/Classes/Department.php)

### /doctorServices.php

Точка входа, для получения массива услуг, которые оказывает врач

#### Параметры

Метод: GET
Параметры:

- department - идентификатор подразделения, в котором проверяются услуги врача
- doctor - идентификатор врача

#### Ответ

В ответ получается массив услуг [MgermApiClasses\Classes\Service](/src/Classes/Service.php)

## /patientScheduledOnDate.php

Точка входа, для получения массива направлений на данный день

#### Параметры

Метод: GET
Параметры:

- obj - Вид направлений
   - 1 - к врачу (по умолчанию)
   - 2 - в кабинет
- date - Дата, на которую происходит проверка (сегодня по умолчанию)

#### Ответ

Список игнорирует пациентов, находящихся в стационаре
Из списка направлений могут быть исключены пациенты по фильтрам:

- Отказ от информационных сообщений в карте пациента
- Список прайс-листов клиники, для пропуска уведомления
- Список услуг клиники, для пропуска уведомления

В ответ получается массив услуг [MgermApiClasses\Classes\Referral](/src/Classes/Referral.php)

## /appointment.php

Точка входа для работы с направлениями

### Проверка направления

#### Параметры

Метод: POST
Параметры:

- action = checkAppointment
- recordID - идентификатор записи направления

#### Ответ

Направление удалено:

```json
{
	"referral": {
		"status": "cancelled"
	}
}
```

Направление есть:

```json
{
    "referral":{
        "status":"successfully",
        "startDate":<Дата и время начала приема>,
        "endDate":<Дата и время окончания приема>
    }
}
```

### Удаление направления

#### Параметры

Метод: POST
Параметры:

- action = cancelAppointment
- recordID - идентификатор записи направления
- cancelReason - Описание причины отмены направления

#### Ответ

Успешная отмена
HTTP: 200

```json
{
	"status": "success"
}
```

Ошибка
HTTP 400

### Создание направления

#### Параметры

Метод: POST
Параметры:

- action = makeAppointment
- date - дата записи
- doctorID - ID врача
- time - Время начала записи
- time_end - Время окончания записи
- service - Идентификатор услуги
- comment - Комментарий
- patientLastName - Фамилия пациента
- patientFirstName - Имя пациента
- patientSecondName - Отчество пациента
- patientBirthDay - Дата рождения пациента
- patientPhone - Номер телефона пациента

#### Ответ

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

### Корректировка направления

#### Параметры

Метод: POST
Параметры:

- action = editAppointment
- recordID - идентификатор записи направления
- cancelReason - Описание причины отмены направления
- date - дата записи
- doctorID - ID врача
- time - Время начала записи
- time_end - Время окончания записи
- service - Идентификатор услуги
- comment - Комментарий
- patientLastName - Фамилия пациента
- patientFirstName - Имя пациента
- patientSecondName - Отчество пациента
- patientBirthDay - Дата рождения пациента
- patientPhone - Номер телефона пациента

#### Ответ

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

## /schedule.php

Точка входа, по которой можно получить полное расписание

#### Параметры

Метод: GET
Параметры:

- scheduleType (int) - Тип выводимого расписания. [Константы](/src/Enum/ScheduleObjects.php)
- department (int) - Индекс подразделения, для которого выводить расписание. Если не указан - то все подразделения
- date (dateString) - Дата для вывода расписания. Если не указана - то текущая дата
- object (int) - Индекс врача или кабинета, для которого выводить расписание. Если не указан - то все врачи/кабинеты

#### Ответ

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

##### Пример ответа в формате JSON

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

## /getPatient.php

Точка входа, для получения данных пациента и регистрации новых

### Режим получения данных по идентификатору

#### Параметры

Метод: GET
Параметры:

- patientID (int) - Идентификатор пациента в базе
- getObj (bool) - Признак получения объекта [MgermApiClasses\Classes\Patient](/src/Classes/Patient.php). По умолчанию - false
- getCardData (bool) - Признак получения данных амбулаторной карты. По умолчанию - false

#### Ответ

Если включен параметр getObj, то выдается [MgermApiClasses\Classes\Patient](standart.md#mgermapiclassesclassespatient)
Если параметр getObj выключен:

- Включен параметр getCardData => выдается JSON со всеми параметрами (отличается от клиента к клиенту)
- Выключен параметр getCardData => выдается JSON

```json
{ "patientID": 1234 }
```

### Режим получения данных по параметрам

#### Параметры

Метод: GET
Параметры:

- patientLastName (string) - Фамилия для поиска
- patientFirstName (string) - Имя для поиска
- patientSecondName (string) - Отчество для поиска
- patientBirthDay (dateString) - Дата рождения для поиска
- allowRegistration (bool) - Признак того, что система должна зарегистрировать пациента при отсутствии. В данном режиме должно быть false
- getObj (bool) - Признак получения объекта [MgermApiClasses\Classes\Patient](/src/Classes/Patient.php). По умолчанию - false
- getCardData (bool) - Признак получения данных амбулаторной карты. По умолчанию - false

#### Ответ

##### Если пациент не найден

HTTP/1 404

```json
{ "reason": "Patient not found" }
```

##### Если пациент найден

Если включен параметр getObj, то выдается [MgermApiClasses\Classes\Patient](standart.md#mgermapiclassesclassespatient)
Если параметр getObj выключен:

- Включен параметр getCardData => выдается JSON со всеми параметрами (отличается от клиента к клиенту)
- Выключен параметр getCardData => выдается JSON

```json
{ "patientID": 1234 }
```

### Режим регистрации пациента

#### Параметры

Метод: GET/POST
Параметры:

- patientLastName (string) - Фамилия для поиска
- patientFirstName (string) - Имя для поиска
- patientSecondName (string) - Отчество для поиска
- patientBirthDay (dateString) - Дата рождения для поиска
- allowRegistration (bool) - Признак того, что система должна зарегистрировать пациента при отсутствии. В данном режиме должно быть true
- getObj (bool) - Признак получения объекта [MgermApiClasses\Classes\Patient](/src/Classes/Patient.php). По умолчанию - false

#### Ошибки

##### В переданной дате рождения не найдена дата

HTTP/1 400

```json
{ "reason": "Birthday is not a date string" }
```

##### В переданной фамилии есть недопустимые символы

HTTP/1 400

```json
{ "reason": "lastName has unsupported symbols" }
```

##### В переданном имени есть недопустимые символы

HTTP/1 400

```json
{ "reason": "firstName has unsupported symbols" }
```

##### В переданном отчестве есть недопустимые символы

HTTP/1 400

```json
{ "reason": "secondName has unsupported symbols" }
```

#### Ответ

##### getObj установлен

[MgermApiClasses\Classes\Patient](standart.md#mgermapiclassesclassespatient)

##### getObj не установлен

```json
{ "patientID": 1234 }
```
