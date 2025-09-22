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

Если включен параметр getObj, то выдается [MgermApiClasses\Classes\Patient](/docs/standart.md#mgermapiclassesclassespatient)
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

Если включен параметр getObj, то выдается [MgermApiClasses\Classes\Patient](/docs/standart.md#mgermapiclassesclassespatient)
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

[MgermApiClasses\Classes\Patient](/docs/standart.md#mgermapiclassesclassespatient)

##### getObj не установлен

```json
{ "patientID": 1234 }
```
