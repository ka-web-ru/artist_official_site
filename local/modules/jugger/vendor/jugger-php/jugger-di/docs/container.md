# Контейнер зависимостей

**Контейнер зависимостей** - это объект, который хранит в себе связи между объектами и при необходимости создать новый класс, автоматически подставляет (*внедряет*) необходимые для класса объекты (*зависимости*).

## Создание контейнера

Для создание контейнера необходимо просто вызвать соответствующий конструктор:

```php
use jugger\di\Container;

$container = new Container();
```

Для удобства работы с контейнером существует глобальный класс `Di` доступный в любой части приложения.
Поэтому лучше, создавать контейнер таким образом:

```php
use jugger\di\Di;
use jugger\di\Container;

Di::$c = new Container();
```

## ArrayAccess & ObjectAccess

Контейнер реализует интерфейс `ArrayAccess`, поэтому работа с ним, подобна работе с массивом:

```php
$container = new Container([]);
$a = $container['a'];
$container['b'] = 'b';
isset($container['c']);
unset($container['d']);

// либо как с обычным объектом
$container->a;
$container->b = 'b';
isset($container->c);
unset($container->d);
```

## Конструктор

Конструктор контейнера принимает на вход список зависимостей, поэтому куски кода ниже идентичны:
```php
Di::$c = new Container([
    'Test1' => 'Test1',
    'Test2' => [
        'class' => 'Test2'
    ],
    'Test3' => function($c) {},
]);
// равносильно
Di::$c['Test1'] = 'Test1';
Di::$c['Test2'] = [
    'class' => 'Test2'
];
Di::$c['Test3'] = function($c) {};
```

## Инициализация

Каждый элемент контейнера, это *зависимость* некоего класса с другими.
Создавать зависимость можно несколькими способами:

### 1. Передача имени класса

Для этого необходимо просто указать имя нужного класса:

```php
Di::$c['Test1'] = 'Test1';
```

При этом, если описание класса `Test1` выглядит так:

```php
class Test1
{
    var $t2;
    var $t3;

    public function __construct(Test2 $t2, Test3 $t3)
    {
        $this->t2 = $t2;
        $this->t3 = $t3;
    }
}
```

То контейнер, **если ему известны необходимые классы**, подставит их автоматически:

```php
Di::$c['Test1'] = 'Test1';
Di::$c['Test2'] = 'Test2';
Di::$c['Test3'] = 'Test3';

$object = Di::$c['Test1'];
// равносильно
$object = new Test1(Di::$c['Test2'], Di::$c['Test3']);
```

### 2. Передача конфигурации класса

Конфиг представляет из себя массив, содержащий имя класса и значения его свойств:
```php
Di::$c['Test2'] = [
    'Test2' => [
        'class' => 'Test2',
        'property1' => 'value1',
        'property2' => 'value2',
        'property3' => 'value3',
    ],
];

$object = Di::$c['Test2'];
// равносильно
$object = new Test2();
$object->property1 = 'value1';
$object->property2 = 'value2';
$object->property3 = 'value3';
```

### 3. Передача callback'a (Фабрика)

Функция получает на вход **текущий** контейнер и может выполнять любые действия:

```php
Di::$c['Test4'] = function(Container $c) {
    return new Test3('low', $c['Test2']);
};
Di::$c['Test2'] = 'Test2';

$object = Di::$c['Test4'];
// равносильно
$object = new Test3('low', $c['Test2']);
```

Значение функции **не кешируется**, в том время как остальные типы присвоения, автоматически кешируются (см. ниже).

## LazyLoad & Singleton

В последнем примере можно заметить, что код корректно выполнился, несмотря на то, что зависимость `Test2` была внедрена после `Test4`.
Данное поведение корректно, т.к. объект класса создается не в момент инициализации, а в момент вызова (ленивая загрузка).
Также при повторных вызовах, не будет создаваться новый объект, а будет возвращаться старый (синглтоны).

Если необходим именно новый экземпляр класса, то можно воспользоваться методом `create`:

```php
$t1 = Di::$c['Test1'];
$t2 = Di::$c->create('Test1');
$t3 = Di::$c['Test1'];
$t4 = Di::$c->create('Test1');

$t1 === $t2; // false
$t1 === $t3; // true
$t1 === $t4; // false
$t2 === $t4; // false
```

## Класс или переменная?

Логически, в контейнере зависимостей нужно указывать именно классы, чтобы зависимые классы завязывались именно на абстракции классов.
Но также **можно** указывать и любые имена, например для удобства:

```php
Di::$c['\jugger\ar\QueryInterface'] = '\jugger\db\Query';
// либо можно просто указать
Di::$c->query = '\jugger\db\Query';
```
