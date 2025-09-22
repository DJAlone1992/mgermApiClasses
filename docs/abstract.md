# Абстрактные базовые классы

[Назад в меню](../README.md)

Это классы, являющиеся родителями для всех остальных классов. Используется для унификации работы

## MgermApiClasses\Base\BaseClass

Самый базовый абстрактный класс. Все классы взаимодействия наследуются от него.

### Описание полей:

| Поле | Тип                   | Описание              | Доступные методы |
| ---- | --------------------- | --------------------- | ---------------- |
| id   | integer / Целое число | Идентификатор объекта | set / get        |

## MgermApiClasses\Base\CaseString

Единственный класс, не являющийся наследником MgermApiClasses\Base\BaseClass. Представляет из себя список склонений текста по падежам. Обычно используется в наименованиях объектов. Обычно заполняется только именительный падеж

### Описание полей

| Поле              | Тип             | Описание           | Доступные методы |
| ----------------- | --------------- | ------------------ | ---------------- |
| nominativeCase    | string / Строка | Именительный падеж | set / get        |
| genitiveCase      | string / Строка | Родительный падеж  | set / get        |
| dativeCase        | string / Строка | Дательный падеж    | set / get        |
| accusativeCase    | string / Строка | Винительный падеж  | set / get        |
| creativeCase      | string / Строка | Творительный падеж | set / get        |
| prepositionalCase | string / Строка | Предложный падеж   | set / get        |

[Назад в меню](../README.md)

## MgermApiClasses\Base\IdNameClass

Абстрактный класс содержащий в себе только индекс и наименование.
Наследник [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

| Поле    | Тип                                                                          | Описание     | Доступные методы |
| ------- | ---------------------------------------------------------------------------- | ------------ | ---------------- |
| nameObj | [MgermApiClasses\Base\CaseString](abstract.md#mgermapiclassesbasecasestring) | Наименование | set / get        |

### Описание дополнительных функций

| Функция | Аргументы функции    | Тип возвращаемого значение | Описание                                        | Дополнительная информация                      |
| ------- | -------------------- | -------------------------- | ----------------------------------------------- | ---------------------------------------------- |
| setName | name:String          | static                     | Установка имени объекта                         | Устанавливает значение nameObj->nominativeCase |
| getName | -                    | string                     | Получение имени объекта                         | Получает значение nameObj->nominativeCase      |
| factory | id: int, name:string | static                     | Позволяет установить сразу имя и индекс объекта |

[Назад в меню](../README.md)

## MgermApiClasses\Base\DateClass

Абстрактный класс содержащий в себе только индекс и дату.
Наследник [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

| Поле | Тип      | Описание | Доступные методы |
| ---- | -------- | -------- | ---------------- |
| date | DateTime | Дата     | set / get        |

### Описание функций

| Функция | Аргументы функции        | Тип возвращаемого значение | Описание       | Дополнительная информация                                                                               |
| ------- | ------------------------ | -------------------------- | -------------- | ------------------------------------------------------------------------------------------------------- |
| setDate | date:String/int/DateTime | static                     | Установка даты | Автоматически конвертирует строку в доступном формате в дату. Возможно использование UNIX-метки времени |
| getDate | -                        | DateTime                   | Получение даты |

[Назад в меню](../README.md)

## MgermApiClasses\Base\DateTimeStartTimeEndClass

Абстрактный класс содержащий в себе только индекс и дату.
Наследник [MgermApiClasses\Base\DateClass](abstract.md#mgermapiclassesbasedateclass)

### Описание полей

| Поле      | Тип      | Описание        | Доступные методы |
| --------- | -------- | --------------- | ---------------- |
| timeStart | DateTime | Время начала    | set/get          |
| timeEnd   | DateTime | Время окончания | set/get          |

### Описание функций

| Функция      | Аргументы функции        | Тип возвращаемого значение | Описание                 | Дополнительная информация                                                                               |
| ------------ | ------------------------ | -------------------------- | ------------------------ | ------------------------------------------------------------------------------------------------------- |
| setTimeStart | date:String/int/DateTime | static                     | Установка времени начала | Автоматически конвертирует строку в доступном формате в дату. Возможно использование UNIX-метки времени |
| getTimeStart | -                        | DateTime                   | Получение времени начала |                                                                                                         |
| setTimeEnd   | date:String/int/DateTime | static                     | Установка времени конца  | Автоматически конвертирует строку в доступном формате в дату. Возможно использование UNIX-метки времени |
| getTimeEnd   | -                        | DateTime                   | Получение времени конца  |                                                                                                         |

[Назад в меню](../README.md)

## MgermApiClasses\Classes\Person

Абстрактный класс содержащий в себе информацию о человеке.
Наследник [MgermApiClasses\Base\DateClass](abstract.md#mgermapiclassesbasedateclass)

### Описание полей

| Поле          | Тип                                                                            | Описание                                                                        | Доступные методы |
| ------------- | ------------------------------------------------------------------------------ | ------------------------------------------------------------------------------- | ---------------- |
| lastNameObj   | [MgermApiClasses\Base\CaseString](abstract.md#mgermapiclassesbasecasestring)   | Фамилия                                                                         | set/get          |
| firstNameObj  | [MgermApiClasses\Base\CaseString](abstract.md#mgermapiclassesbasecasestring)   | Имя                                                                             | set/get          |
| secondNameObj | [MgermApiClasses\Base\CaseString](abstract.md#mgermapiclassesbasecasestring)   | Отчество                                                                        | set/get          |
| sex           | int                                                                            | Идентификатор поля 1 - мужской 2 - женский 3 - неизвестен                       | set/get          |
| sexName       | string                                                                         | Строковое обозначение пола male - мужской female - женский unknown - неизвестен | set/get          |
| birthDay      | DateTime                                                                       | Дата рождения                                                                   | set/get          |
| contacts      | [MgermApiClasses\Classes\Contact](standart.md#mgermapiclassesclassescontact)[] | Массив контактов                                                                | set/get          |
| contactsCount | int                                                                            | Количество доступных контактов                                                  | set/get          |

### Описание дополнительных функций

| Функция                 | Аргументы функции                                                                    | Тип возвращаемого значение | Описание                                                                      | Дополнительная информация                         |
| ----------------------- | ------------------------------------------------------------------------------------ | -------------------------- | ----------------------------------------------------------------------------- | ------------------------------------------------- |
| addContact              | contact:[MgermApiClasses\Classes\Contact](standart.md#mgermapiclassesclassescontact) | static                     | Добавление нового контакта                                                    | Автоматически увеличивает счетчик контактов       |
| getFullName             | -                                                                                    | string                     | Возвращает фамилию имя и отчество разделенных пробелами в именительном падеже |                                                   |
| getLastNameWithInitials | -                                                                                    | string                     | Возвращает фамилию и инициалы                                                 | Инициалы завершены точкой. Все разделено пробелом |

[Назад в меню](../README.md)

## MgermApiClasses\Complex\ScheduledObject

Класс для передачи объекта (врач или кабинет) с его расписанием.
Является наследником [MgermApiClasses\Base\BaseClass](abstract.md#mgermapiclassesbasebaseclass)

### Описание полей

| Поле             | Тип                                                                                       | Описание                                                | Доступные методы |
| ---------------- | ----------------------------------------------------------------------------------------- | ------------------------------------------------------- | ---------------- |
| cells            | [MgermApiClasses\Classes\Schedule\Cell](standart.md#mgermapiclassesclassesschedulecell)[] | Список ячеек для записи                                 | set / get        |
| services         | [MgermApiClasses\Classes\Service](standart.md#mgermapiclassesclassesservice)[]            | Список услуг врача                                      | set / get        |
| interval         | bool                                                                                      | Флаг указания того, что расписание разбито на интервалы | set / get        |
| intervalDuration | int                                                                                       | Длительность интервала в минутах                        | set / get        |

### Описание дополнительных функций

| Функция       | Аргументы функции                                                                            | Тип возвращаемого значение | Описание                           | Дополнительная информация |
| ------------- | -------------------------------------------------------------------------------------------- | -------------------------- | ---------------------------------- | ------------------------- |
| appendService | service:[MgermApiClasses\Classes\Service](standart.md#mgermapiclassesclassesservice)         | static                     | Добавление новой услуги в список   |                           |
| appendCell    | cell:[MgermApiClasses\Classes\Schedule\Cell](standart.md#mgermapiclassesclassesschedulecell) | static                     | Добавление новой ячейки расписания |                           |

[Назад в меню](../README.md)
