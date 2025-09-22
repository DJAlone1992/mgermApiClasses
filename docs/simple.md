# Упрощенные классы

[Назад в меню](../README.md)

## MgermApiClasses\Simple\Patient

Класс для передачи только базовой информации о пациенте.
Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)
Реализует интерфейс [PatientNecessaryNotificationDataInterface](interfaces.md#mgermapiclassesinterfacespatientnecessarynotificationdatainterface)

### Описание полей

| Поле  | Тип    | Описание                | Доступные методы |
| ----- | ------ | ----------------------- | ---------------- |
| phone | string | Номер телефона пациента | set / get        |

### Тестовый набор данных для класса в формате JSON

```json
{
	"phone": "+79998887766",
	"id": 1
}
```

[Назад в меню](../README.md)
