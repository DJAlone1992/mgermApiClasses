# Методы взаимодействия

[Назад в меню](../README.md)

## Основное

Все методы адресуются по префиксу

```
http://<your-server-address>/_mgerm_external
```

Для аутентификации используется Bearer Token

## Описание точек входа

### Списки и справочники

- [/departments.php](/docs/entryPoints/lists/departments.php.md) - Список подразделений клиники
- [/doctorServices.php](/docs/entryPoints/lists/doctorServices.php.md) - Список услуг врача

### Расписание

- [/schedule.php](/docs/entryPoints/schedule/schedule.php.md) - Полное расписание на дату
- [/patientScheduledOnDate.php](/docs/entryPoints/schedule/patientScheduledOnDate.php.md) - Список всех пациентов записанных на определенную дату
- [/appointment.php](/docs/entryPoints/schedule/appointment.php.md) - Работа с направлением
- [/appointmentCallHistory.php](/docs/entryPoints/schedule/appointmentCallHistory.md) - Работа со статусом подтверждения направления

[Назад в меню](../README.md)
