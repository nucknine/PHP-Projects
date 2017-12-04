<pre>
<?php
function sayHello($name, $h){
  static $count = 0;
  return "<h$h>Hello, $name</h$h>";
}

// Обзор функции
Reflection::export(new ReflectionFunction('sayHello'));
exit;


// Создание экземпляра класса ReflectionFunction
$func = new ReflectionFunction('sayHello');
// Вывод основной информации
printf(
    "<p>===> %s функция '%s'\n".
    "     объявлена в %s\n".
    "     строки с %d по %d\n",
    $func->isInternal() ? 'Internal' : 'User-defined',
    $func->getName(),
    $func->getFileName(),
    $func->getStartLine(),
    $func->getEndline()
);
// Вывод статических переменных, если они есть
if ($statics = $func->getStaticVariables()){
  printf("<p>---> Статическая переменная: %s\n", var_export($statics,1));
}
exit;


// Вызов функции
printf("<p>---> Результат вызова: ");
$result = $func->invoke("John","1");
echo $result;
?>
</pre>