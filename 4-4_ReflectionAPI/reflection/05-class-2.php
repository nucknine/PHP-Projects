<pre>
<?php
interface MyInterface{}

class Object{}

class Counter extends Object implements MyInterface{
  const START = 0;
  private static $c = Counter::START;

  public function count() {
    return self::$c++;
  }
}

// Создание экземпляра класса ReflectionClass
$class = new ReflectionClass('Counter');

// Вывод основной информации
printf(
    "===> %s%s%s %s '%s' [экземпляр класса %s]\n" .
    "     объявлен в %s\n" .
    "     строки с %d по %d\n",
        $class->isInternal() ? 'Встроенный' : 'Пользовательский',
        $class->isAbstract() ? ' абстрактный' : '',
        $class->isFinal() ? ' финальный' : '',
        $class->isInterface() ? 'интерфейс' : 'класс',
        $class->getName(),
        var_export($class->getParentClass(), 1),
        $class->getFileName(),
        $class->getStartLine(),
        $class->getEndline()
);

// Вывод тех интерфейсов, которые реализует этот класс
printf("---> Интерфейсы:\n %s\n", var_export($class->getInterfaces(), 1));

// Вывод констант класса
printf("---> Константы: %s\n", var_export($class->getConstants(), 1));

// Вывод свойств класса
printf("---> Свойства: %s\n", var_export($class->getProperties(), 1));

// Вывод методов класса
printf("---> Методы: %s\n", var_export($class->getMethods(), 1));

// Если есть возможность создать экземпляр класса, то создаем его
if ($class->isInstantiable()) {
    $counter = $class->newInstance();

	echo '---> Создан ли экземпляр класса '.$class->getName().'? ';
    echo $class->isInstance($counter) ? 'Да' : 'Нет';

    echo "\n---> Создан ли экземпляр класса Object()? ";
    echo $class->isInstance(new Object()) ? 'Да' : 'Нет';
}
?>
</pre>