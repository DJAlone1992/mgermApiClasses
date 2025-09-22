[Назад к описанию всех режимов работы с направлением](/docs/entryPoints/schedule/appointment.php.md)

[Назад к описанию функций](/docs/usage.md)

# Проверка направления

## Параметры

Метод: GET
Параметры:

- action = checkAppointment
- recordID - идентификатор записи направления

### Ответ

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

[Назад к описанию всех режимов работы с направлением](/docs/entryPoints/schedule/appointment.php.md)

[Назад к описанию функций](/docs/usage.md)
