<pre>
<?php
// Создание экземпляра класса ReflectionProperty
$ext = new ReflectionExtension('standard');

// Вывод основной информации
printf(
    "Имя           : %s\n" .
    "Версия        : %s\n" .
    "Функции       : [%d] %s\n" .
    "Константы     : [%d] %s\n" .
    "Директивы INI : [%d] %s\n" .
    "Классы        : [%d] %s\n",
        $ext->getName(),
        $ext->getVersion() ? $ext->getVersion() : 'NO_VERSION',
        sizeof($ext->getFunctions()),
        var_export($ext->getFunctions(), 1),

        sizeof($ext->getConstants()),
        var_export($ext->getConstants(), 1),

        sizeof($ext->getINIEntries()),
        var_export($ext->getINIEntries(), 1),

        sizeof($ext->getClassNames()),
        var_export($ext->getClassNames(), 1)
);
?>
</pre>