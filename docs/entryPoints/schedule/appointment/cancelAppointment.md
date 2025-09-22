[Назад к описанию всех режимов работы с направлением](/docs/entryPoints/schedule/appointment.php.md)

[Назад к описанию функций](/docs/usage.md)

# Удаление направления

## Параметры

Метод: GET
Параметры:

- action = cancelAppointment
- recordID - идентификатор записи направления
- cancelReason - Описание причины отмены направления

### Ответ

Успешная отмена
HTTP: 200

```json
{
	"status": "success"
}
```

Ошибка
HTTP 400

[Назад к описанию всех режимов работы с направлением](/docs/entryPoints/schedule/appointment.php.md)

[Назад к описанию функций](/docs/usage.md)
