<pre>
<?php
class String{
  public $length  = 5;
}
//Посмотрeть свойство length у класса String
// Создание экземпляра класса ReflectionProperty
$prop = new ReflectionProperty('String', 'length');

// Вывод основной информации о свойстве класса
printf(
    "===> %s%s%s%s свойство '%s' (которое было %s)\n" .
    "     имеет модификаторы %s\n",
        $prop->isPublic() ? ' public' : '',
        $prop->isPrivate() ? ' private' : '',
        $prop->isProtected() ? ' protected' : '',
        $prop->isStatic() ? ' static' : '',
        $prop->getName(),
        $prop->isDefault() ? 'объявлено во время компиляции' : 'создано во время выполнения',
        var_export(Reflection::getModifierNames($prop->getModifiers()), 1)
);
exit;


// Создание экземпляра String
$obj= new String();

// Получение текущего значения
printf("---> Значение: ");
var_dump($prop->getValue($obj));

// Изменение значения
$prop->setValue($obj, 10);
printf("---> Установка значения 10, новое значение равно: ");
var_dump($prop->getValue($obj));

// Дамп объекта
var_dump($obj);
?>
</pre>