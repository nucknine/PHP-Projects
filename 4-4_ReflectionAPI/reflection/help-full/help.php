<?php
header("Content-Type: text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Reflection</title>
    <meta charset="utf-8" />
    <link type="text/css" href="style.css" rel="stylesheet" />
  </head>
  <body>
    <table style="width:770px;">
      <tr>
        <td colspan="2" class="top" >
          <h1 style="background-color:#fff">PHP Классы и Интерфейсы</h1>
        </td>
      </tr>
      <tr>
        <td style="width:20%; vertical-align:top;padding-top:10px;" class="sidebar">
        <?php
        include 'MyException.php';
        include 'Documenter.php';
        $classes = get_declared_classes();
        natcasesort($classes);
        $classname = @$_GET["class"];
        if(!isset($classname)){
          $classname = current($classes);
        }
        echo "<h4 style=\"background-color:#fff;\">Классы</h4>";
        foreach($classes as $value){
          echo "<a href=\"help.php?class=$value\">".
            "$value</a><br />\n";
        }
        $classes = get_declared_interfaces();
        natcasesort($classes);
        echo "<h4 style=\"background-color:#fff;\">Интерфейсы</h4>";
        foreach($classes as $key => $value){
          echo "<a href=\"help.php?class=$value\">".
            "$value</a><br />\n";
        }
        ?>
        </td>
        <td class="centre" >
        <?php
        function get_params(ReflectionParameter $p){  
          $description = "";
          //Это объект?
          $c = $p->getClass();
          if(is_object($c)){
            $description .= $c->getName() . " ";
          }
          $description .= "\$" . $p->getName();
          //Есть значение по умолчанию?
          if ($p->isDefaultValueAvailable()){
            $val = $p->getDefaultValue();
            //Может быть пустой строкой
            if($val == ""){
              $val = "\"\"";
            }
            $description .= " = $val";
          }  
          return $description;
        }
        function show_methods(Documenter $d, $type, $arr){
          echo "<h3>$type</h3>";
          foreach($arr as $key => $value){  
            echo "<p><span class=\"keyword\">".
              $d->getModifiers($value). "</span> ".
              "<span class=\"name\">$key</span>\n";
            //Добавляем параметры используя метод из ReflectionMethod
            $params = $value->getParameters();
            $number= $value->getNumberOfParameters();
            $counter = 0;
            echo "( " ; 
            foreach($params as $p){    
              echo get_params($p);
              $counter ++;
              if($counter != $number){
                echo ", ";
              }
            }
            echo " )" ;
            if($value->isUserDefined()){
              echo " <span class=\"red\">пользовательский</span><br />";
            }
            if($value->getDocComment()){
              echo "<span class=\"comment\">";
              echo $value->getDocComment() . "</span><br />";
            }
            echo "</p>";
          }
        }
        function show_data_members(Documenter $d, $type, $arr){
          $arrdefaultvalue = $d->getDefaultproperties();
          echo "<h3>$type</h3>\n";
          foreach($arr as $key => $value){  
            $strtemp = "<p><span class=\"keyword\">".
              $d->getModifiers($value) . "</span> ".
              "<span class=\"name\">$key</span>";
            if ( isset($arrdefaultvalue[$key]) ){
              $val = $arrdefaultvalue[$key];

                if(is_string($val)){
                    $val = "\"$val\"";
                }elseif (is_array($val)){
                    $val = " array()";
                }elseif(is_bool($val)){
                    if($val===true){
                        $val = "true";
                    }else{
                        $val = "false";
                    }
                }else{
                  $val = "$val";
                }        
            }else{
                $val=null;
            }

                if($val) $strtemp .= " = $val";
                /* getDocComment() для свойств был добавлен в PHP 5.1.0.
              но не работал до версии 5.1.3 */
              if($value->getDocComment()){
                    $strtemp .= "<br /><span class=\"comment\">";
                    $strtemp .= $value->getDocComment() . "</span><br />";
              }
            //}
            echo $strtemp;
            echo "</p>\n";
          }
        }
        try{
          $class = new Documenter($classname);
          echo "<h2>Имя: ". $class->getName() . "</h2>\n";
          $today = date("M-d-Y");
          echo "<p> Дата: $today<br />";
          echo "PHP версия: ". phpversion() . "<br />";
          $type = $class->getClassType();
            if($type == "Internal"){
                $type = "Встроенный";
            }else{
                $type = "Пользовательский";
            }
          echo "Тип: ". $type . "<br /><br />\n";
          echo "<span class=\"fulldescription\">". $class->getFullDescription().
                 "</span><br /><br />\n";
          echo "<span class=\"comment\">";
          echo $class->getDocComment() . "</span></p>\n";  
          //выводим константы
          $arr = $class->getConstants();
          if (count($arr) > 0){
            echo "<h3>Константы</h3>\n";
            foreach ($arr as $key => $value){
              echo "<p><span class=\"keyword\">const</span> ".
                "<span class=\"name\">$key</span> = $value <br /></p>\n";
            }
          }
          //выводим свойства
          $arr = $class->getPublicDataMembers();
          if (count($arr) > 0){
            show_data_members($class, "Public Свойства", $arr);
          }
          $arr = $class->getProtectedDataMembers();
          if (count($arr) > 0){
            show_data_members($class, "Protected Свойства", $arr);
          }
          $arr = $class->getPrivateDataMembers();
          if (count($arr) > 0){
            show_data_members($class, "Private Свойства", $arr);
          }
          //выводим методы
          $arr = $class->getPublicMethods();
          if (count ($arr) > 0){
            show_methods($class, "Public Методы", $arr);
          }
          $arr = $class->getProtectedMethods();
          if (count($arr) > 0){
            show_methods($class, "Protected Методы", $arr);
          }
          $arr = $class->getPrivateMethods();
          if (count($arr) > 0){
            show_methods($class, "Private Методы", $arr);
          }
        }catch (ReflectionException $e){
          echo "<div style=\"color:red; font-size: 12pt; font-weight: bold;\">";
          echo "ReflectionException<br /><br /></div>";
          echo $e;
        }
        ?>
        </td>
      </tr>
    </table>
  </body>
</html>