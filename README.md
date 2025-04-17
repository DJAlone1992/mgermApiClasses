# Классы для взаимодействия с API Mgerm

Позволяют унифицировать работу с API
Для удобства работы с механизмами взаимодействия разработан пакет PHP классов, которые позволяют ускорить работу с API MGERM.
Классы можно установить в проект через composer
``` bash
composer require mgerm/apiclasses
```
Релизы классов разбиты по зависимостям от версии PHP
|Версия PHP|Мажорная версия классов|
|---|---|
|>= 7.2|	1|
|>= 7.4|	2|
|>= 8.1|	3|

Классы конвертируются в JSON и обратно через встроенный конвертер. Возможно использование JSON без конвертации в PHP-класс.

Далее в инструкции будут указываться ссылки на базовые классы в возможных форматах
|Обозначение|Описание|
|---|---|
|ClassName|	Обозначение, что в поле передается объект класса ClassName. В поле он один.|
|ClassName[]|Обозначение, что в данное поле является массивом объектов класса ClassName|

## Описание
* [Абстрактные базовые классы](/docs/abstract.md)
* [Стандартные классы](/docs/standart.md)
* [Комплексные классы](/docs/complex.md)
* [Методы взаимодействия](/docs/usage.md)
