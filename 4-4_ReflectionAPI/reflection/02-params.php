<pre>
<?php
function foo1($a, $b, $c) { }
function foo2(Exception $a, &$b, $c) { }
function foo3(ReflectionFunction $a, $b = 1, $c = null) { }
function foo4() { }

// Создание экземпляра класса ReflectionFunction
$reflect = new ReflectionFunction("foo1");

echo $reflect;
exit;


foreach ($reflect->getParameters() as $i => $param) {
    printf(
        "-- Параметр #%d: %s {\n".
        "   Допускать NULL: %s\n".
        "   Передан по ссылке: %s\n".
        "   Обязательный?: %s\n".
        "}\n",
        $i,
        $param->getName(),
        var_export($param->allowsNull(), 1),
        var_export($param->isPassedByReference(), 1),
        $param->isOptional() ? 'нет' : 'да'
    );
}
?>
</pre>