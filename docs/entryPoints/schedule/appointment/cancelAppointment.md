[Назад к описанию всех режимов работы с направлением](/docs/entryPoints/schedule/appointment.php.md)

[Назад к описанию функций](/docs/usage.md)

# Удаление направления

## Параметры

Метод: POST
Параметры:
|Наименование|Обязательный|Тип|Формат|Описание|
|--|--|--|--|--|
|action|✔|const| =cancelAppointment|Тип операции|
|recordID|✔|int||Идентификатор записи направления|
|cancelReason|✔|string||Описание причины отмены направления|
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
