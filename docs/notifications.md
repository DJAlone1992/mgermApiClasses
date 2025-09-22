# Классы для уведомлений

[Назад в меню](../README.md)

## MgermApiClasses\Notifications\TemplatedNotification

Класс для передачи уведомления в механизмы, которое предусматривает обработку через шаблонизатор.
Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

| Поле     | Тип                                                                          | Описание                               | Доступные методы |
| -------- | ---------------------------------------------------------------------------- | -------------------------------------- | ---------------- |
| patient  | [MgermApiClasses\Classes\Patient](standart.md#mgermapiclassesclassespatient) | Данные пациента                        | set / get        |
| template | string                                                                       | Шаблон уведомления, совместимый с Twig | set / get        |

### Тестовый набор данных для класса в формате JSON

```json
{
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
	"template": "Привет, {{ firstName }}!"
}
```

[Назад в меню](../README.md)

## MgermApiClasses\Notifications\SimpleNotification

Класс для передачи уведомления в механизмы как есть.
Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

| Поле    | Тип                                                                      | Описание                   | Доступные методы |
| ------- | ------------------------------------------------------------------------ | -------------------------- | ---------------- |
| patient | [MgermApiClasses\Simple\Patient](simple.md#mgermapiclassessimplepatient) | Упрощенные данные пациента | set / get        |
| message | string                                                                   | Готовый текст уведомления  | set / get        |

### Описание дополнительных функций

<table>
    <thead>
        <tr>
            <th>Функция</th><th>Аргументы функции</th><th>Тип возвращаемого значение</th><th>Описание</th><th>Дополнительная информация</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="3">createFromData</td>
            <td>message : string</td>
            <td rowspan="3">static</td>
            <td rowspan="3">Создание экземпляра по данным</td>
            <td rowspan="3"></td>
        </tr>
        <tr>
            <td>phone : string</td>
        </tr>
        <tr>
            <td>patientID : int </td>
        </tr>
    </tbody>
</table>

### Тестовый набор данных для класса в формате JSON

```json
{
	"patient": {
		"phone": "+79998887766",
		"id": 1
	},
	"message": "Текст сообщения"
}
```

[Назад в меню](../README.md)

## MgermApiClasses\Notifications\Complex\TemplatedNotificationForMultiplePatients

Класс для передачи уведомления в механизмы, которое предусматривает обработку через шаблонизатор. Предполагается отправка одного шаблона сразу нескольким пациентам
Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

| Поле     | Тип                                                                            | Описание                               | Доступные методы |
| -------- | ------------------------------------------------------------------------------ | -------------------------------------- | ---------------- |
| patients | [MgermApiClasses\Classes\Patient](standart.md#mgermapiclassesclassespatient)[] | Массив пациентов                       | set / get        |
| template | string                                                                         | Шаблон уведомления, совместимый с Twig | set / get        |

### Описание дополнительных функций

| Функция    | Аргументы функции                                                                    | Тип возвращаемого значение | Описание                            | Дополнительная информация |
| ---------- | ------------------------------------------------------------------------------------ | -------------------------- | ----------------------------------- | ------------------------- |
| addPatient | patient:[MgermApiClasses\Classes\Patient](standart.md#mgermapiclassesclassespatient) | static                     | Добавление нового пациента в список |

### Тестовый набор данных для класса в формате JSON

```json
{
	"patients": [
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
	],
	"template": "Привет, {{ firstName }}!"
}
```

[Назад в меню](../README.md)
